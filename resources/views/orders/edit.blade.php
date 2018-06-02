@extends('index')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order - Detail</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Employee:</label>
                                    <p class="help-block">{{ $detail['orderdetail'][0]['nameEmployee'] }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Customer:</label>
                                    <p class="help-block">{{ $detail['orderdetail'][0]['nameCustomer'] }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Order Date:</label>
                                    <p class="help-block">{{ $detail['orderdetail'][0]['orderDate'] }}</p>
                                </div>

                                <a  href="{{ route('deliveries.edit', $detail['orderdetail'][0]['keyOrder']) }}" class="btn btn-info" >
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    Deliver
                                </a>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form role="form">
                                <table class="table ">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail['orderdetail'] as $pr)
                                        <tr>
                                            <td>{{ $pr['nameProduct'] }}</td>
                                            <td class="text-center">{{ $pr['quantity'] }}</td>
                                            <td>{{ $pr['salesPrice'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot class="bg-info">
                                        <tr>
                                            <th>Total:</th>
                                            <th>Art: {{ $total->art }}</th>
                                            <th>${{ $total->total }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection