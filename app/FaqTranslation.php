<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'faq_translation';

    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    public function faq()
    {
        return $this->hasMany('App\faq', 'faq_id', 'id');
    }

    public function appLanguage()
    {
        return $this->belongsTo('App\AppLanguage', 'language_id', 'id');
    }
}
