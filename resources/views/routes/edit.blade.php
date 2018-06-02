@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Route</h1>
        </div>
    </div>

    {!! Form::open(array('route' => ['routes.update',$route->keyRoute], 'method' => 'PUT', 'files' => true)) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Route: {{$route->destination}}</div>
        <div class="panel-body">

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('name','Name: ') !!}
                    {!! Form::text('name',$route->destination,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('keyEmployee','Employee: ') !!}
                    {!! Form::text('keyEmployee',$route->keyEmployee,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-xs-5">
                    {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@endsection