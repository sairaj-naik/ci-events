<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PdfController extends BaseController
{
    public function index()
    {
        //
    }

    public function generatepdf()
    {
        $dompdf = new \Dompdf\Dompdf();

        $html = "inside generatepdf";
        
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream('Booking Details');
    }
}
