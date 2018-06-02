@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Customer</h1>
        </div>
    </div>

{!! Form::open(['route' => 'customers.store','method' => 'POST','files' => true, 'enctype' => 'multipart/form-data']) !!}
<div class="panel panel-primary">
    <div class="panel-heading">Crear customer</div>
    <div class="panel-body">
        <div class="col-lg-6">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('name','Name:') !!}
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('lastName','Last Name: ') !!}
                    {!! Form::text('lastName',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('bornDate','Born Date: ') !!}
                    {!! Form::date('bornDate',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('email','Email: ') !!}
                    {!! Form::email('email',null,['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('phone','Phone: ') !!}
                    {!! Form::text('phone',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('RFC','RFC: ') !!}
                    {!! Form::text('RFC',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('entryDate','Entry Date: ') !!}
                    {!! Form::date('entryDate',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('keyRoute','Route') !!}
                    <select class="form-control" name="keyRoute">
                        @foreach($categorias['route'] as $ca)
                            <option value="{{ $ca['keyRoute'] }}"> {{ $ca['destination'] }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-xs-5">
                {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection