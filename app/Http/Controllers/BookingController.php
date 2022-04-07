<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index', ['booking' => Booking::all()]);
    }


    public function store(Booking $booking)
    {

    }
}
