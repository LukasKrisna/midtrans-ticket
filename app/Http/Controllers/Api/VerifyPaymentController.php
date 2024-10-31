<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class VerifyPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;

        $signature = hash('sha512', $orderId . $statusCode . $grossAmount . env('MIDTRANS_SERVER_KEY'));

        if ($signature !== $request->signature_key) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid signature',
            ], 400);
        }

        // $transaction = Transaction::find($request->order_id);
        $transaction = Transaction::where('order_id', $orderId)->first();

        if ($transaction) {
            $status = 'PENDING';

            if ($request->transaction_status == 'settlement') {
                $status = 'PAID';
            } elseif ($request->transaction_status == 'expired') {
                $status = 'EXPIRED';
            }

            // $transaction->status = $status;
            // $transaction->save();

            $transaction->update([
                'status' => $status,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Pembayaran terverifikasi',
        ]);
    }
}
