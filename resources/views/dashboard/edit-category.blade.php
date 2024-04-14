@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Edit Category</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{route('Category.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                @if ($errors->any())
                <div class="mx-12 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    @foreach ($errors->all() as $error)
                    <div class="text-sm">{{ $error }}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('edit-category.update', ['category_id' => $category->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 mt-4 mx-8 mx-3">
                        <label for="" class="mb-3">Category Name</label>
                        <input type="text" name="name" value="{{$category->name}}"
                            class="form-control w-full border border-gray-300">
                    </div>
                    <div class="mb-3 mt-4 mx-8 mx-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{$category->slug}}"
                            class="form-control w-full border border-gray-300">
                    </div>
                    <div class="mb-3 mt-4 mx-8 mx-3">
                        <label for="">Description</label>
                        <textarea name="description" id="MySummernote" row="5"
                            class="form-control  w-full border border-gray-300">{{$category->description}}</textarea>
                    </div>
                    <div class="mb-3 mt-4 mx-3 ">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <h6 class="mb-3 mt-4 mx-3">SEO Tags</h6>
                    <div class="mb-3 mt-4 mx-3">
                        <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control ">
                    </div>
                    <div class="mb-3 mt-4 mx-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description"
                            class="form-control w-full border border-gray-300">{{$category->meta_description}}</textarea>
                    </div>
                    <div class="mb-3 mt-4 mx-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords"
                            class="form-control w-full border border-gray-300">{{$category->meta_keywords}}</textarea>
                    </div>
                    <h6 class="mx-8 mb-4 mx-3">Status Mode</h6>
                    <div class="row mx-3">
                        <div class="col-xl-6 col-md-12 ">
                            <label for="">Navbar Status</label>
                            <input type="checkbox" name="navbar_status" value="1" {{ $category->navbar_status == 1 ?
                            'checked' : ''
                            }} >
                        </div>
                        <div class="col-xl-6 col-md-12 ">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" value="1" {{ $category->status == 1 ? 'checked' : ''
                            }}>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <div class="col-xl-6 col-md-12">
                            <!-- Your content goes here -->
                        </div>
                        <div class="col-xl-6 col-md-12  mb-3 ">
                            <button style="float: right;" class="btn btn-primary mr-2">Update
                                Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection