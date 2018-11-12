<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'site_content';

    public $timestamps = false;

    protected $fillable = ['key_name'];

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }
}
