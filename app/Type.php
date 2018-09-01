<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'type';

    public $timestamps = false;

    protected $fillable = ['product_id', 'brand_id', 'model_year', 'value'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function scopeCurrentTypes($query, $product_id)
    {
        return $query->where('product_id', '=', $product_id);
    }

    public function scopeAvailableTypes($query)
    {
        return $query->orWhere('product_id', '=', null);
    }
}
