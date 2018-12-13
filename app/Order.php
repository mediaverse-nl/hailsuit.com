<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = ['payment_id'];

    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder', 'order_id', 'id');
    }

    public function countNew()
    {
        return $this
            ->where('status', '=', 'paid')
            ->count();
    }
}
