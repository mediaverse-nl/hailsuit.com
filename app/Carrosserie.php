<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrosserie extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'carrosserie';

    public $timestamps = true;

    protected $fillable = ['name', 'image', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function types()
    {
        return $this->hasMany('App\Type');
    }

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }
}
