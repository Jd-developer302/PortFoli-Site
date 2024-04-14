@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">View Portfolio Categories</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{ route('add_port_category.create') }}" class="btn btn-primary">+new</a>
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
                            <th>Slug</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Port_category as $Portfolio_category)
                        <tr>
                            <td>{{ $Portfolio_category->id }}</td>
                            <td>{{ $Portfolio_category->name }}</td>

                            <td>{{ $Portfolio_category->slug }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('edit_port_category.edit', $Portfolio_category->id) }}" class="mr-2">
                                        <i class='bx bx-edit-alt'></i> 
                                    </a>
                                    
                                    <form method="POST" action="{{ route('Portfolio_category.destroy', $Portfolio_category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background: none; cursor: pointer;">
                                            <i class='bx bx-trash-alt'></i>
                                        </button>
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