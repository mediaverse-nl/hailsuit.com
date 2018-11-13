<?php

namespace App\Http\Controllers\Admin;

use App\Forms\TypeStoreForm;
use App\Http\Traits\LanguageTrait;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;


class TypeController extends Controller
{
    use FormBuilderTrait, LanguageTrait;

    protected $type;
    protected $formBuilder;

    public function __construct(Type $type, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->type = $type;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $this->form(TypeStoreForm::class);
        $form->redirectIfNotValid();

        $type = $this->type->create([
            'model_year' => $request->model_year,
            'brand_id' => $request->brand_id,
            'value' => $request->value,
        ]);

        foreach ($request->body as $i){
             $type->bodyType()->create([
                 'body_id' => $i
             ]);
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
        $type = $this->type->findOrFail($id);

        $type->delete();

        return redirect()->back();
    }
}
