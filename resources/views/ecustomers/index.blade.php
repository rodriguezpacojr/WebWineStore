@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customers</h1>
        </div>
    </div>

    @if(($customers) != null)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-striped " s>
                    <thead class="bg-primary">
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>RFC</th>
                        <th>Route</th>
                    </tr>
                    <thead>
                    <tbody>

                    </tbody>
                    @foreach($customers['customer'] as $pr)
                        <tr>
                            <td>{{ $pr['name'] }}</td>
                            <td>{{ $pr['lastName'] }}</td>
                            <td>{{ $pr['email'] }}</td>
                            <td>{{ $pr['phone'] }}</td>
                            <td>{{ $pr['RFC'] }}</td>
                            <td>{{ $pr['route'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @elseif(($customers) == null)
        <h2 style="color: red"> You dont have customers yet!</h2>
    @endif
@endsection