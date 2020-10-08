@extends('layouts.master')


@section('content')
    <div class="container w-50">
        <h1>Add User</h1>
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <form action="{{ route('store.users') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id[]" class="selectpicker form-control" multiple>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.my-select').selectpicker();
        });
    </script>
@endsection
