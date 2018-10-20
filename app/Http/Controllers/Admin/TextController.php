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

        $languages = $this->languages->get();

        return view('admin.text.edit')
            ->with('languages', $languages)
            ->with('text', $text);
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
//        return
    }
}
