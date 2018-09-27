<?php

namespace App\Http\Controllers\Admin;

use App\FAQ;
use App\Forms\FaqStoreForm;
use App\Forms\FaqUpdateForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;


class FAQController extends Controller
{
    use FormBuilderTrait;

    protected $formBuilder;
    protected $faq;

    public function __construct(FAQ $faq, FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = $this->faq->get();

        return view('admin.faq.index')
            ->with('faqs', $faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->formBuilder->create(FaqStoreForm::class, [
            'method' => 'POST',
            'url' => route('admin.faq.store'),
        ]);

        return view('admin.faq.create')
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
        $form = $this->form(FaqStoreForm::class);
        $form->redirectIfNotValid();

        $this->faq->create($form->getFieldValues());

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
        $faq = $this->faq->findOrFail($id);

        $form = $this->formBuilder->create(FaqUpdateForm::class, [
                'method' => 'PATCH',
                'url' => route('admin.faq.update', $faq->id),
                'model' => $faq,
            ], [
                'faq_id' => $id
            ]
        );

        return view('admin.faq.edit')
            ->with('faq', $faq)
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
        $form = $this->form(FaqUpdateForm::class);
        $form->redirectIfNotValid();

        $this->faq->update($form->getFieldValues());

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
        $faq = $this->faq->findOrFail($id);

        $faq->delete();

        return redirect()->back();
    }
}
