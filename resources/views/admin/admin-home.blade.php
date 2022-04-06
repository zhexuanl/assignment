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
                <div class="col-12 col-md-6 d-flex justify-content-end">
                    <a class="btn btn-primary my-3" href="{{ url('/admin/addHall')}}">Add hall</a>
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
                    <tbody >
                        
                        @if(!empty($hallList) && $hallList->count() > 0)
                        
                        @foreach($hallList as $key => $data)
                        <tr class="text-center">
                            <td scope="col" style="width:20%">{{ $data->name }} </td>
                            <td scope="col" style="width:12%">{{ $data->capacity}}</td>
                            <td scope="col" style="width:12%">{{ $data->type}}</td>
                            <td scope="col" style="width:32%;">{{ $data->description}}</td>
                            <td scope="col" style="width:12%">{{ $data->fee}}</td>
                            <td scope="col" style="width:12%"><a href={{"editHall/".$data['id']}}> Update</a>  <a href={{"deleteHall/".$data['id']}}> Delete</a></td>
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
@endsection