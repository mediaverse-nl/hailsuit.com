<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Spatie\LaravelAnalytics\LaravelAnalytics;

//use Spatie\Analytics\Analytics;
//use Spatie\Analytics\Period;

class DashboardController extends Controller
{
//    protected $analytics;
//
//    public function __construct(LaravelAnalytics $analytics)
//    {
//        $this->analytics = $analytics;
//    }

    public function __invoke()
    {
//        Laravel
        //retrieve visitors and pageview data for the current day and the last seven days
//        $analyticsData = $this->analytics->fetchVisitorsAndPageViews(Peri::days(7));

//        $analyticsData = LaravelAnalytics::getVisitorsAndPageViews(7);

        return view('admin.dashboard');
    }
}
