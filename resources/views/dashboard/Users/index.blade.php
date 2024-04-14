@extends('layouts.master')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-50 py-2">
            <div class="d-flex justify-content-between">
                <div class="card-title mx-4 mb-5 mt-2">
                    <h3 class="text-dark text-uppercase fw-bold">View Users</h3>
                </div>
                {{-- <div class="mx-4 mb-5 mt-1">
                    <a href="{{ route('add-Post.create') }}" class="btn btn-primary">+new</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 p-2">
            <p class="mx-3"> {{session('success')}}</p>
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
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role_as=='1' ? 'Admin':'User'}}</td>
                        <td >
                            <div>
                                <a href="{{ route('Users.edit', ['users_id' => $item->id]) }}" class="btn btn-primary"><i class='bx bx-edit-alt'></i>Edit</a>
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