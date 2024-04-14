@extends('layouts.master')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-50 py-2">
            <div class="d-flex justify-content-between">
                <div class="card-title mx-4 mb-5 mt-2">
                    <h3 class="text-dark text-uppercase fw-bold">View Post</h3>
                </div>
                <div class="mx-4 mb-5 mt-1">
                    <a href="{{ route('add-Post.create') }}" class="btn btn-primary">+new</a>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 p-4">
            {{session('success')}}
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card p-4">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status=='1' ? 'Hidden':'Shown'}}</td>
                        <td >
                            <div class="flex">
                                <a href="{{ route('edit-Post.edit', ['post_id' => $item->id]) }}"><i class='bx bx-edit-alt'></i></a> 
                                <a href="{{ route('delete-Post.destroy', ['post_id' => $item->id]) }}" ><i class='bx bx-trash-alt'></i></a>
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