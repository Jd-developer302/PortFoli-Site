@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Edit User</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{ route('Users.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <p class="mx-3">{{session('success')}}</p>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card py-4">
                <div class="mb-3 mx-3">
                    <label>Full Name</label>
                    <p class="form-control">{{$user->name}}</p>
                </div>
                <div class="mb-3 mx-3">
                    <label>Email</label>
                    <p class="form-control">{{$user->email}}</p>
                </div>
                <div class="mb-3 mx-3">
                    <label>Created At</label>
                    <p class="form-control">{{ $user->created_at->format('d/m/y') }}</p>
                </div>
                <form action="{{ route('Users.update', ['users_id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mx-3">
                        <label>Role as</label>
                        <select name="role_as" class="form-control">
                            <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>
                    <div class="mb-3 mx-3">
                        <button type="submit" style="float: right" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection