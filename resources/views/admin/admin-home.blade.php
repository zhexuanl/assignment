@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif



            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-start">
                    <a class="btn btn-primary mr-3 my-3" href="{{ url('/admin/addHall')}}">Add hall</a>
                    <button type="button" class="btn btn-info my-3" data-bs-toggle="modal" data-bs-target="#exampleModalXl">View All Bookings
                    </button>
                </div>
            </div>


            <div class="table table-bordered">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:20%">Hall Name</th>
                            <th scope="col" style="width:12%">Hall Capacity</th>
                            <th scope="col" style="width:12%">Hall Type</th>
                            <th scope="col" style="width:32%;">Hall Description</th>
                            <th scope="col" style="width:12%">Hall Fee Per Day (RM)</th>
                            <th scope="col" style="width:12%">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @if(!empty($hallList) && $hallList->count() > 0)

                        @foreach($hallList as $key => $data)
                        <tr class="text-center">
                            <td scope="col" style="width:20%">{{ $data->name }} </td>
                            <td scope="col" style="width:12%">{{ $data->capacity}}</td>
                            <td scope="col" style="width:12%">{{ $data->type}}</td>
                            <td scope="col" style="width:32%;">{{ $data->description}}</td>
                            <td scope="col" style="width:12%">{{ $data->fee}}</td>
                            <td scope="col" style="width:12%">
                                <a class="btn btn-primary" href={{"editHall/".$data['id']}}> Update</a>
                                <a class="btn btn-warning" href={{"deleteHall/".$data['id']}}> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="7">No halls are Found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-md-5">
                    {{$hallList->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                    View All Bookings
                </h5>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <x-booking-list :bookings="$bookings" />
            </div>
        </div>
    </div>
</div>
@endsection