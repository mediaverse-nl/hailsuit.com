<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class FAQ extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'faq';

    public $timestamps = true;

    protected $fillable = ['title', 'description'];

    protected $dates = ['created_at', 'updated_at'];

    public function faqTranslation()
    {
        return $this->hasMany('App\FaqTranslation', 'faq_id', 'id');
    }

    public function defaultTranslationLanguage($translation)
    {
        $locale = new AppLanguage();

        return $translation->where('language_id', '=', $locale->getLangFromCode(Lang::locale())->id);
    }

    public function titleTranslated($id = null)
    {
        $translation = $this->faqTranslation();

        if($id){
            $translation = $translation->where('language_id', '=', $id);
        }else{
            $translation = $this->defaultTranslationLanguage($translation);
        }

        return $translation
            ->first()['title'];
    }

    public function descriptionTranslated($id = null)
    {
        $translation = $this->faqTranslation();

        if($id){
            $translation = $translation->where('language_id', '=', $id);
        }else{
            $translation = $this->defaultTranslationLanguage($translation);
        }

        return $translation
            ->first()['description'];
    }
}
