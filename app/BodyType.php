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
}
