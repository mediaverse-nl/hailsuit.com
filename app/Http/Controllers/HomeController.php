<?php

namespace App\Http\Controllers;

use App\Product;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use SEOTools;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function __invoke()
    {
        $this->seo()->setTitle('hailsuit.com');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl('http://current.url.com');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite('@username');

        $products = $this->product->get();

        return view('welcome')
            ->with('products', $products);
    }
}
