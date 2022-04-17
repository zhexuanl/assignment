<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Gate;
use App\Models\Hall;
use App\Models\Admin;
use Exception;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $hallList = Hall::orderBy('id')->simplePaginate(8);
            return view('admin.admin-home', compact('hallList'), [
                'bookings' => Booking::all()
            ]);
        }
    }
}
