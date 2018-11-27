<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
use App\Http\Traits\LanguageTrait;
use App\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextController extends Controller
{
    use LanguageTrait;

    protected $text;
    protected $languages;

    public function __construct(Translation $translation, AppLanguage $languages)
    {
        $this->text = $translation;
        $this->languages = $languages;
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
//        dd($text);
        $texts = $this->text
            ->where('commentable_type','=', 'App\SiteContent')

            ->whereHas('commentable', function ($query) use ($text) {
                $query->where('key_name', '=', $text->key_name);
            }, '=', 1, ['App\SiteContent'])
//            ->where('language_id',  '=', $this->getLangId())
            ->get();

        dd($texts);

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
        foreach ($request->translation as $key => $value){
            $translation = $this->text
                ->where('key_name', '=', $id)
                ->where('language_id', '=', $key)
                ->firstOrFail();

            $translation->update(['text' => $value]);
        }

        return redirect()->back();
    }
}
