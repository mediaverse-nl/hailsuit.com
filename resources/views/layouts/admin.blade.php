<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin panel</title>

    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <style>
        .content-wrapper{
            background: #F4F4F4 !important;
        }
        .card{
            border-radius: 0px;
            border: none;
        }
        ::-webkit-scrollbar {
            background-color: #F5F5F5;
            float: left;
            height: 300px;
            margin-bottom: 25px;
            margin-left: 22px;
            margin-top: 40px;
            width: 5px;
            overflow-y: scroll;
        }
        ::-webkit-scrollbar-track {
            background: #E9ECEF;
        }
        ::-webkit-scrollbar-thumb {
            background: #343A40;
        }

    </style>
    <!-- Styles -->
    @stack('css')

</head>
<body class="{{Auth()->check() ? '' : 'bg-dark'}} fixed-nav sticky-footer" id="page-top">

    @include('components.notification')

    @if(Auth()->check())

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                @include('components.admin-menu-left')
                @include('components.admin-menu-top')
            </div>
        </nav>

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                @yield('breadcrumb')
                {{--<ol class="breadcrumb">--}}
                    {{--<li class="breadcrumb-item">--}}
                        {{--<a href="#">Dashboard</a>--}}
                    {{--</li>--}}
                    {{--<li class="breadcrumb-item active">Tables</li>--}}
                {{--</ol>--}}

                @yield('content')
            </div>

        </div>
        <!-- /.content-wrapper -->
    @else
        @yield('content')
    @endif

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Mediaverse.nl 2018</small>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin.min.js"></script>
    <script src="/js/datatables-plugin.js"></script>

    @stack('js')

</body>
</html>
