<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hall;
use Illuminate\Support\Facades\Gate;

class HallController extends Controller
{
    public function addHall(Request $req, Hall $hall)
    {
        if (Gate::allows('isAdmin'))
        {
            $req->validate([

                'name' => ['required', 'string'],
                'capacity' => ['required', 'integer'],
                'type' => ['required', 'string'],
                'description' => ['required'],
                'fee' => ['required', 'numeric'],
            ]);

            $hall = new hall;
            $hall->name = $req->name;
            $hall->capacity = $req->capacity;
            $hall->type = $req->type;
            $hall->description = $req->description;
            $hall->fee = $req->fee;
            $hall->save();

            $req->session()->flash('success', 'New hall is Created Successfully');
            return redirect("admin/home");

        }

    }

    function showEdit($id)
    {
        if (Gate::allows('isAdmin'))
        {
            $data = Hall::find($id);
            return view("admin/editHall", ['data' => $data]);
        }

    }

    function editHall(Request $req)
    {
        if (Gate::allows('isAdmin'))
        {

            $data = Hall::find($req->id);
            $data->name = $req->name;
            $data->capacity = $req->capacity;
            $data->type = $req->type;
            $data->description = $req->description;
            $data->fee = $req->fee;


            $data->save();

            $req->session()->flash('success', 'Hall is Updated Successfully');
            return redirect("admin/home");
        }

    }

    function deleteHall(Request $req)
    {
        if (Gate::allows('isAdmin'))
        {
            $data = Hall::find($req->id);
            $data->delete();
            return redirect("admin/home");

        }
    }

    public function index()
    {
        return view('halls.index', ['halls' => Hall::all()]) ;
    }

    public function show(Hall $hall)
    {
        return view('halls.show', [
            'hall' => $hall
        ]);
    }



}
