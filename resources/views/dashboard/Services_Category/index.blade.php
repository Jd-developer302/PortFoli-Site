@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">View Services Categories</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{ route('add-Services_Category.create') }}" class="btn btn-primary">+new</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow  p-4">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Slug</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceCategories as $serviceCategory)
                        <tr>
                            <td>{{ $serviceCategory->id }}</td>
                            <td>{{ $serviceCategory->name }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $serviceCategory->image) }}" alt="Image" width="50">
                            </td>
                            <td>{{ $serviceCategory->slug }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('edit-Services_Category', $serviceCategory->id) }}" class="mr-2">
                                        <i class='bx bx-edit-alt'></i> 
                                    </a>
                                    
                                    <form method="POST" action="{{ route('Services_Category.destroy', $serviceCategory->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a type="submit" >
                                            <i class='bx bx-trash-alt'></i>
                                        </a>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                           
    
                    </tbody>
                </table>
            </div>     
        </div> 
    </div>
</div>

@endsection