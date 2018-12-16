<?php

namespace App\Http\Controllers\Admin;

use App\Body;
use App\Forms\BodyStoreForm;
use App\Forms\BodyUpdateForm;
use App\Http\Traits\LanguageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class BodyController extends Controller
{
    use FormBuilderTrait, LanguageTrait;

    protected $body;
    protected $formBuilder;

    public function __construct(Body $body, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->body = $body;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = $this->formBuilder->create(BodyStoreForm::class, [
            'method' => 'POST',
            'url' => route('admin.body.store')
        ]);

        $bodies = $this->body->get();

        return view('admin.body.index')
            ->with('bodies', $bodies)
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
        $form = $this->form(BodyStoreForm::class);
        $form->redirectIfNotValid();

        $newBody = $this->body->create([
            'image' => ''
        ]);

        $this->insertTranslation($newBody, $request->value);

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
        $body = $this->body->findOrFail($id);
        $bodies = $this->body
            ->get();

        $form = $this->formBuilder->create(BodyUpdateForm::class, [
            'method' => 'PATCH',
            'url' => route('admin.body.update', $body->id)
        ]);

        return view('admin.body.edit')
            ->with('body', $body)
            ->with('bodies', $bodies)
            ->with('form', $form);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $body = $this->body->findOrFail($id);

        $body->delete();

        return redirect()->back();
    }
}
