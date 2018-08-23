<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    protected $pdf;

    public function __construct(PDF $pdf)
    {
        $this->pdf = $pdf;
    }

    public function streamInvoice()
    {
        $pdf = $this->pdf->loadView('pdf.invoice');

        return $pdf->stream();
    }

    public function downloadInvoice()
    {
        $pdf = $this->pdf->loadView('pdf.invoice');

        return $pdf->download('invoice.pdf');
    }

    public function streamPackingSlip()
    {
        $pdf = $this->pdf->loadView('pdf.invoice');

        return $pdf->stream();
    }

    public function downloadPackingSlip()
    {
        $pdf = $this->pdf->loadView('pdf.invoice');

        return $pdf->download('invoice.pdf');
    }
}
