<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'brand';

    public $timestamps = true;

    protected $fillable = ['name', 'image', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function types()
    {
        return $this->hasMany('App\Type');
    }
}
