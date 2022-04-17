@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Hall Item</div>
                <div class="card-body">
                    <div class="container-fluid text-center">
                        <form id="addHallForm" role="form" action="addHall" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <div class="row-cols-10">

                                    <label class="col-form-label" style="margin-left: 3%">Hall Name</label>
                                    <input class="admin_inputName form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="float: left;margin-left: 15%">{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="col-sm-12">
                                    <div class="row-cols-10">

                                        <label class="col-form-label" style="margin-left: 3%">Capacity</label>
                                        <input class="admin_input form-control @error('capacity') is-invalid @enderror" type="text" id="capacity" name="capacity" placeholder="Enter Capacity" value="{{ old('capacity') }}">
                                        @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="float: left;margin-left: 15%">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="row-cols-10">
                                            <label class="col-form-label" style="margin-left: 3%"> Hall Type</label>
                                            <input class="admin_input form-control @error('type') is-invalid @enderror" type="text" id="type" name="type" placeholder="Enter Type" value="{{ old('type') }}">
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="float: left;margin-left: 15%">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="row-cols-10">
                                                <label class="col-form-label" style="margin-left: 3%"> Description</label>
                                                <input class="admin_input form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" placeholder="Enter description" value="{{ old('description') }}">
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="float: left;margin-left: 15%">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="row-cols-10">
                                                    <label class="col-form-label" style="margin-left: 3%"> Hall Fee Per Day (RM)</label>
                                                    <input class="admin_input form-control @error('fee') is-invalid @enderror" type="text" id="fee" name="fee" placeholder="Enter fee" value="{{ old('fee') }}">
                                                    @error('fee')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="float: left;margin-left: 15%">{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="float-right">
                                        <button id="addBtn" type="submit" class="btn btn-success btn-lg float-right ml-2">
                                            Add Hall
                                        </button>
                                        <a type="button" class="btn btn-danger btn-lg float-right" href="/admin/home">Cancel</a>
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

<script type="text/javascript">

</script>