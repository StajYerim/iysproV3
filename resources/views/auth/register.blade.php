@extends('auth.layouts.app')

@section('guest')

        <div class="well no-padding">

            <form method="POST" action="{{ route('register') }}" id="smart-form-register" class="smart-form client-form">
               @csrf
                <header>
                    Registration is FREE*
                </header>

                <fieldset>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-building"></i>
                            <input type="text" name="company_name" placeholder="Commercial title" {{ old('company_name') }} >
                            @if ($errors->has('company_name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
                    </section>

                    <section>
                        <label class="select">
                            <select name="sector" aria-required="true" aria-invalid="false" class="valid">
                                <option selected="" disabled="">Sector</option>
                                @foreach($sectors as $sector)
                                    <option value="{{ $sector->id }}"{{ $sector->id == old('sector') ? 'selected=selected' : '' }}>{{ $sector->name }}</option>
                                @endforeach
                            </select> <i></i>
                            @if ($errors->has('sector'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sector') }}</strong>
                                    </span>
                            @endif
                        </label>

                    </section>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-building"></i>
                            <input type="text" name="name" placeholder="Full Name" {{ old('name') }}  >
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
                    </section>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email address">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
                    </section>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-phone"></i>
                            <input type="text" name="mobile" placeholder="Mobile" {{ old('mobile') }} >
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
                    </section>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password" placeholder="Password" id="password">
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                    </section>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password_confirmation" placeholder="Confirm password">
                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                    </section>
                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <a href="{{route("login")}}" class="btn btn-danger pull-left">
                        Login
                    </a>
                </footer>

                <div class="message">
                    <i class="fa fa-check"></i>
                    <p>
                        Thank you for your registration!
                    </p>
                </div>
            </form>

        </div>


    @push("guest_script")
        <script type="text/javascript">
            runAllForms();

            // Model i agree button
            $("#i-agree").click(function(){
                $this=$("#terms");
                if($this.checked) {
                    $('#myModal').modal('toggle');
                } else {
                    $this.prop('checked', true);
                    $('#myModal').modal('toggle');
                }
            });

            // Validation
            $(function() {
                // Validation
                $("#smart-form-register").validate({

                    // Rules for form validation
                    rules : {
                        username : {
                            required : true
                        },
                        email : {
                            required : true,
                            email : true
                        },
                        password : {
                            required : true,
                            minlength : 3,
                            maxlength : 20
                        },
                        passwordConfirm : {
                            required : true,
                            minlength : 3,
                            maxlength : 20,
                            equalTo : '#password'
                        },
                        firstname : {
                            required : true
                        },
                        lastname : {
                            required : true
                        },
                        gender : {
                            required : true
                        },
                        terms : {
                            required : true
                        }
                    },

                    // Messages for form validation
                    messages : {
                        login : {
                            required : 'Please enter your login'
                        },
                        email : {
                            required : 'Please enter your email address',
                            email : 'Please enter a VALID email address'
                        },
                        password : {
                            required : 'Please enter your password'
                        },
                        passwordConfirm : {
                            required : 'Please enter your password one more time',
                            equalTo : 'Please enter the same password as above'
                        },
                        firstname : {
                            required : 'Please select your first name'
                        },
                        lastname : {
                            required : 'Please select your last name'
                        },
                        gender : {
                            required : 'Please select your gender'
                        },
                        terms : {
                            required : 'You must agree with Terms and Conditions'
                        }
                    },

                    // Ajax form submition
                    submitHandler : function(form) {
                        $(form).ajaxSubmit({
                            success : function() {
                                $("#smart-form-register").addClass('submited');
                            }
                        });
                    },

                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });

            });
        </script>
    @endpush

@endsection
