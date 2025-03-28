@extends('layouts.user_layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @if(Auth::user()->image)
                        <img src="{{ asset("images/user/" . Auth::user()->image) }}" class="rounded-circle doctor-image" name="image" alt="{{ Auth::user()->username }}">
                    @else
                        <img src="images/user/user_default.png" name="image" class="rounded-circle doctor-image" alt="Doctor">
                    @endif
                    <h5 class="my-3">{{ Auth::user()->username }}</h5>
                    <p class="text-muted mb-1">Patient</p>
                    <p class="text-muted mb-4">{{ Auth::user()->email }}</p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->username }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->phone ?? 'Not provided' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->address ?? 'Not provided' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" @checked(Auth::user()->gender == 'male')>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" @checked(Auth::user()->gender == 'female')>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other" @checked(Auth::user()->gender == 'other')>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Disease Description</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->disease_description ?? 'Not provided' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Blood Type</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->blood_type ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" @checked(Auth::user()->gender == 'male')>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" @checked(Auth::user()->gender == 'female')>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other" @checked(Auth::user()->gender == 'other')>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection