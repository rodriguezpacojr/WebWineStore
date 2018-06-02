@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Employee</h1>
        </div>
    </div>

    {!! Form::open(array('route' => ['employees.update',$employee->keyEmployee], 'method' => 'PUT', 'files' => true)) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Employee: {{$employee->name}}</div>
        <div class="panel-body">

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('name','Name: ') !!}
                    {!! Form::text('name',$employee->name,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('lastName','Last Name: ') !!}
                    {!! Form::text('lastName',$employee->lastName,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('bornDate','Born Date: ') !!}
                    {!! Form::text('bornDate',$employee->bornDate,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('email','Email: ') !!}
                    {!! Form::email('email',$employee->email,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('phone','Phone: ') !!}
                    {!! Form::text('phone',$employee->phone,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('RFC','RFC: ') !!}
                    {!! Form::text('RFC',$employee->RFC,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('entryDate','Entry Date: ') !!}
                    {!! Form::text('entryDate',$employee->entryDate,['class' => 'form-control']) !!}
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