@extends('index')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>
    </div>
</div>


<div class="panel panel-default">

    <div class="panel-heading">
        <a href="{{route('products.create')}}">
            <i class="fa glyphicon-plus" aria-hidden="true"></i>
            Add Product
        </a>
    </div>

    <div class="panel-body">
        <table class="table table-hover table-striped" id="dataTables-example">
            <thead class="bg-primary">
                <tr>
                    <th>Name</th>
                    <th>Lts</th>
                    <th>Sales Price</th>
                    <th>Stock</th>
                    <th>Availables</th>
                    <th>Category</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            <thead>

            <tbody>
                @foreach($products['product'] as $pr)
                    <tr>
                        <td>{{ $pr['name'] }}</td>
                        <td>{{ $pr['ml'] }}</td>
                        <td>{{ $pr['salesPrice'] }}</td>
                        <td>{{ $pr['stock'] }}</td>
                        <td>{{ $pr['availables'] }}</td>
                        <td>{{ $pr['tp'] }}</td>
                        <td>
                            <a  href="{{ route('products.edit', $pr['keyProduct']) }}" class="btn btn-info" >
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('products.destroy', $pr['keyProduct']) }}"  onclick="return confirm('¿Are you sure you want delete the product?')" class="btn btn-danger">
                                <i class="fa fa-remove fa-lg "></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection