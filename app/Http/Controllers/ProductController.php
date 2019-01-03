<?php

namespace App\Http\Controllers;

use App\AppLanguage;
use App\Product;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use SEOTools;

    protected $product,
        $appLanguage;

    public function __construct(Product $product, AppLanguage $appLanguage)
    {
        $this->product = $product;
        $this->appLanguage = $appLanguage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->seo()->setTitle(Translator('seo_products_title', 'text', true, 'products').' | hailsuit.com');
        $this->seo()->setDescription(Translator('seo_products_description', 'text', true, ''));
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addProperty('type', 'product');
        $this->seo()->twitter()->setSite(Translator('seo_twitter_username', 'text', true, '@username'));

        $products = $this->product
            ->join('product_translation', 'product_translation.product_id', '=', 'product.id')
            ->orderBy('product_translation.name', 'desc')
            ->groupBy('product.id')
            ->select('product.*')
            ->get();

        return view('product.index')
            ->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $title = null)
    {
        $product = $this->product->findOrFail($id);

        $productTitle = $this->hyphenize($product->titleTranslated(), true);

        if ($productTitle !== $title)
        {
            return redirect()
                ->route('product.show', [
                    $product->id,
                    $productTitle
                ]);
        }

        $this->seo()->setTitle($product->titleTranslated().' | hailsuit.com');
        $this->seo()->setDescription($product->descriptionTranslated());
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addProperty('type', 'product');
        $this->seo()->twitter()->setSite(Translator('seo_twitter_username', 'text', true, '@username'));

        $images = [];
        foreach($product->images as $image){
            $images[] = $image->path;
        }
        $this->seo()->addImages($images);

        $appLanguage = $this->appLanguage;

        $types = $product->bodyTypes()->get();

        return view('product.show')
            ->with('product', $product)
            ->with('appLanguage', $appLanguage)
            ->with('types', $types);
    }

    public function hyphenize($title, $stripDash = false)
    {
        if ($stripDash){
            $title = str_replace('-', '', $title);
        }

        return preg_replace(
            array('#[\\s-]+#', '#[^A-Za-z0-9\. -]+#'),
            array('-', ''),
            urldecode($title)
        );
    }
}
