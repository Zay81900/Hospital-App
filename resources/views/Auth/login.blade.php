@extends('layouts.user_layout')

@section('content')
    <section class="contact_section layout_padding">
        <div class="container w-50">
            {{-- <div class="heading_container">
                <h2>Login Page</h2>
            </div> --}}
            <div class="card mt-5 mb-5">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" placeholder="" name="email" class='form-control' />
                            {{-- @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif --}}
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" placeholder="" name="password" class="form-control" /><br>
                            {{-- @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif --}}
                        </div>
                        <div class="form-group">
                            <a href="" class="">Forget Password</a>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-dark">
                                Login
                            </button>
                        </div>
                        <div class="text-center">
                            {{-- Not a member? <a href="{{ route('auth.register') }}">Register</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/sweetalert.min.js"></script>
    {{-- @if (Session::has('message'))
        <script>
            swal("Message", "{{ Session::get('message') }}", 'success', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif
    @if (Session::has('change'))
        <script>
            swal("Message", "{{ Session::get('change') }}", 'success', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif --}}
@endsection