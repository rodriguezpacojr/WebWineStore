@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Routes</h1>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{route('routes.create')}}" >
                <i class="fa glyphicon-plus" aria-hidden="true"></i>
                Add Route
            </a>
        </div>

        <div class="panel-body">
            <table class="table table-hover table-striped " s>
                <thead class="bg-primary">
                <tr>
                    <th>Name</th>
                    <th>Employee</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <thead>
                <tbody>

                </tbody>
                @foreach($routes['route'] as $pr)
                    <tr>
                        <td>{{ $pr['destination'] }}</td>
                        <td>{{ $pr['employee'] }}</td>
                        <td>
                            <a  href="{{ route('routes.edit', $pr['keyRoute']) }}" class="btn btn-info" >
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('routes.destroy', $pr['keyRoute']) }}"  onclick="return confirm('¿Are you sure you want delete the route?')" class="btn btn-danger">
                                <i class="fa fa-remove fa-lg "></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection