<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'property';

    public $timestamps = false;

    protected $fillable = ['detail_id', 'value'];

    public function detail()
    {
        return $this->belongsTo('App\Detail', 'detail_id', 'id');
    }

    public function productProperty()
    {
        return $this->hasMany('App\ProductProperty', 'property_id', 'id');
    }
}
