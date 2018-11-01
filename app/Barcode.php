<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Milon\Barcode\DNS1D;

class Barcode extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'barcode';

    public $timestamps = true;

    protected $fillable = ['product_id', 'value', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function ean13()
    {
        return DNS1D::getBarcodeHTML($this->value, "EAN13");
    }
}
