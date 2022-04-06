@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="admin_title mt-3">Edit Hall Item</div>
                <div class="card-body">
                    <div class="container-fluid text-center">
                        <form id="editHallForm" role="form" action="{{ "/admin/editHall/".$data->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group row">

                                    <label class="col-form-label" style="margin-left: 3%">Hall Name :</label>
                                    <input class="admin_inputName form-control @error('name') is-invalid @enderror"
                                        type="text" id="name" name="name" placeholder="Enter Name"
                                        value="{{ $data['name'] }}" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: left;margin-left: 15%">{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12" style="display: flex;margin-top: 1%">

                                        <div class="col-sm-10" style="margin-left: 1%;">
                                            <div class="form-group row">
                                                <div class="row-cols-10">
                                                    <label class="inputLbl col-form-label"> Capacity:</label>
                                                    <input
                                                        class="admin_input form-control @error('capacity') is-invalid @enderror"
                                                        type="text" id="capacity" name="capacity" placeholder="Enter capacity"
                                                        value="{{ $data['capacity'] }}">
                                                    @error('capacity')
                                                    <span style="width: 100%" class="invalid-feedback" role="alert">
                                                        <strong
                                                            style="float: left;margin-left: 10%">{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="row-cols-10">
                                                    <label class="inputLbl col-form-label"> Hall Type:</label>
                                                    <input
                                                        class="admin_input form-control @error('type') is-invalid @enderror"
                                                        type="text" id="type" name="type"
                                                        placeholder="Enter Type" value="{{ $data['type'] }}">
                                                    @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong
                                                            style="float: left;margin-left: 15%">{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="row-cols-10">
                                                    <label class="inputLbl col-form-label"> Description:</label>
                                                    <input
                                                        class="admin_input form-control @error('description') is-invalid @enderror"
                                                        type="text" id="description" name="description"
                                                        placeholder="Enter description" value="{{ $data['description'] }}">
                                                    @error('description')
                                                    <span style="width: 100%" class="invalid-feedback" role="alert">
                                                        <strong
                                                            style="float: left;margin-left: 10%">{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="row-cols-10">
                                                    <label class="inputLbl col-form-label "> Hall Fee Per Day (RM):</label>
                                                    <input
                                                        class="admin_input form-control @error('fee') is-invalid @enderror"
                                                        type="text" id="fee" name="fee"
                                                        value="{{ $data['fee'] }}">
                                                    @error('fee')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong
                                                            style="float: left;margin-left: 15%">{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row" style="float: right;margin-right: 8%;">
                                                <a type="button" class="btn btn-danger btn-md "
                                                    href="/admin/home">Cancel</a>
                                                <button id="editBtn" type="submit"
                                                    class="btn btn-success btn-md ml-md-2">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
