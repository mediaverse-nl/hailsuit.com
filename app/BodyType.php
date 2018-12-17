<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'body_type';

    public $timestamps = false;

    protected $fillable = ['type_id', 'body_id'];

    public function body()
    {
        return $this->belongsTo('App\Body', 'body_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }

    public function scopeCurrentTypes($query, $product_id)
    {
        return $query->where('product_id', '=', $product_id);
    }

    public function scopeAvailableTypes($query, $all = false)
    {
        if ($all){
            $q = $query->orWhere('product_id', '=', null);
        }else{
            $q = $query->where('product_id', '=', null);
        }

        return $q;
    }
}
