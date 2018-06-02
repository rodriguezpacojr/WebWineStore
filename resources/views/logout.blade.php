@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" STYLE="color: red">Your Sesion has ended!</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <td>
        <a href="{{ route('login.index') }}"class="btn btn-info" >
            <i class="fa fa-remove" aria-hidden="true"></i>
            Ok
        </a>
    </td>
@endsection