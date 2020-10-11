@extends('layouts.master')


@section('content')
    <div class="container w-50">
        <h1>Update User</h1>
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <form action="{{ route('update.users', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id[]" class="selectpicker form-control" multiple>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $roleChecked->contains('id', $role->id) ? 'selected' : ' ' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
