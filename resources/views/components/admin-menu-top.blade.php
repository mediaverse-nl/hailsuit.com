<ul class="navbar-nav ml-auto">

   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
                  <span class="badge badge-pill badge-warning">0 New</span>
                </span>
            <span class="indicator text-success d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                  {{--<span class="text-success">--}}
                    {{--<strong>--}}
                      {{--<i class="fa fa-long-arrow-up fa-fw"></i></strong>--}}
                  {{--</span>--}}
                <span class="small float-right text-muted"></span>
                <div class="dropdown-message small">There are no messages</div>
            </a>
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
                  {{--<span class="text-danger">--}}
                    {{--<strong>--}}
                      {{--<i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>--}}
                  {{--</span>--}}
                {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
                  {{--<span class="text-success">--}}
                    {{--<strong>--}}
                      {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
                  {{--</span>--}}
                {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>
            Logout
        </a>
    </li>
</ul>