<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'translation';

    public $timestamps = true;

    protected $fillable = ['text', 'language_id', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function appLanguage()
    {
        return $this->belongsTo('App\AppLanguage', 'language_id', 'id');
    }

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function keyNameHasLangs()
    {
        return $this->where('key_name',  '=', $this->key_name)
            ->where('text',  '!=', '')
            ->get()->pluck('appLanguage.country_code_short');
    }

}
