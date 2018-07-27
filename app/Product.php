<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'product';

    public $timestamps = false;

    protected $fillable = ['price', 'discount', 'stock', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function types()
    {
        return $this->hasMany('App\Type');
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
