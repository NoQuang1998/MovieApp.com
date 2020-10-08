@extends('layouts.master')


@section('content')


    <div class="container w-75">
        <h1>Add Role</h1>
        <div class="card bg-light">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên vai trò</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô tả vai trò</label>
                        <textarea type="text" name="display_name" class="form-control"></textarea>
                    </div>
                    <div class="row mb-3">
                        {{-- checkbox permission --}}
                        @foreach ($permissionParents as $perParent)
                            <div class="col-6">
                                <div class="card bg-light ">
                                    <div class="card-header bg-primary text-white">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox_wrapper"
                                                id="chk_all{{ $perParent->id }}">
                                            <label class="custom-control-label" for="chk_all{{ $perParent->id }}">Check
                                                All</label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $perParent->display_name }}</h5>
                                        @foreach ($perParent->permissionChildren as $perChildren)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input checkbox_childrent"
                                                    id="chk_child{{ $perChildren->id }}">
                                                <label class="custom-control-label"
                                                    for="chk_child{{ $perChildren->id }}">{{ $perChildren->display_name }}
                                                    -- {{ $perChildren->name }} </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end checkbox --}}

                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $('.checkbox_wrapper').on('click', function() {
            $(this).parents('.card .col-6').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection
