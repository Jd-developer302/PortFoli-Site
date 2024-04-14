@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Add a Portfolio Image</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{ route('Portfolio_gallery.index') }}" class="btn btn-primary">Back</a>
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
                <form action="{{ route('edit_port_gallery.update', $portfolioImage->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row mx-3 mb-3 mt-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Portfolio Category</label>
                            <select name="port_id" class="form-control">
                                @foreach($Port_category as $port_cate)
                                    <option value="{{$port_cate->id}}">{{$port_cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mx-3 mb-3 mt-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$portfolioImage->name}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="{{$portfolioImage->slug}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" value="{{$portfolioImage->description}}" id="MySummernote" rows="6" cols="40"
                                style="width: 100%"></textarea>
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" value="{{$portfolioImage->image}}" class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <h6 class="mb-3 mt-4 mx-3">SEO Tags</h6>
                    </div>
                    <div class="row mx-3 mb-3">
                    <div class="col-xl-12 col-md-12">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{$portfolioImage->meta_title}}" class="form-control  ">
                    </div>
                    </div>
                    <div class="row mx-3 mb-3">
                    <div class="col-xl-12 col-md-12">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" value="{{$portfolioImage->meta_description}}" class="form-control"></textarea>
                    </div>
                    </div>
                    <div class="row mx-3 mb-3">
                    <div class="col-xl-12 col-md-12">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" value="{{$portfolioImage->meta_keywords}}" class="form-control"></textarea>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4 mt-4">
                            <button class="btn btn-primary mr-3" style="float: right">Save Image</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection