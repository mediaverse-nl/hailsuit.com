<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Forms\BrandStoreForm;
use App\Forms\TypeStoreForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class BrandController extends Controller
{
    use FormBuilderTrait;

    protected $brand;
    protected $formBuilder;

    public function __construct(Brand $brand, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = $this->formBuilder->create(BrandStoreForm::class, [
            'method' => 'POST',
            'url' => route('admin.brand.store')
        ]);

        $brands = $this->brand->get();

        return view('admin.brand.index')
            ->with('brands', $brands)
            ->with('form', $form);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $this->form(BrandStoreForm::class);
        $form->redirectIfNotValid();

//        dd($request);

        $this->brand->create($form->getFieldValues());

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->brand->findOrFail($id);
        $brands = $this->brand
            ->orderBy('name', 'asc')
            ->get();

        $form = $this->formBuilder->create(TypeStoreForm::class, [
            'method' => 'POST',
            'url' => route('admin.type.store')
        ], ['brand_id' => $id]);

        return view('admin.brand.edit')
            ->with('brand', $brand)
            ->with('brands', $brands)
            ->with('form', $form);
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
        //
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
