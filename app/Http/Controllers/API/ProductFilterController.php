<?php

namespace App\Http\Controllers\API;

use App\Body;
use App\BodyType;
use App\Brand;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductFilterController extends Controller
{
    protected $product;

    protected $brands;

    protected $types;

    protected $bodyType;

    public function __construct(Brand $brands, Type $types, Body $body, BodyType $bodyType)
    {
        $this->brands = $brands;
        $this->types = $types;
        $this->bodies = $body;
        $this->bodyType = $bodyType;
    }

    public function filter($brand_id = null, $type = null, $year = null, $body_type_id = null)
    {
        $brands = $this->brands->get(['id', 'name as value']);

        $typesReturn = null;
        $yearsReturn = null;
        $bodiesReturn = null;

        if ($brand_id)
        {
            $types = $this->types
                ->where('brand_id', '=', $brand_id)
                ->groupBy('value')
                ->get();

            foreach ($types as $v){
                $typesReturn[] = [
                    'id' => $v->value,
                    'value' => $v->value
                ];
            }

            if ($type)
            {
                $years = $this->types
                    ->where('brand_id', '=', $brand_id)
                    ->where('value', 'like', "%".$type.'%')
                    ->groupBy('model_year')
                    ->get(['model_year']);

                foreach ($years as $v){
                    $yearsReturn[] = [
                        'id' => $v->model_year,
                        'value' => $v->model_year
                    ];
                }

                if ($year)
                {
                    $bodies = $this->types
                        ->where('brand_id', '=', $brand_id)
                        ->where('value', 'like', "%".$type.'%')
                        ->where('model_year', '=', $year)
                        ->first()
                        ->bodyType()
                        ->where('product_id', '!=', null)
                        ->get();

                    foreach ($bodies as $v){
                        $bodiesReturn[] = [
                            'id' => $v->id,
                            'value' => $v->body->getTranslation(),
                        ];
                    }

                    if ($body_type_id)
                    {
                        $bodyType = $this->bodyType->findOrFail($body_type_id);

                        if ($bodyType->product_id == null)
                        {
                            return response()->json([
                                'url' => false,
                                'status' => true
                            ]);
                        }else{
                            return response()->json([
                                'url' => route('product.show', $bodyType->product_id),
                                'status' => true
                            ]);
                        }
                    }
                }
            }
        }

        return response()->json([
            'brands' => $brands,
            'types' => $typesReturn,
            'years' => $yearsReturn,
            'bodies' => $bodiesReturn,
            'status' => true
        ]);





//        $brands = $this->brands->get(['id', 'name']);
//        $types = null;
//        $years = null;
//        $bodies = null;
//
//        if ($brand_id){
//
//            $types = $this->types
//                ->where('brand_id', '=', $brand_id)
//                ->groupBy('value')
//                ->get();
//
//            $types = $types->pluck('value', 'value');
//
//            if ($type){
//
//                $years = $this->types
//                    ->where('brand_id', '=', $brand_id)
//                    ->where('value', 'like', "%".$type.'%')
//                    ->groupBy('model_year')
//                    ->get();
//
//                $years = $years->pluck('model_year', 'model_year');
//
//                if ($year){
//
//                    $types = $this->types
//                        ->whereHas('partecipants', function ($query) {
//                            $query->where('IDUser', '=', 1);
//                        })
//                        ->where('brand_id', '=', $brand_id)
//                        ->where('model_year', '=', $year)
//                        ->where('value', 'like', "%".$type.'%')
//                        ->first();
//
//                    $types = $types->pluck('model_year', 'model_year');
//
//                    if ($types){
//
//                        $bodies = $this->types
//                            ->where('brand_id', '=', $brand_id)
//                            ->where('model_year', '=', $year)
//                            ->where('value', 'like', "%".$type.'%')
//                            ->first()->bodyType();
//
//                        $selectedBody = null;
//
//                        if ($selectedBody != null){
//                            return response()->json([
//                                'url' => route('product.show', $selectedBody->product()->first()->id),
//                                'status' => true
//                            ]);
//                        }
//
////                        return response()->json([
////                            'message' => 'none',
////                            'status' => false
////                        ]);
//                    }
//
//                }
//            }
//        }

//        return response()->json([
//            'brands' => $brands->pluck('name', 'id'),
//            'types' => $types,
//            'years' => $years,
//            'bodies' => $bodies,
//            'status' => true
//        ]);
    }
}
