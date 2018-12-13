<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $order;
    protected $product;

    public function __construct(Order $order)
    {
//        $this->analytics = $analytics;
        $this->order = $order;
    }

    public function __invoke()
    {
//        Laravel
        //retrieve visitors and pageview data for the current day and the last seven days
//        $analyticsData = $this->analytics->fetchVisitorsAndPageViews(Peri::days(7));

//        $analyticsData = LaravelAnalytics::getVisitorsAndPageViews(7);

        $order = $this->order->get();

        return view('admin.dashboard')
            ->with('order', $order->where('status', '=', 'paid')->count());
    }
}
