<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;

class MidtransPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $validator->errors()
            ], 422);
        }

        $invoiceNumber = 'INV-' . time();

        $transaction = Transaction::create([
            'order_id' => $request->order_id,
            'invoice_number' => $invoiceNumber,
            'amount' => $request->amount,
            'status' => 'CREATED',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
            ->post('https://api.sandbox.midtrans.com/v2/charge', [
                'payment_type' => 'qris',
                'transaction_details' => [
                    'order_id' => $transaction->id,
                    'gross_amount' => $transaction->amount,
                ],
            ]);

        if ($response->status() == 201 || $response->status() == 200) {
            $actions = $response->json('actions');
            if (empty($actions)) {
                return response()->json([
                    'message' => $response->json('status_message'),
                    'data' => $transaction,
                ], 500);
            }

            $actionMap = [];
            foreach ($actions as $action) {
                $actionMap[$action['name']] = $action['url'];
            }

            $qrCodeUrl = $actionMap['generate-qr-code'];
            app(\App\Http\Controllers\Api\SendQrisController::class)->__invoke(new Request([
                'qr_code_url' => $qrCodeUrl,
                'transaction_id' => $transaction->id,
            ]));

            // return response()->json(['qr' => $qrCodeUrl]);

            // return response()->json(['qr' => $actionMap['generate-qr-code']]);

            return view('order.process-payment', [
                'qr' => $qrCodeUrl,
                'amount' => $request->amount,
            ]); // mengubah response menjadi view
        }

        return response()->json(['message' => $response->body()], 500);
    }
}
