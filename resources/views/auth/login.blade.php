@extends('auth.layouts.app')

@section('guest')
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" >
        @include('flash::message')
        @if ($errors->has('email'))
            <div class="alert
                    alert-danger
                    alert-important" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                {{ $errors->first('email') }}
            </div>

        @endif
        <div class="well no-padding">
            <form action="{{ route('login') }}" method="POST" id="login-form" class="smart-form client-form">

                @csrf
                <header>
                    Sign In
                </header>

                <fieldset>

                    <section>
                        <label class="label">E-mail</label>
                        <label class="input"> <i class="icon-append fa fa-user"></i>
                            <input type="email" name="email" value="{{ old('email') }}">

                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter
                                email address/username</b></label>
                    </section>

                    <section>
                        <label class="label">Password</label>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your
                                password</b> </label>
                        <div class="note">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    </section>

                    <section>
                        <label class="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
                            <i></i>Stay signed in</label>
                    </section>
                </fieldset>
                <footer>
                    <button type="submit" class="btn btn-primary">
                        Sign in
                    </button>

                    <a href="{{route("register")}}" class="btn btn-danger pull-left">
                        Create Account
                    </a>
                </footer>
            </form>

        </div>

    </div>
    @push("guest_script")
        <script>
            runAllForms();

            $(function () {
                // Validation
                $("#login-form").validate({
                    // Rules for form validation
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 3,
                            maxlength: 20
                        }
                    },

                    // Messages for form validation
                    messages: {
                        email: {
                            required: 'Please enter your email address',
                            email: 'Please enter a VALID email address'
                        },
                        password: {
                            required: 'Please enter your password'
                        }
                    },

                    // Do not change code below
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    }
                });
            });
        </script>
    @endpush

@endsection
