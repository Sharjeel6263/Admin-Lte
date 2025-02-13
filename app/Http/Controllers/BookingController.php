<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Booking;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $users = User::all();
        return view("bookings.create", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);

        Booking::create([
            'user_id' => $request->user_id ? $request->user_id : null,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::find($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        return view('bookings.edit', compact('booking', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        $booking = Booking::find($id);

        $booking->user_id = $request->user_id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone_number = $request->phone_number;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;

        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success','Booking Deleted');
    }
}
