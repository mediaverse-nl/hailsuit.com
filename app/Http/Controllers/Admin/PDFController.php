<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    protected $pdf;
    protected $order;

    public function __construct(PDF $pdf, Order $order)
    {
        $this->pdf = $pdf;
        $this->order = $order;
    }

    public function streamInvoice($id)
    {
        $order = $this->order->findOrFail($id);

        $pdf = $this->pdf->loadView('pdf.invoice', ['order' => $order]);

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
