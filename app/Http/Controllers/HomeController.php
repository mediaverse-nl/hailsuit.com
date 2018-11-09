<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function __invoke()
    {
        $products = $this->product->get();

        return view('welcome')
            ->with('products', $products);
    }
}
