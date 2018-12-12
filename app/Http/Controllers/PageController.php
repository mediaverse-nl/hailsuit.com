<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $faq;

    public function __construct(FAQ $faq)
    {
        $this->faq = $faq;
    }

    public function terms(){
        return view('pages.terms');
    }

    public function privacy(){
        return view('pages.privacy');

    }

    public function cookie(){
        return view('pages.cookie');
    }

    public function warranty(){
        return view('pages.warranty');
    }

    public function returns(){
        return view('pages.returns');
    }

    public function delivery(){
        return view('pages.delivery');
    }

    public function app(){
        return view('app');
    }

    public function faq(){
        $faq = $this->faq->get();

        return view('faq')
            ->with('faqs', $faq);
    }
}
