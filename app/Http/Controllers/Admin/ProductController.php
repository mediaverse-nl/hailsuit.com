<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
use App\Barcode;
use App\BodyType;
use App\Brand;
use App\Detail;
use App\Forms\AddedStock;
use App\Forms\AddedStockForm;
use App\Forms\AddStockForm;
use App\Notifications\NotificationToDB;
use App\Product;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ProductController extends Controller
{
    use FormBuilderTrait;

    protected $formBuilder, $language, $product, $detail, $brand, $barcode, $type, $bodyType;

    public function __construct(
        Product $product,
        Detail $detail,
        Type $type,
        BodyType $bodyType,
        Brand $brand,
        AppLanguage $language,
        Barcode $barcode,
        FormBuilder $formBuilder
    ){
        $this->language = $language;
        $this->product = $product;
        $this->detail = $detail;
        $this->type = $type;
        $this->bodyType = $bodyType;
        $this->brand = $brand;
        $this->barcode = $barcode;
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addedStockForm = $this->formBuilder->create(AddedStockForm::class, [
            'method' => 'POST',
            'url' => route('admin.product.addedStock')
        ]);

        $addStockForm = $this->formBuilder->create(AddStockForm::class, [
            'method' => 'POST',
            'url' => route('admin.product.addStock')
        ]);

        $products = $this->product->get();

        return view('admin.product.index')
            ->with('addedStockForm', $addedStockForm)
            ->with('addStockForm', $addStockForm)
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = $this->language->get();
        $details = $this->detail->get();
        $brands = $this->brand->whereHas('types', function ($q){
            $q->where('product_id', '=', null);
        })->get();

        return view('admin.product.create')
            ->with('details', $details)
            ->with('brands', $brands)
            ->with('languages', $languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->product;

        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;

        $product->save();

        //property
        if(!empty($request->property)){
            foreach (array_filter($request->property) as $property){
                if($property !== null){
                    $product->productProperties()
                        ->insert([['product_id' => $product->id, 'property_id' => $property]]);
                }
            }
        }

        //brands
        if(!empty($request->brands)){
            foreach ($request->brands as $brand){
                $this->type->where('id', '=', $brand)->update([
                    'product_id' => $product->id,
                ]);
            }
        }

        //barcodes
        if(!empty($request->barcodes)){
            foreach ($request->barcodes as $barcode){
                if($barcode !== null){
                    $product->barcodes()->insert([[
                        'product_id' => $product->id,
                        'value' => $barcode
                    ]]);
                }
            }
        }

        //translation
        foreach ($this->language->get() as $lang) {
            $product->productTranslation()
                ->insert([[
                    'language_id' => $lang->id,
                    'product_id' => $product->id,
                    'name' => '',
                    'description' => '',
                ]]);
        }

        if(!empty($request->translation)){
            foreach ($request->translation as $translation => $value){
                $product->productTranslation()
                    ->where('language_id', '=', $translation)
                    ->update([
                        'product_id' => $product->id,
                        'name' => $value['name'] == '' ? '' : $value['name'],
                        'description' => $value['description'] == '' ? '' : $value['description']
                    ]);
            }
        }

        //iamges
        if(!empty($request->images)){
            foreach (explode(',', $request->images) as $image){
                $product->images()->insert([
                    ['product_id' => $product->id, 'path' => $image]
                ]);
            }
        }

        return redirect()->route('admin.product.edit', $product->id);
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
//        todo this is not working
        $brands = $this->brand->whereHas('types', function ($q) use ($id){
            $q->where('product_id', '=', null)
                ->orWhere('product_id', '=', $id);
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
//        $this->product->find($id)->notify(new NotificationToDB);

        $product = $this->product->findOrFail($id);

        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;

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
            $this->bodyType->where('product_id', '=', $id)->update(['product_id' => null]);

            foreach ($request->brands as $brand){
                $this->bodyType->where('id', '=', $brand)->update([
                    'product_id' => $id,
                ]);
            }
        }

        //barcodes
        if(!empty($request->barcodes)){
            $product->barcodes()->where('product_id', $id)->delete();

            foreach ($request->barcodes as $barcode){
                if (!empty($barcode)){
                    $product->barcodes()->insert([[
                        'product_id' => $id,
                        'value' => $barcode
                    ]]);
                }
            }
        }

//        translation
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

    public function addedStock(Request $request)
    {
        $code = $request->barcode;
        $stock = $request->stock;

        $product = $this->barcode->where('value', '=', $code)->first()->product;

        $product->addedStock($stock);

        return redirect()->back();
    }

    public function addStock(Request $request)
    {
        $form = $this->form(AddStockForm::class);
        $form->redirectIfNotValid();

        $code = $form->getFieldValues()['barcode'];
        $stock = $form->getFieldValues()['stock'];
        $barcode = $this->barcode->where('value', '=', $code);

        if($barcode->count() >= 1){
            $product = $barcode->first()->product;

            $product->addedStock($product->stock + $stock);
        }

        return redirect()->back();
    }
}
