@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('dashboard') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-2 col-sm-6 mb-2">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-inbox"></i>
                    </div>
                    <div class="mr-5">{!! $orderCount !!} New Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.order.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-2">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-archive"></i>
                    </div>
                    <div class="mr-5">{!! $productCount !!} products</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.product.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-2">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-font"></i>
                    </div>
                    <div class="mr-5">Texts</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.text-editor.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-2">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-image"></i>
                    </div>
                    <div class="mr-5">Images</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.text-editor.index') !!}') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-2">
            <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-question"></i>
                    </div>
                    <div class="mr-5">F.A.Q.</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.faq.index') !!}') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
            {{--<div class="card text-white bg-warning o-hidden h-100 disabled">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="card-body-icon">--}}
                        {{--<i class="fa fa-fw fa-bell"></i>--}}
                    {{--</div>--}}
                    {{--<div class="mr-5">11 New Tasks!</div>--}}
                {{--</div>--}}
                {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
                    {{--<span class="float-left">View Details</span>--}}
                    {{--<span class="float-right">--}}
                    {{--<i class="fa fa-angle-right"></i>--}}
                  {{--</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<canvas id="myChart" width="400" height="400"></canvas>--}}


        {{--{{dd($analyticsData)}}--}}

    </div>

@endsection

@push('css')
    <style>
        .card{
            border-radius: 0px;
            border: 0px;
        }
    </style>
@endpush

@push('js')
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
@endpush