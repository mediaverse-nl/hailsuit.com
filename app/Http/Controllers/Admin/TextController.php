<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
use App\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextController extends Controller
{
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
        $text = $this->text->groupBy('key_name')->get();

        return view('admin.text.index')
            ->with('texts', $text);
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
        $texts = $this->text
            ->where('key_name', '=', $text->key_name)
            ->get();

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
