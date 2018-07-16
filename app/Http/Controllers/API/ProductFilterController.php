<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductFilterController extends Controller
{
    protected $product;

    protected $brands;

    protected $types;

    public function __construct(Brand $brands, Type $types)
    {
        $this->brands = $brands;
        $this->types = $types;
    }

    public function filter($brand_id = null, $type = null, $year = null)
    {
        $types = null;
        $years = null;

        $brands = $this->brands->get(['id', 'name']);

        if ($brand_id){

            $types = $this->types
                ->where('brand_id', '=', $brand_id)
                ->groupBy('value')
                ->get();

            $types = $types->pluck('value', 'value');

            if ($type){

                $years = $this->types
                    ->where('brand_id', '=', $brand_id)
                    ->where('value', '=', $type)
                    ->groupBy('model_year')
                    ->get();

                $years = $years->pluck('model_year', 'model_year');

                if ($year){

                    $selectedType = $this->types
                        ->where('brand_id', '=', $brand_id)
                        ->where('value', '=', $type)
                        ->where('model_year', '=', $year)
                        ->first();

                    if ($selectedType->product()->exists()){
                        return response()->json([
                            'url' => route('product.show', $selectedType->product()->first()->id),
                            'status' => true
                        ]);
                    }

                    return response()->json([
                        'message' => 'none',
                        'status' => false
                    ]);
                }
            }
        }

        return response()->json([
            'brands' => $brands->pluck('name', 'id'),
            'types' => $types,
            'years' => $years,
            'status' => true
        ]);
    }
}
