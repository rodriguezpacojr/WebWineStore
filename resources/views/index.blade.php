<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WineStore</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('metisMenu/metisMenu.min.css') }} rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="welcome">WineStore</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('login.index') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    @if(($_SESSION['role']) == 'admin')
                        <li>
                            <a href="{{ route('dashboards.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="{{ route('products.index') }}"><i class="fa fa-tasks fa-fw"></i> Products</a>
                        </li>

                        <li>
                            <a href="{{ route('customers.index') }}"><i class="fa fa-user fa-fw"></i> Customers</a>
                        </li>

                        <li>
                            <a href="{{ route('employees.index') }}"><i class="fa fa-users fa-fw"></i> Employees</a>
                        </li>

                        <li>
                            <a href="{{ route('routes.index') }}"><i class="fa fa-map-marker fa-fw"></i> Routes</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Orders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart fa-fw"></i> Undelivered</a>
                                </li>
                                <li>
                                    <a href="{{ route('deliveries.index') }}"><i class="fa fa-shopping-cart fa-fw"></i> Delivered</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif

                    @if(($_SESSION['role']) == 'emplo')
                        <li>
                            <a href="{{ route('ecustomers.index') }}"><i class="fa fa-user fa-fw"></i> Customers</a>
                        </li>

                        <li>
                            <a href="{{ route('eroutes.index') }}"><i class="fa fa-map-marker fa-fw"></i> Routes</a>
                        </li>

                        <li>
                            <a href="{{ route('eorders.index') }}"><i class="fa fa-shopping-cart fa-fw"></i> Orders</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>



    <div id="page-wrapper">
        @include('flash::message')
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{  URL::asset('jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{  URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{  URL::asset('metisMenu/metisMenu.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{  URL::asset('raphael/raphael.min.js') }}"></script>
<script src="{{  URL::asset('morrisjs/morris.min.js') }}"></script>
<script src="{{  URL::asset('data/morris-data.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{  URL::asset('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
