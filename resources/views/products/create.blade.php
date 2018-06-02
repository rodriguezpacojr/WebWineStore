@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Product</h1>
        </div>
    </div>

    {!! Form::open(['route' => 'products.store','method' => 'POST','files' => true, 'enctype' => 'multipart/form-data']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Create Product</div>
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
                        {!! Form::label('ml','Ml:') !!}
                        {!! Form::text('ml',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-5">
                        {!! Form::label('color','Color:') !!}
                        {!! Form::text('color',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-5">
                        {!! Form::label('taste','Taste:') !!}
                        {!! Form::text('taste',null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group row">
                    <div class="col-xs-5">
                        {!! Form::label('stock','Stock:') !!}
                        {!! Form::text('stock',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-5">
                        {!! Form::label('salesPrice','Sales Price:') !!}
                        {!! Form::text('salesPrice',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-5">
                        {!! Form::label('availables','Availables:') !!}
                        {!! Form::text('availables',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-5">
                        {!! Form::label('keytypeproduct','Categoria') !!}
                        <select class="form-control" name="keytypeproduct">
                            @foreach($categorias['typeproduct'] as $ca)
                                <option value="{{ $ca['keyTypeProduct'] }}"> {{ $ca['nameTypeProduct'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="center">
                <div class="center">
                    {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection