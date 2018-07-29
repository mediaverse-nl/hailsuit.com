<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'product';

    public $timestamps = true;

    protected $fillable = ['price', 'discount', 'stock', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function types()
    {
        return $this->hasMany('App\Type');
    }

    public function productTranslation()
    {
        return $this->hasMany('App\ProductTranslation', 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public function barcodes()
    {
        return $this->hasMany('App\Barcode', 'product_id', 'id');
    }

    public function productProperties()
    {
        return $this->hasMany('App\ProductProperty', 'product_id', 'id');
    }

    public function price()
    {

    }

    public function titleTranslated()
    {

    }

    public function descriptionTranslated()
    {

    }
}
