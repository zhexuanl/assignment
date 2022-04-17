<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        return view('bookings.index', ['bookings' => $booking]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'book_date' => 'required|after:today'
        ]);

        Booking::create([
            'user_id' => $request->user_id,
            'hall_id' => $request->hall_id,
            'total_fee' => $request->total_fee,
            'book_date' => $request->book_date,
        ]);

        return redirect('user/bookings')->with('success', 'Hall Renting is Successful');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back()->with('success', 'Booking deleted');
    }
}
