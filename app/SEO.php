<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $primaryKey = 'route_name';

    public $incrementing = false;

    protected $table = 'property';

    public $timestamps = true;

    protected $fillable = ['detail_id', 'value'];

    public function appLanguage()
    {
        return $this->belongsTo('App\Language', 'language_id', 'id');
    }
}
