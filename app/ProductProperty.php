<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'property';

    public $timestamps = false;

    protected $fillable = ['detail_id', 'value'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function property()
    {
        return $this->belongsTo('App\Property', 'property_id', 'id');
    }
}
