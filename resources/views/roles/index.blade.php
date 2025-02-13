@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @canany('role-create')
                    <a href="{{route('roles.create')}}" class="btn btn-success mb-2">Create role</a>
                    @endcan
                    @canany(['role-list', 'role-edit', 'role-delete'])
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">Id</th>
                                <th>Name</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        @can('role-list')
                                        <a href="{{route('roles.show',$role->id)}}"class="btn btn-info btn-sm">Show</a>
                                        @endcan
                                        @can('role-edit')
                                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        @endcan
                                        @can('role-delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
