<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
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
    protected $language;

    public function __construct(FAQ $faq, AppLanguage $language)
    {
        $this->faq = $faq;
        $this->language = $language;
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
        $languages = $this->language->get();

        return view('admin.faq.create')
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
        $faq = $this->faq->create(['created_at' => null]);

        foreach ($request->translation as $translation => $value)
        {
            $faq->faqTranslation()->insert([
                'faq_id' => $faq->id,
                'language_id' => $translation,
                'title' => $value['title'] == '' ? '' : $value['title'],
                'description' => $value['description'] == '' ? '' : $value['description']
            ]);
        }

        return redirect()
            ->route('admin.faq.edit', $faq->id);
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
        $languages = $this->language->get();

        return view('admin.faq.edit')
            ->with('faq', $faq)
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
        $faq = $this->faq->findOrFail($id);

        foreach ($request->translation as $translation => $value){
            $faq->faqTranslation()
                ->where('language_id', '=', $translation)
                ->update([
                    'faq_id' => $faq->id,
                    'title' => $value['title'] == '' ? '' : $value['title'],
                    'description' => $value['description'] == '' ? '' : $value['description']
                ]);
        }

        return redirect()
            ->back();
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
