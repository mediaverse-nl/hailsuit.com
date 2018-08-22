<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Forms\DetailStoreForm;
use App\Forms\PropertyStoreForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class DetailController extends Controller
{
    use FormBuilderTrait;

    protected $detail;
    protected $formBuilder;

    public function __construct(Detail $detail, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->detail = $detail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = $this->formBuilder->create(DetailStoreForm::class, [
            'method' => 'POST',
            'url' => route('admin.detail.store')
        ]);

        $details = $this->detail->get();

        return view('admin.detail.index')
            ->with('details', $details)
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
        $form = $this->form(DetailStoreForm::class);
        $form->redirectIfNotValid();

        $this->detail->create($form->getFieldValues());

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
        $detail = $this->detail->findOrFail($id);
        $details = $this->detail->get();

        $form = $this->formBuilder->create(PropertyStoreForm::class, [
            'method' => 'POST',
            'url' => route('admin.property.store')
        ], ['detail_id' => $id]);

        return view('admin.detail.edit')
            ->with('detail', $detail)
            ->with('details', $details)
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
        $detail = $this->detail->findOrFail($id);

        $detail->delete();

        return redirect()->back();
    }
}
