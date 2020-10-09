@extends('layouts.master')

@section('content')
    <div class="container w-75">
        <div class="row mt-3">
            <div class="col"><h3 >List Roles</h3></div>
            <div class="col text-right">
                <a href="{{ route('create.roles') }}" class="btn btn-info">Add</a>
            </div>
        </div>
        <div class="card bg-dark text-white  mt-3">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <th>ID</th>
                        <th>Tên vai trò</th>
                        <th>Mô tả tên vai trò</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td><a href="{{ route('destroy.roles', $role->id) }}" class="btn btn-sm btn-outline-danger mr-1">Del</a><a href="{{ route('edit.roles', $role->id) }}" class="btn btn-sm btn-outline-light">Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
