@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Route</h1>
        </div>
    </div>

{!! Form::open(['route' => 'routes.store','method' => 'POST','files' => true, 'enctype' => 'multipart/form-data']) !!}
<div class="panel panel-primary">
    <div class="panel-heading">Create Route</div>
    <div class="panel-body">
        <div class="form-group row">
            <div class="col-xs-5">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-5">
                {!! Form::label('keyemployee','Employee:') !!}
                <select class="form-control" name="keyemployee">
                    @foreach($employee['employee'] as $ca)
                        <option value="{{ $ca['keyEmployee'] }}"> {{ $ca['name'] }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-xs-5">
                {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection