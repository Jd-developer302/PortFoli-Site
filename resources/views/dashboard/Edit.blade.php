@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Edit Profile</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{route('Profiles.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <form action="{{ route('Profiles.update', ['profile' => $profile->id]) }}" method="POST"
                    enctype="multipart/form-data">

                    @method('PUT')
                    @csrf
                    <div class="row mt-3">
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror"
                                    value="{{ old('name', $profile->name) }}" style="width: 100%;">
                                @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $profile->title) }}"
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="subtitle">Sub Title</label>
                                <input type="text" name="sub_title" id="subtitle"
                                    value="{{ old('sub_title', $profile->sub_title) }}" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"
                                    value="{{ old('email', $profile->email) }}" style="width: 100%;">
                                @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone_number" id="phone"
                                    value="{{ old('phone_number', $profile->phone_number) }}" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="mobile">Mobile</label>
                                <input type="tel" name="mobile_number" id="mobile"
                                    value="{{ old('mobile_number', $profile->mobile_number) }}" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="@error('image') is-invalid @enderror">
                                @error('image')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                                @if ($profile->image)
                                <img src="{{ asset('uploads/profile/' . $profile->image) }}" alt="Profile Image"
                                    width="40" height="40">
                                <label for="remove_image">Remove Image:</label>
                                <input type="checkbox" name="remove_image" id="remove_image" value="1">
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="cv"><i class='bx bxs-cloud-upload'></i> CV</label>
                                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx">
                                @error('cv')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                                @if ($profile->cv)
                                <a href="{{ asset('uploads/cvs/' . $profile->cv) }}" target="_blank">{{ $profile->cv
                                    }}</a>
                                <label for="remove_cv">Remove CV:</label>
                                <input type="checkbox" name="remove_cv" id="remove_cv" value="1">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address"
                                    value="{{ old('address', $profile->address) }}" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="mb-3 mx-3">
                                <label for="description">Description</label>
                                <textarea name="description"  id="MySummernote" rows="6" cols="40"
                                    style="width: 100%;">{{ old('description', $profile->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 pt-5 mb-5">
                        <button type="submit" style="float: right;" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection