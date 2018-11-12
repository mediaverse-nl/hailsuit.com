<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'property';

    public $timestamps = false;

    protected $fillable = ['detail_id'];

    public function detail()
    {
        return $this->belongsTo('App\Detail', 'detail_id', 'id');
    }

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }

    public function productProperty()
    {
        return $this->hasMany('App\ProductProperty', 'property_id', 'id');
    }
}
