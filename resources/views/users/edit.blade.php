@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('users') }}</div>
                <div class="card-body">
                    <a href="{{route('users.index')}}" class="btn btn-success mb-2">Back</a>
                    <form action="{{route('users.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="phone_number" name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                            @error('phone_number')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-select form-control" name="roles[]"multiple >
                                <option >--Select Role--</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->name}}" {{ $user->hasRole($role->name) ? "selected" : ""}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success m-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
