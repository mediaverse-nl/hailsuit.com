<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
use App\Http\Traits\LanguageTrait;
use App\SiteContent;
use App\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextController extends Controller
{
    use LanguageTrait;

    protected $text;
    protected $siteContent;
    protected $languages;

    public function __construct(Translation $translation, AppLanguage $languages, SiteContent $siteContent)
    {
        $this->text = $translation;
        $this->languages = $languages;
        $this->siteContent = $siteContent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text = $this->text
            ->where('commentable_type','=', 'App\SiteContent')
            ->where('language_id',  '=', $this->getLangId())
            ->get();

        $languages = $this->languages
            ->get();

        return view('admin.text.index')
            ->with('texts', $text)
            ->with('languages', $languages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $text = $this->text->findOrFail($id);
        $texts = $text->commentable->translation;
        $languages = $this->languages->get();

        return view('admin.text.edit')
            ->with('languages', $languages)
            ->with('text', $text)
            ->with('texts', $texts);
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
        $translations = $this->siteContent
            ->where('key_name', '=', $id)
            ->first();

        foreach ($translations->translation as $value) {
            $value->update(['text' => $request->translation[$value->language_id]]);
        }

        return redirect()
            ->back();
    }
}
