@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Show User') }}</div>
                <div class="card-body">
                    <a href="{{route('users.index')}}" class="btn btn-success mb-2">Back</a>
                    <p><strong>Name:</strong> {{$user->name}} </p>
                    <p><strong>Email:</strong> {{$user->email}} </p>
                    <p><strong>Role:</strong>
                        @foreach ($user->getRoleNames() as $role)
                            <button class="btn btn-success btn-sm">{{ $role }}</button>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
