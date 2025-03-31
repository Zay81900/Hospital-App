@extends('layouts.user_layout')
@section('content')

<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
<form action="{{ route('user.profile_update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" class="container py-4">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="col-lg-4 mx-auto">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="position-relative d-inline-block">
                            @if(Auth::user()->image)
                                <img src="{{ asset('images/user/' . Auth::user()->image) }}" 
                                     class="rounded-circle doctor-image border border-3 border-primary" 
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     name="image" 
                                     alt="{{ Auth::user()->username }}">
                            @else
                                <img src="{{ asset('images/user/user_default.png') }}" 
                                     class="rounded-circle doctor-image border border-3 border-primary"
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     name="image" 
                                     alt="Doctor">
                            @endif
                            <div class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-2">
                                <label for="image" class="mb-0" style="cursor: pointer;">
                                    <i class="fas fa-camera text-white"></i>
                                </label>
                                <input type="file" id="image" name="image" class="d-none" accept="image/*" onchange="previewImage(this)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" >
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" @checked(Auth::user()->gender == 'male')>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" @checked(Auth::user()->gender == 'female')>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" @checked(Auth::user()->gender == 'other')>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->address }}</textarea>
            </div>
            {{-- <div class="mb-3">
                <label for="image" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div> --}}
            <div class="d-flex justify-content-left gap-2">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('user.profile') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</form>
@endsection