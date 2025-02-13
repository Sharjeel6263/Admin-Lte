@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('users') }}</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @can('user-create')
                    <a href="{{route('users.create')}}" class="btn btn-success mb-2">Create User</a>
                    @endcan
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>
                                    @foreach ($user->getRoleNames() as $role)
                                        <button class="btn btn-success btn-sm">{{ $role }}</button>
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        @can('user-list')
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                                        @endcan
                                        @can('user-edit')
                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        @endcan
                                        @can('user-delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @endcan
                                        @can('user-list')
                                        <a href="{{ route('users.sendMail', $user->id) }}" class="btn btn-warning btn-sm mt-1">Send Email</a>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
