<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'type';

    public $timestamps = false;

    protected $fillable = ['product_id', 'brand_id', 'model_year', 'value'];

    public function bodyType()
    {
        return $this->hasMany('App\BodyType', 'type_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
