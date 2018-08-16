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
        $brands = $this->brand->whereHas('types', function ($q) use ($id){
            $q->where('product_id', '=', null);
            $q->orWhere('product_id', '=', $id);
        })->get();

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
        $product = $this->product->findOrFail($id);

        $product->save();

        //property
        if(!empty($request->property)){
            $product->productProperties()->where('product_id', $id)->delete();

            foreach (array_filter($request->property) as $property){
                if($property !== null){
                    $product->productProperties()->insert([['product_id' => $id, 'property_id' => $property]]);
                }
            }
        }

        //brands
        if(!empty($request->brands)){
            $product->brands()->where('product_id', $id)->delete();

            foreach ($request->brands as $barcode){
                $product->brands()->insert([[
                    'product_id' => $id,
                    'value' => $barcode
                ]]);
            }
        }

        //barcodes
        if(!empty($request->barcodes)){
            $product->barcodes()->where('product_id', $id)->delete();

            foreach ($request->barcodes as $barcode){
                $product->barcodes()->insert([[
                    'product_id' => $id,
                    'value' => $barcode
                ]]);
            }
        }

        //translation
        if(!empty($request->translation)){
            foreach ($request->translation as $translation => $value){
                $product->productTranslation()
                    ->where('language_id', '=', $translation)
                    ->update([
                        'product_id' => $id,
                        'name' => $value['name'],
                        'description' => $value['description'],
                    ]
                );
            }
        }

        //iamges
        if(!empty($request->images)){
            $product->images()->where('product_id', $id)->delete();

            foreach (explode(',', $request->images) as $image){
                $product->images()->insert([['product_id' => $id, 'path' => $image]]);
            }
        }

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
