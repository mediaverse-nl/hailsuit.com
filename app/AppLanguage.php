<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppLanguage extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'app_language';

    public $timestamps = true;

    protected $fillable = ['country', 'country_code', 'currency', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function productTranslation()
    {
        return $this->belongsTo('App\ProductTranslation', 'language_id', 'id');
    }

    public function faqTranslation()
    {
        return $this->belongsTo('App\FaqTranslation', 'language_id', 'id');
    }

    public function translation()
    {
        return $this->belongsTo('App\Translation', 'language_id', 'id');
    }

    public function getLangFromCode($lang_code)
    {
        return $this->where('country_code_short','=',$lang_code)->first();
    }
}
