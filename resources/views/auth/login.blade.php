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
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

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

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="welcome">WineStore</a>
    </div>
</nav>


<div class="container">
    @include('flash::message')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">

                {!! Form::open(['route' => 'login.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <fieldset>

                    <div class="form-group">
                        <input class="form-control" placeholder="User" name="username" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                    </div>

                    {{ Form::button('<i class="fa fa-sign-in" aria-hidden="true"></i> Login', ['type' => 'submit', 'class' => 'btn  btn-lg btn-success btn-block'] )  }}

                </fieldset>
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{  URL::asset('jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{  URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{  URL::asset('metisMenu/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{  URL::asset('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>