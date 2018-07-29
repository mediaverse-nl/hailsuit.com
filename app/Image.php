<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'image';

    public $timestamps = false;

    protected $fillable = ['product_id', 'alt_text', 'path', 'width', 'height'];

    public function product()
    {
        return $this->hasMany('App\Product', 'product_id', 'id');
    }
}
