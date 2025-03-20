@extends('layouts.user_layout')

@section('content')
    <section class="contact_section layout_padding">
        <div class="container w-50">
            <div class="card shadow-sm mt-5 mb-5">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">Welcome To PluseCare</h4>
                    <p class="text-white mb-0">Please Register to your account</p>
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" 
                                   class="form-control @error('username') is-invalid @enderror" 
                                   id="username" 
                                   name="username" 
                                   value="{{ old('username') }}"
                                   placeholder="Enter your username"
                                   required 
                                   autofocus />
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="Enter your email"
                                   required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Enter your password"
                                   required />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   placeholder="Enter your phone number"
                                   required />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" 
                                      name="address" 
                                      placeholder="Enter your address"
                                      required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="blood_type" class="form-label">Blood Type</label>
                            <select class="blood form-control @error('blood_type') is-invalid @enderror" 
                                    id="blood_type" 
                                    name="blood_type" 
                                    required>
                                <option value="">Select blood type</option>
                                <option value="A+" {{ old('blood_type') == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ old('blood_type') == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ old('blood_type') == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ old('blood_type') == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="O+" {{ old('blood_type') == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ old('blood_type') == 'O-' ? 'selected' : '' }}>O-</option>
                                <option value="AB+" {{ old('blood_type') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ old('blood_type') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            </select>
                            @error('blood_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="diseases" class="form-label">Diseases Description</label>
                            <textarea class="form-control @error('diseases') is-invalid @enderror" 
                                      id="diseases" 
                                      name="diseases" 
                                      placeholder="Describe any existing medical conditions or diseases"
                                      rows="3">{{ old('diseases') }}</textarea>
                            @error('diseases')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg">
                                Register
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            <p class="mb-0">Already have an account? <a href="{{route('auth.login')}}" class="text-primary">Login here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if (Session::has('message'))
        <script>
            swal("Success", "{{ Session::get('message') }}", 'success', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            swal("Error", "{{ Session::get('error') }}", 'error', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif
@endsection