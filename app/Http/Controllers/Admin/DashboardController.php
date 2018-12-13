<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $order;
    protected $product;

    public function __construct(Order $order, Product $product)
    {
//        $this->analytics = $analytics;
        $this->order = $order;
        $this->product = $product;
    }

    public function __invoke()
    {
//        Laravel
        //retrieve visitors and pageview data for the current day and the last seven days
//        $analyticsData = $this->analytics->fetchVisitorsAndPageViews(Peri::days(7));

//        $analyticsData = LaravelAnalytics::getVisitorsAndPageViews(7);

        $order = $this->order;
        $product = $this->product->get();

        return view('admin.dashboard')
            ->with('productCount', $product->count())
            ->with('orderCount', $order->countNew());
    }
}
