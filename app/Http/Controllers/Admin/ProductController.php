<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
use App\Brand;
use App\Detail;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $language;
    protected $product;
    protected $detail;
    protected $brand;

    public function __construct(Product $product, Detail $detail, Brand $brand, AppLanguage $language)
    {
        $this->language = $language;
        $this->product = $product;
        $this->detail = $detail;
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->get();

        return view('admin.product.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);

        $languages = $this->language->get();
        $details = $this->detail->get();
        $brands = $this->brand->get();

        return view('admin.product.edit')
            ->with('product', $product)
            ->with('details', $details)
            ->with('brands', $brands)
            ->with('languages', $languages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->request);

        $product = $this->product->findOrFail($id);

        $product->save();

        if(!empty($request->property)){
//            dd('ok');
            $product->productProperties()->where('product_id', $id)->delete();

            foreach ($request->property as $property){
                dd((int)$property, $request->property);
                $product->productProperties()->insert([['product_id' => $id, 'property_id' => $property[1]]]);
            }
        }


//        property
//
//        brands
//
//        barcodes
//
//        translation
//
//        iamges

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
