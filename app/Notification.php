<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
//    protected $primaryKey = 'id';

    protected $table = 'notifications';

    public $timestamps = true;

//    protected $fillable = ['name', 'image', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];



}
