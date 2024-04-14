@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Edit a Member</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="#" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-2">
            <div class="card">
                @if ($errors->any())
                <div class="mx-12 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    @foreach ($errors->all() as $error)
                    <div class="text-sm">{{ $error }}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row mx-3 mb-3 mt-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$teamMember->name}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Designation</label>
                            <input type="text" name="designation" value="{{$teamMember->designation}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Image</label>
                            <input type="file" name="image_name" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Gmail</label>
                            <input type="text" name="gmail" value="{{$teamMember->gmail}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">linkedin</label>
                            <input type="text" name="linkedin" value="{{$teamMember->linkedin}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">facebook</label>
                            <input type="text" name="facebook" value="{{$teamMember->facebook}}" class="form-control" style="width: 100%">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4 mt-4">
                            <button class="btn btn-primary mr-3" style="float: right">Update Member</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection