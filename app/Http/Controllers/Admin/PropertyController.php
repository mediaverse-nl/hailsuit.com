<?php

namespace App\Http\Controllers\Admin;

use App\Forms\PropertyStoreForm;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class PropertyController extends Controller
{
    use FormBuilderTrait;

    protected $property;
    protected $formBuilder;

    public function __construct(Property $property, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->property = $property;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $this->form(PropertyStoreForm::class);
        $form->redirectIfNotValid();

        $this->property->create($form->getFieldValues());

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
