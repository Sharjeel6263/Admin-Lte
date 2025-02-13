@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('roles') }}</div>
                <div class="card-body">
                    <a href="{{route('roles.index')}}" class="btn btn-success mb-2">Back</a>
                    <form action="{{route('roles.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <h3>Permissions</h3>
                            @foreach ($permissions as $permission )
                                <label><input type="checkbox"name="permissions[{{$permission->name}}]" value="{{$permission->name}}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>{{ $permission->name }}</label><br>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success m-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
