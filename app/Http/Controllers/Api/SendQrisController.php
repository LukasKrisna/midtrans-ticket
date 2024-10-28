<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use \SevenSpan\WhatsApp\Facades\WhatsApp;

class SendQrisController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $qrCodeUrl = $request->input('qr_code_url');
        $phoneNumber = '6288233772400';

        $imageContents = file_get_contents($qrCodeUrl);
        $imageName = 'qrcodes/' . uniqid() . '.png';
        Storage::disk('public')->put($imageName, $imageContents);

        $imagePath = asset('storage/' . $imageName);
        $response = WhatsApp::sendMediaMessage($phoneNumber, $imagePath, 'Silahkan melakukan pembayaran QRIS berikut.', env('FROM_PHONE_NUMBER_ID'));

        Log::info('WhatsApp API Response:', $response);

        return response()->json(['message' => 'QR code sent to WhatsApp', 'response' => $response]);
    }
}
