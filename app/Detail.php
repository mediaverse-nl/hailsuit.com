<?php

namespace App;

use App\Http\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use SoftDeletes, LanguageTrait;

    protected $primaryKey = 'id';

    protected $table = 'detail';

    public $timestamps = false;

    protected $fillable = ['deleted_at'];

    protected $dates = ['updated_at'];

    public function properties()
    {
        return $this->hasMany('App\Property', 'detail_id', 'id');
    }

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }
}
