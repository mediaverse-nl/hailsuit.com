<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Support\Facades\Lang;

class Product extends Model
{
    use SoftDeletes,Notifiable;

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

    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder', 'product_id', 'id');
    }

    public function price()
    {
        return number_format($this->price - $this->discount, 2);
    }

    public function tax()
    {
        $taxrate = env('TAX', 21);

        return number_format(($this->price / 121) * $taxrate, 2);
    }

    public function excludeTax()
    {
        return number_format($this->price - $this->tax(), 2);
    }

    public function discount()
    {
        return number_format($this->discount, 2);
    }

    public function getSelectedDetail($detail_id)
    {
        $details = $this->productProperties()->get();

        foreach ($details as $detail)
        {
            $property = $detail->property()
                ->where('detail_id', '=', $detail_id);
//                ->with('translation')
//                ->whereHas('translation', function($query)  {
//                    $query->where('language_id', '=', 5);
//                });
//
//            dd($property)

            if($property->count() > 0){
                return $property->first()->id;
            }
        }
    }

    public function defaultTranslationLanguage($translation)
    {
        $locale = new AppLanguage();

        return $translation->where('language_id', '=', $locale->getLangFromCode(Lang::locale())->id);
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

    public function addedStock($stock)
    {
        $this->update(['stock' => $stock]);
    }
}
