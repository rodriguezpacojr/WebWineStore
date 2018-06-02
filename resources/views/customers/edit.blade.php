@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Customer</h1>
        </div>
    </div>

    {!! Form::open(array('route' => ['customers.update',$customer->keyCustomer], 'method' => 'PUT', 'files' => true)) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Customer: {{$customer->name}}</div>
        <div class="panel-body">

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('name','Name: ') !!}
                    {!! Form::text('name',$customer->name,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('lastName','Last Name: ') !!}
                    {!! Form::text('lastName',$customer->lastName,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('bornDate','Born Date: ') !!}
                    {!! Form::text('bornDate',$customer->bornDate,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('email','Email: ') !!}
                    {!! Form::email('email',$customer->email,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('phone','Phone: ') !!}
                    {!! Form::text('phone',$customer->phone,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('RFC','RFC: ') !!}
                    {!! Form::text('RFC',$customer->RFC,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('entryDate','Entry Date: ') !!}
                    {!! Form::text('entryDate', $customer->entryDate, ['class' => 'form-control']) !!}
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

            <div class="form-group row">
                <div class="offset-sm-2 col-xs-5">
                    {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@endsection