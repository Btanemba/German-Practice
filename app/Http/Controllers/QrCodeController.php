<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    /**
     * Generate and save a QR code image that links to the homepage.
     */
    public function generate()
    {
        $path = public_path('qr-code.png');
        QrCode::format('png')
            ->size(500)
            ->generate(url('/'), $path);
        return response()->download($path);
    }
}
