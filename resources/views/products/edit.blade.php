@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>
    </div>

    {!! Form::open(array('route' => ['products.update',$product->keyProduct], 'method' => 'PUT', 'files' => true)) !!}
        <div class="panel panel-primary">
            <div class="panel-heading">Edit product: {{$product->name}}</div>
            <div class="panel-body">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('name','Name: ') !!}
                            {!! Form::text('name',$product->name,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('ml','Ml: ') !!}
                            {!! Form::text('ml',$product->ml,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('color','Color: ') !!}
                            {!! Form::text('color',$product->color,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('taste','Taste: ') !!}
                            {!! Form::text('taste',$product->taste,['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('stock','Stock: ') !!}
                            {!! Form::text('stock',$product->stock,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('salesPrice','Sales Price: ') !!}
                            {!! Form::text('salesPrice',$product->salesPrice,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-5">
                            {!! Form::label('availables','Availables: ') !!}
                            {!! Form::text('availables',$product->availables,['class' => 'form-control']) !!}
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

                <div class="form-group row">
                    <div class="offset-sm-2 col-xs-5">
                        {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection