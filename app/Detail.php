<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'detail';

    public $timestamps = false;

    protected $fillable = ['value'];

    public function properties()
    {
        return $this->hasMany('App\Property', 'detail_id', 'id');
    }
}
