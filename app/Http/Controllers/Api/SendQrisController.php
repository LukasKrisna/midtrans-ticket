<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SendQrisController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $qrCodeUrl = $request->input('qr_code_url');
        $amount = $request->input('amount');
        $phoneNumber = '6288233772400';
        $qrCodeUrl = "https://api.sandbox.midtrans.com/v2/qris/{$qrCodeUrl}/qr-code";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $phoneNumber,
                'message' => "Silahkan melakukan pembayaran QRIS sejumlah: Rp. $amount berikut: $qrCodeUrl",
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . env('FONNTE_TOKEN')
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            Log::error('Fonnte API Error:', ['error' => $error_msg]);
            return response()->json(['message' => 'Failed to send QR code to WhatsApp', 'error' => $error_msg], 500);
        }

        Log::info('Fonnte API Response:', ['response' => $response]);

        return response()->json(['message' => 'QR code sent to WhatsApp', 'response' => $response]);
    }
}
