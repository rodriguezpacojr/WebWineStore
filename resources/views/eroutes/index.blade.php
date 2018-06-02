@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Routes</h1>
        </div>
    </div>

    @if(($routes) != null)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-striped " s>
                    <thead class="bg-primary">
                    <tr>
                        <th>Name</th>
                        <th>Customers</th>
                    </tr>
                    <thead>
                    <tbody>

                    </tbody>
                    @foreach($routes['route'] as $pr)
                        <tr>
                            <td>{{ $pr['destination'] }}</td>
                            <td>{{ $pr['customers'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @elseif(($routes) == null)
        <h2 style="color: red"> You dont have routes yet!</h2>
    @endif
@endsection