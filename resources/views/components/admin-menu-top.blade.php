<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
                  <span class="badge badge-pill badge-primary">12 New</span>
                </span>
            <span class="indicator text-primary d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
                  <span class="badge badge-pill badge-warning">6 New</span>
                </span>
            <span class="indicator text-warning d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                  <span class="text-success">
                    <strong>
                      <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                  </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                  <span class="text-danger">
                    <strong>
                      <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                  </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                  <span class="text-success">
                    <strong>
                      <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                  </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
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


{{--<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">--}}

    {{--<a class="navbar-brand mr-1" href="{{route('admin.dashboard')}}">Start Bootstrap</a>--}}

    {{--<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">--}}
        {{--<i class="fas fa-bars"></i>--}}
    {{--</button>--}}

    {{--<!-- Navbar Search -->--}}
    {{--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">--}}
{{--<!--        <div class="input-group">-->--}}
{{--<!--            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">-->--}}
{{--<!--            <div class="input-group-append">-->--}}
{{--<!--                <button class="btn btn-primary" type="button">-->--}}
{{--<!--                    <i class="fas fa-search"></i>-->--}}
{{--<!--                </button>-->--}}
{{--<!--            </div>-->--}}
{{--<!--        </div>-->--}}
    {{--</form>--}}

    {{--<!-- Navbar -->--}}
    {{--<ul class="navbar-nav ml-auto ml-md-0">--}}
        {{--<li class="nav-item dropdown no-arrow mx-1">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--<i class="fas fa-bell fa-fw"></i>--}}
                {{--<span class="badge badge-danger">9+</span>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">--}}
                {{--<a class="dropdown-item" href="#">Action</a>--}}
                {{--<a class="dropdown-item" href="#">Another action</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="#">Something else here</a>--}}
            {{--</div>--}}
        {{--</li>--}}
        {{--<li class="nav-item dropdown no-arrow mx-1">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--<i class="fas fa-envelope fa-fw"></i>--}}
                {{--<span class="badge badge-danger">7</span>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">--}}
                {{--<a class="dropdown-item" href="#">Action</a>--}}
                {{--<a class="dropdown-item" href="#">Another action</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="#">Something else here</a>--}}
            {{--</div>--}}
        {{--</li>--}}
        {{--<li class="nav-item dropdown no-arrow">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--<i class="fas fa-user-circle fa-fw"></i>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">--}}
                {{--<a class="dropdown-item" href="#">Settings</a>--}}
                {{--<a class="dropdown-item" href="#">Activity Log</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>--}}

            {{--</div>--}}
        {{--</li>--}}
    {{--</ul>--}}

{{--</nav>--}}