<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    protected $analytics;

    public function __construct(Analytics $analytics)
    {
        $this->analytics = $analytics;
    }

    public function __invoke()
    {
        //retrieve visitors and pageview data for the current day and the last seven days
        $analyticsData = $this->analytics->fetchVisitorsAndPageViews(Period::days(7));

        return view('admin.dashboard')->with('analyticsData', $analyticsData);
    }
}
