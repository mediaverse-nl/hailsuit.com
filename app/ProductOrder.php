<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'product_order';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
