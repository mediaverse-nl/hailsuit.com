<?php

namespace App\Http\Controllers\Admin;

use App\Body;
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
    protected $body;
    protected $formBuilder;

    public function __construct(Type $type, Body $body, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->type = $type;
        $this->body = $body;
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
     * @param $id
     */
    public function edit($id)
    {
        $type = $this->type->findOrFail($id);
        $bodies = $this->body->get();

        $bodyTypes = $type->bodyType()->pluck('body_id', 'body_id')->toArray();

//        dd($bodyTypes);
        return view('admin.type.edit')
            ->with('type', $type)
            ->with('bodyTypes', $bodyTypes)
            ->with('bodies', $bodies);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $products = [];

        $type = $this->type->findOrFail($id);
        $bodies = $request->bodies;

        foreach ($type->bodyType()->where('product_id','!=',null)->get() as $body)
        {
            $products[] = [
                 'product_id' => $body->product_id,
                 'body_id' => $body->body_id,
            ];
        }

        $selected = collect($products)->pluck('body_id', 'product_id')->toArray();

        $bodies = array_diff($bodies,$selected);

        $this->type->findOrFail($id)->bodyType()->delete();

        foreach ($bodies as $body){
            $type->bodyType()->insert([[
                'body_id' => $body,
                'type_id' => $type->id,
            ]]);
        }

        foreach ($selected as $k => $v) {
            $type->bodyType()->insert([[
                'body_id' => $v,
                'type_id' => $type->id,
                'product_id' => $k
            ]]);
        }

        return redirect()
            ->route('admin.brand.edit', $type->brand->id);
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

        $type->bodyType()->delete();
        $type->delete();

        return redirect()->back();
    }
}
