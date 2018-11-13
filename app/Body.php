<?php

namespace App;

use App\Http\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    use LanguageTrait;

    protected $primaryKey = 'id';

    protected $table = 'body';

    public $timestamps = false;

    protected $fillable = ['image'];

    public function bodyTypes()
    {
        return $this->hasMany('App\BodyType');
    }

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }
}
