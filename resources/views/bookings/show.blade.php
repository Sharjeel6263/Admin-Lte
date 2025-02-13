@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Show Booking') }}</div>
                <div class="card-body">
                    <a href="{{ route('bookings.index') }}" class="btn btn-success mb-2">Back</a>
                    <p><strong>User:</strong> {{ $booking->user ? $booking->user->name : 'N/A' }} </p>
                    <p><strong>Name:</strong> {{ $booking->name }} </p>
                    <p><strong>Email:</strong> {{ $booking->email }} </p>
                    <p><strong>Phone Number:</strong> {{ $booking->phone_number }} </p>
                    <p><strong>Check In:</strong> {{ $booking->check_in }} </p>
                    <p><strong>Check Out:</strong> {{ $booking->check_out }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
