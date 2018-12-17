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

    protected $fillable = ['key_name', 'text_type', 'option'];

    protected $casts = [
        'options' => 'array', // Will convarted to (Array)
    ];

    public function translation()
    {
        return $this->morphMany('App\Translation', 'commentable');
    }

    public function options()
    {
        $keys = '';

        if(isset($this->option['mentions'])){
            $mentions = json_decode($this->option, true);

            $keys .= '[';
            foreach ($mentions['mentions'] as $key => $v){
                $keys .= '"'.$key.'",';
            }
            $keys .= ']';
        }

        return $keys;
    }
}
