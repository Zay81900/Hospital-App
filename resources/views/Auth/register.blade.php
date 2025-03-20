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
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="Enter your email"
                                   required 
                                   autofocus />
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
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="" class="text-decoration-none">Forgot Password?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg">
                                Login
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            <p class="mb-0">Don't have an account? <a href="" class="text-primary">Register here</a></p>
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