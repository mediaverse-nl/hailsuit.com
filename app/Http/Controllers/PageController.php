<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
//    protected $

    public function __construct()
    {

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
}
