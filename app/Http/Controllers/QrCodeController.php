<?php

namespace App\Http\Controllers;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\SvgWriter;

class QrCodeController extends Controller
{
    public function generate()
    {
        $result = Builder::create()
            ->writer(new SvgWriter())
            ->data(url('/'))
            ->size(500)
            ->build();

        $path = public_path('qr-code.svg');
        file_put_contents($path, $result->getString());

        return response()->download($path);
    }
}
