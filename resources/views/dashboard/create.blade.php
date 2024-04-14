@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Add Profile</h3>
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
                <form action="{{ route('Profiles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3 mx-3 mb-3">
                        <div class="col-xl-6 col-md-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror"
                                value="{{ old('name')}}" style="width:100%">
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" style="width:100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-6 col-md-12">
                            <label for="subtitle">Sub Title</label>
                            <input type="text" name="sub_title" id="subtitle" style="width:100%">
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"
                                value="{{ old('email')}}" style="width:100%">
                            @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-6 col-md-12">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone_number" id="phone" style="width:100%">
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <label for="mobile">Mobile</label>
                            <input type="tel" name="mobile_number" id="mobile" style="width:100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-6 col-md-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="@error('image') is-invalid @enderror" value="{{ old('image')}}"
                                style="width:100%">
                            @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xl-6 col-md-12 mt-4">
                            <label for="cv"><i class='bx bxs-cloud-upload'></i> CV</label>
                            <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mx-3 mb-3">
                        <div class="col-xl-12 col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="MySummernote" rows="6" cols="40"
                                style="width: 100%"></textarea>
                        </div>
                    </div>
                    <div class="mt-5 mx-3">
                        <button type="submit" style="float: right;" class="btn btn-primary mb-4">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="create_card-profile">
        <form action="{{ route('Profiles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="profile_card-pro">
                <div class="card_profile">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror"
                        value="{{ old('name')}}">
                    @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="card_profile">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="card_profile">
                    <label for="subtitle">Sub Title</label>
                    <input type="text" name="sub_title" id="subtitle">
                </div>
                <div class="card_profile">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"
                        value="{{ old('email')}}">
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="card_profile">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone_number" id="phone">
                </div>
                <div class="card_profile">
                    <label for="mobile">Mobile</label>
                    <input type="tel" name="mobile_number" id="mobile">
                </div>
                <div class="card_profile">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="@error('image') is-invalid @enderror" value="{{ old('image')}}">
                    @error('image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="card_profile">
                    <label for="cv"><i class='bx bxs-cloud-upload'></i> CV</label>
                    <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx">
                </div>
            </div>
            <div class="card_profile_text">
                <label for="address">Address</label>
                <input type="text" name="address" id="address">
            </div>
            <div class="card_profile_text">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="6" cols="40"></textarea>
            </div>
            <div class="create_btn_box">
                <button type="submit" style="float: right;" class="btn">Save</button>
            </div>
        </form>
    </div> --}}
</div>
@endsection