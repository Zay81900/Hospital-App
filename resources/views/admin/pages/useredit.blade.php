@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-gradient-dark text-white">
                    <h4 class="mb-0">Edit User</h4>
                </div>
                <div class="card-body">
                    {{-- //{{ route('admin.users.update', $user->id) }} --}}
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4 text-center">
                                <img src="{{ $user->image ? asset('images/user/' . $user->image) : asset('images/user/user_default.png') }}" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="User Image">
                                <div class="mt-2">
                                    <input type="file" name="image" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}" min="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="blood_type" class="form-label">Blood Group</label>
                                        <input type="text" class="form-control" id="blood_type" name="blood_type" value="{{ old('blood_type', $user->blood_type) }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="disease_description" class="form-label">Disease Description</label>
                                    <textarea class="form-control" id="disease_description" name="disease_description" rows="2">{{ old('disease_description', $user->disease_description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users_list') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
