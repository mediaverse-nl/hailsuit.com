<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'faq';

    public $timestamps = true;

    protected $fillable = ['title', 'description'];

    protected $dates = ['created_at', 'updated_at'];

}
