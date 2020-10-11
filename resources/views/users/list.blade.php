@extends('layouts.master')

@section('content')
    <div class="container w-75">
        <div class="row mt-3">
            <div class="col"><h3 >List User</h3></div>
            <div class="col text-right">
                <a href="{{ route('create.users') }}" class="btn btn-info">Add</a>
            </div>
        </div>
        <div class="card bg-dark text-white  mt-3">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('edit.users', $user->id) }}" class="btn btn-sm btn-outline-light">Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
