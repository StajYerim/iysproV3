@extends('auth.layouts.app')

@section('guest')
    <div>
        @include('flash::message')
        @if ($errors->has('email'))
            <div class="alert
                    alert-danger
                    alert-important" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                {{ $errors->first('email') }}
            </div>

        @endif
        <div class="well no-padding col-xs-12">
                <form action="{{ route('login') }}" method="POST" id="login-form" class="smart-form client-form">

                @csrf

                <header>
                    {{ trans("sentence.sign_in") }}
                </header>

                <fieldset>

                    <section>
                        <label class="label">{{ trans("word.email") }}</label>
                        <label class="input"> <i class="icon-append fa fa-user"></i>
                            <input type="email" name="email" value="{{ old('email') }}">
                        </label>
                    </section>

                    <section>
                        <label class="label ">{{trans("word.password")}}</label>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input class="col-sm-9 col-md-9" type="password" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </label>
                        <div class="note">
                            <a href="{{ route('password.request') }}">{{ trans("sentence.forgot_password") }}?</a>
                        </div>
                    </section>

                    <section>
                        <label class="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
                            <i></i>{{ trans("sentence.stay_signed_in") }}</label>
                    </section>
                </fieldset>
                <footer>
                    <button type="submit" class="btn btn-primary">
                        {{ trans("sentence.sign_in") }}
                    </button>

                    <a href="{{route("register")}}" class="btn btn-danger pull-left">
                        {{ trans("sentence.create_account") }}
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
                            required: 'Lütfen mail adresinizi girin',
                            email: 'Lütfen geçerli bir mail adresi girin'
                        },
                        password: {
                            required: 'Lütfen şifresinizi girin.'
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
