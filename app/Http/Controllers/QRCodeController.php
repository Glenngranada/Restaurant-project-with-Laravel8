<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function generate()
    {
        $generatedQrCode = QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8');
        dd($generatedQrCode);
        // // Create a new QR code instance
        // $qrCode = new QrCode('Hello, world!');

        // // Set additional options (optional)
        // $qrCode->setSize(300);
        // $qrCode->setMargin(10);
        // // dd($qrCode);
        // // Output the QR code
        // // Generate the QR code image data
        // $imageData = $qrCode;

        // // Generate the QR code image file path
        // $filePath = public_path('images/qrcode.png');

        // // Write the QR code image data to a file
        // file_put_contents($filePath, $imageData);

        // // Return a response (optional)
        // return response()->json([
        //     'message' => 'QR code generated and saved successfully!',
        //     'file_path' => $filePath,
        // ]);
    }

    public function index()
    {
      return view('qrcode');
    }
}
