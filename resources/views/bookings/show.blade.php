@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Show Booking') }}</div>
                <div class="card-body">
                    <a href="{{ route('bookings.index') }}" class="btn btn-success mb-2">Back</a>
                    <p><strong>User:</strong> {{ $booking->user ? $booking->user->name : 'N/A' }} </p>
                    <p><strong>Email:</strong> {{ $booking->email }} </p>
                    <p><strong>Phone Number:</strong> {{ $booking->phone_number }} </p>
                    <p><strong>Date:</strong> {{ $booking->select_date }} </p>
                    <p><strong>Time:</strong> {{ $booking->select_time }} </p>
                    <p><strong>Fleet:</strong> {{ $booking->select_fleet }} </p>
                    <p><strong>Pick-Up:</strong> {{ $booking->pick_up }} </p>
                    <p><strong>Destination:</strong> {{ $booking->destination }} </p>
                    <p><strong>Service Type:</strong> {{ $booking->service_type }} </p>
                    <p><strong>Travel Type:</strong> {{ $booking->travel_type }} </p>
                    <p><strong>Passengers:</strong> {{ $booking->no_of_passenger }} </p>
                    <p><strong>Luggage:</strong> {{ $booking->no_of_luggage }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
