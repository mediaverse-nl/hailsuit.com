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
        $this->seo()->setTitle(Translator('seo_title', 'text', true, 'home').' | hailsuit.com');
        $this->seo()->setDescription(Translator('seo_description', 'text', true, ''));
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->twitter()->setSite(Translator('seo_twitter_username', 'text', true, '@username'));

        $products = $this->product
            ->join('product_translation', 'product_translation.product_id', '=', 'product.id')
            ->orderBy('product_translation.name', 'desc')
            ->groupBy('product.id')
            ->select('product.*')
            ->get();

        return view('welcome')
            ->with('products', $products);
    }
}
