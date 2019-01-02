<?php

namespace App\Http\Controllers;

use App\AppLanguage;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $appLanguage;

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
//        todo fix order or titles of products
//        $products = $this->product
//            ->with(['productTranslation' => function ($q){
//                $q->orderBy('product_translation', 'desc');
//            }])
//            ->with('product_translation')
//            ->orderBy('product_translation.name', 'desc')
//            ->get();

        $products = $this->product
            ->join('product_translation', 'product_translation.product_id', '=', 'product.id')
            ->orderBy('product_translation.name', 'desc')
            ->groupBy('product.id')
            ->select('product.*')->get();

//        dd($products);

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
