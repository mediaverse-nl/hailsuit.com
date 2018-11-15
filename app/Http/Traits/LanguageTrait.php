<?php
/**
 * Created by PhpStorm.
 * User: deveron reniers
 * Date: 11-11-2018
 * Time: 18:28
 */

namespace App\Http\Traits;

use App\AppLanguage;
use Illuminate\Support\Facades\Lang;

trait LanguageTrait
{
    protected $defaultLanguage = 'en';

    public function language()
    {
        return new AppLanguage;
    }

    public function getLanguage()
    {
        return $this->language();
    }

    public function currentAppLanguage()
    {
        return Lang::locale();
    }

    public function defaultAppLanguage()
    {
        return $this->defaultLanguage;
    }

    public function getTranslation($default = false)
    {
        return $this->translation()
            ->where('language_id', '=', $this->getLangId($default))
            ->first()['text'];
    }

    public function getLangId($default = false)
    {
        $appLanguage = $this->currentAppLanguage();

        if ($default == true){
            $appLanguage = $this->defaultAppLanguage();
        }

        return $this->language()
            ->getLangFromCode($appLanguage)->id;
    }

    public function insertTranslation($model, $value)
    {
        foreach ($this->getLanguage()->get() as $lang){
            $model->translation()->create([
                'text' => $value,
                'language_id' => $lang->id
            ]);
        }
    }

    //returns one string entry
    public function translated($model)
    {
        return $model->where('language_id', '=', $this->getLangId())
            ->first();
    }
}