@extends('index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Employees</h1>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{route('employees.create')}}" >
                <i class="fa glyphicon-plus" aria-hidden="true"></i>
                Add Employee
            </a>
        </div>

        <div class="panel-body">
            <table class="table table-hover table-striped " s>
                <thead class="bg-primary">
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>RFC</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <thead>
                <tbody>

                </tbody>
                @foreach($employees['employee'] as $pr)
                    <tr>
                        <td>{{ $pr['name'] }}</td>
                        <td>{{ $pr['lastName'] }}</td>
                        <td>{{ $pr['email'] }}</td>
                        <td>{{ $pr['phone'] }}</td>
                        <td>{{ $pr['RFC'] }}</td>
                        <td>
                            <a  href="{{ route('employees.edit', $pr['keyEmployee']) }}" class="btn btn-info" >
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('employees.destroy', $pr['keyEmployee']) }}"  onclick="return confirm('¿Are you sure you want delete the Employee?')" class="btn btn-danger">
                                <i class="fa fa-remove fa-lg "></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection