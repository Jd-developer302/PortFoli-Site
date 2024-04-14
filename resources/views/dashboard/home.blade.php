@extends('layouts.master')

@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card shadow h-50 py-2">
        <div class="d-flex justify-content-between">
          <div class="card-title mx-4 mb-5">
            <h1 class="text-dark text-uppercase fw-bold">Profile</h1>
          </div>

          @if($profiles->isEmpty())
          <div class="mx-4 mb-5">
            <a href="{{route('Profiles.create')}}" class="btn btn-primary">Create Profile</a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @if($profiles->isNotEmpty())
@foreach($profiles->take(1) as $profile)
  <div class="row ">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="rounded text-center  m-auto py-5 px-4">
          
            @if ($profile->image)
            <img src="{{ asset('uploads/profile/' . $profile->image) }}" alt="" width="200"
            class="img-fluid rounded-circle mb-3  shadow-sm">
            @endif
            <div class="justify-content-center">
              <h5 class="mb-0">{{ $profile->name }}</h5>
            </div>
            <div class="justify-content-center">
              <h5 class="mb-0">{{ $profile->title }}</h5>
            </div>
            <div class="text-center">
              <p>{{ $profile->sub_title }}</p>
            </div> 
        </div>
      </div>
    </div>
    <div class="col-xl-9 col-md-9 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="text-center mt-3">
          <h5>Contact Me</h5>
        </div>
        <div class="mb-3 mx-4">
          <label>Email</label>
          <p>{{ $profile->email }}</p>
        </div>
        <div class="mb-3 mx-4">
          <label>Mobile Number</label>
          <p>{{ $profile->mobile_number }}</p>
        </div>
        <div class="mb-3 mx-4">
          <label>Phone Number</label>
          <p>{{ $profile->phone_number }}</p>
        </div>
        <div class="mb-3 mx-4">
          <label>Address</label>
          <p >{{ $profile->address }}</p>
        </div>
        <div class="mb-3 mx-4">
          <label>CV</label>
          <a href="{{ asset('/uploads/cvs/'. $profile->cv)}}" target="_blank" rel="noopener noreferrer" download>Click
            to</a>
        </div>
        <div class="mb-3 mx-4">
          <label>Description</label>
          <p >{{ $profile->description }}</p>
        </div>
        <div class="justify-content-end d-flex">
          <a href="{{ route('Profiles.edit', ['profile' => $profile->id]) }}" class="btn btn-primary m-2"><i
            class='bx bx-edit-alt'></i>Edit</a>
        <!-- Delete Form -->
        <form action="{{ route('Profiles.destroy', ['profile' => $profile->id]) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this profile?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger m-2"><i class='bx bxs-trash'></i>Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@else
<div>Record Not Found</div>
@endif
</div>
















@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ Session::get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@endsection