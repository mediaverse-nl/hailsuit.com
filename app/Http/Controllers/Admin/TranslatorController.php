<?php

namespace App\Http\Controllers\Admin;

use App\AppLanguage;
use App\Body;
use App\Detail;
use App\Property;
use App\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TranslatorController extends Controller
{
    protected $translator;
    protected $languages;

    /**
     * TranslatorController constructor.
     * @param Translation $translation
     * @param AppLanguage $languages
     */
    public function __construct(Translation $translation, AppLanguage $languages)
    {
        $this->translator = $translation;
        $this->languages = $languages;
    }

    /**
     * @param $id
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, $type)
    {
        $type = 'App\\'.ucfirst($type);

        $languages = $this->languages->get();

        $model = $this->getModel($type);

        $text = $this->translator
            ->where('commentable_id','=', $id)
            ->where('commentable_type','=', $type)
            ->first();

        return view('admin.translator.edit')
            ->with('text', $text)
            ->with('model', $model)
            ->with('id', $id)
            ->with('languages', $languages);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->getModel($request->type);

        foreach ($request->translation as $translation => $value){
            $model->findOrFail($id)
                ->translation()
                ->where('language_id', '=', $translation)
                ->first()
                ->update(['text' => $value]);
        }

        return redirect()->back();
    }


    public function getModel($type)
    {
        if ($type == "App\\Detail"){
            $model = new Detail();
        }else if ($type == "App\\Body"){
            $model = new Body();
        }else if ($type == "App\\Property"){
            $model = new Property();
        }else{
            abort(404);
        }

        return $model;
    }
}
