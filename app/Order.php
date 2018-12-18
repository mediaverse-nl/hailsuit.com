<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Milon\Barcode\DNS1D;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = [
        'payment_id',
        'company_name',
        'company_vat',
        'company_coc',
        'country',
        'state',
        'city',
        'postal_code',
        'address',
        'address_number',
        'name',
        'email',
        'telephone',
        'currency',
        'total_paid',
        'shipping_cost',
        'payment_method',
        'package_tracking_code'
    ];

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

    public function ean13()
    {
        return DNS1D::getBarcodeHTML($this->id, "EAN13");
    }
}
