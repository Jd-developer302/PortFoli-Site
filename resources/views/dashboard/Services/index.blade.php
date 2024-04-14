@extends('layouts.master')
@php
use Illuminate\Support\Str;
@endphp
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">View Services</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{ route('add-Service.create') }}" class="btn btn-primary">+new</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card p-4">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Category</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($service as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{ $item->ServiceCategory ? $item->ServiceCategory->name : 'N/A' }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->image}}</td>
                            <td>{!! Str::limit(strip_tags($item->description), 20) !!}</td>

                            {{-- <td>{!! Str::limit($item->description, 100) !!}</td> --}}
                            <td >
                                <div class="d-flex">
                                    <a href="{{ route('edit-Service.edit', ['id' => $item->id]) }}" ><i class='bx bx-edit-alt'></i></a>
                                    <form method="POST" action="{{ route('Service.destroy', ['id' => $item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a type="submit"  onclick="return confirm('Are you sure you want to delete this service?')">
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