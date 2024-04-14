@extends('layouts.master')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-50 py-2">
            <div class="d-flex justify-content-between">
                <div class="card-title mx-4 mb-5 mt-2">
                    <h3 class="text-dark text-uppercase fw-bold">View Team</h3>
                </div>
                <div class="mx-4 mb-5 mt-1">
                    <a href="{{ route('add-team.create') }}" class="btn btn-primary">+new</a>
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
        <div class="card shadow  p-4">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Designation</th>
                        <th>Gmail</th>
                        <th>LinkedIn</th>
                        <th>FaceBook</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($teamMembers as $teamMember)
                        <tr>
                            <td>{{ $teamMember->id }}</td>
                            <td>{{ $teamMember->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $teamMember->image_name) }}" alt="{{ $teamMember->name }}" width="50">
                            </td>
                            <td>{{ $teamMember->designation }}</td>
                            <td >{{ $teamMember->gmail }}</td>
                            <td>{{ $teamMember->linkedin }}</td>
                            <td>{{ $teamMember->facebook }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('edit-team.edit', $teamMember->id) }}">
                                        <i class='bx bx-edit-alt'></i>
                                    </a>
                                    <form action="{{ route('team.destroy', $teamMember->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a type="submit"  onclick="return confirm('Are you sure you want to delete this team member?');">
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