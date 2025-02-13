@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Booking') }}</div>
                <div class="card-body">
                    <a href="{{ route('bookings.index') }}" class="btn btn-success mb-2">Back</a>

                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user_id">Select User</label>
                            <select name="user_id" class="form-control" id="user-select">
                                <option value="">-- Select User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-phone="{{ $user->phone_number }}"
                                            {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $booking->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $booking->email }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $booking->phone_number }}">
                            @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="check_in">Check in Time</label>
                            <input type="datetime-local" name="check_in" class="form-control" id="check_in" value="{{ \Carbon\Carbon::parse($booking->check_in)->format('Y-m-d\TH:i') }}">
                            @error('check_in')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="check_out">Check out</label>
                            <input type="datetime-local" name="check_out" class="form-control" id="check_out" value="{{ \Carbon\Carbon::parse($booking->check_out)->format('Y-m-d\TH:i') }}">
                            @error('check_out')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#user-select').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var name = selectedOption.data('name') || '';
            var email = selectedOption.data('email') || '';
            var phone = selectedOption.data('phone') || '';

            // Auto-fill fields
            $('#name').val(name);
            $('#email').val(email);
            $('#phone_number').val(phone);
        });
    });
</script>
@endpush
