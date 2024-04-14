@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Edit Services Category</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{route('Services_Category.index')}}" class="btn btn-primary">Back</a>
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
                <form method="POST" action="{{ route('Services_Category.update', $serviceCategory->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row mx-3 mb-3 mt-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$serviceCategory->name}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="{{$serviceCategory->slug}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4 mt-4">
                            <button class="btn btn-primary mr-3" style="float: right">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection