@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders</h1>
        </div>
    </div>

    @if(($orders) != null)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-striped " s>
                    <thead class="bg-primary">
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Detail</th>
                        </tr>
                    <thead>
                    <tbody>
                        @foreach($orders['order'] as $pr)
                            <tr>
                                <td>{{ $pr['keyOrder'] }}</td>
                                <td>{{ $pr['orderDate'] }}</td>
                                <td>{{ $pr['nameCustomer'] }}</td>
                                <td>
                                    <a  href="{{ route('eorders.show', $pr['keyOrder']) }}" class="btn btn-info" >
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif(($orders) == null)
        <h2 style="color: red"> You dont have orders yet!</h2>
    @endif
@endsection