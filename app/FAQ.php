<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'faq';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = ['updated_at'];

}
