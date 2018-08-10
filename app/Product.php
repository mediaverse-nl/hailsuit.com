<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'product';

    public $timestamps = true;

    protected $fillable = ['price', 'discount', 'stock', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function types()
    {
        return $this->hasMany('App\Type');
    }

    public function productTranslation()
    {
        return $this->hasMany('App\ProductTranslation', 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public function barcodes()
    {
        return $this->hasMany('App\Barcode', 'product_id', 'id');
    }

    public function productProperties()
    {
        return $this->hasMany('App\ProductProperty', 'product_id', 'id');
    }

    public function price()
    {

    }

    public function defaultTranslationLanguage($translation)
    {
        return $translation->where('language_id', '=', 1);
    }

    public function titleTranslated($id = null)
    {
        $translation = $this->productTranslation();

        if($id){
            $translation = $translation->where('language_id', '=', $id);
        }else{
            $translation = $this->defaultTranslationLanguage($translation);
        }

        return $translation
            ->first()
            ->name;
    }

    public function descriptionTranslated($id = null)
    {
        $translation = $this->productTranslation();

        if($id){
            $translation = $translation->where('language_id', '=', $id);
        }else{
            $translation = $this->defaultTranslationLanguage($translation);
        }

        return $translation
                ->first()
                ->description;

    }
}
