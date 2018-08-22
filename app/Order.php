<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = [];

    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder', 'order_id', 'id');
    }
}
