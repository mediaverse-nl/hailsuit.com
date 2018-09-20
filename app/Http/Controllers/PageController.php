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
        return view('default');
    }

    public function privacy(){
        return view('default');

    }

    public function cookie(){
        return view('default');

    }

    public function warranty(){
        return view('default');

    }

    public function returns(){
        return view('default');

    }

    public function delivery(){
        return view('default');
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
