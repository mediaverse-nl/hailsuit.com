<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'product_translation';

    public $timestamps = true;

    protected $fillable = ['product_id', 'language_id', 'name', 'description', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id','id');
    }

    public function appLanguage()
    {
        return $this->belongsTo('App\AppLanguage', 'language_id', 'id');
    }
}
