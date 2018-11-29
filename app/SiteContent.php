<?php

namespace App;

use App\Http\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    use LanguageTrait;

    protected $primaryKey = 'id';

    protected $table = 'site_content';

    public $timestamps = false;

    protected $fillable = ['key_name', 'text_type'];

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }
}
