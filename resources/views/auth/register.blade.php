@extends('auth.layouts.app')

@section('guest')

        <div class="well no-padding">

            <form method="POST" action="{{ route('register') }}" id="smart-form-register" class="smart-form client-form">
               @csrf
                <header>
                    {{ trans("sentence.registration_is_free") }}
                </header>

                <fieldset>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-building"></i>
                            <input type="text" name="company_name" placeholder="{{ trans("sentence.commercial_title") }}" {{ old('company_name') }} >
                            @if ($errors->has('company_name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">
                                {{trans("sentence.needed_to_enter_the_website")}}
                            </b>
                        </label>
                    </section>

                    <section>
                        <label class="select">
                            <select name="sector" aria-required="true" aria-invalid="false" class="valid">
                                <option selected="" disabled="">{{trans("word.sector")}}</option>
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
                            <input type="text" name="name" placeholder="{{ trans("sentence.name_and_surname") }}" {{ old('name') }}  >
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">
                                {{trans("sentence.needed_to_enter_the_website")}}
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                            <input type="email" name="email" placeholder="{{trans("word.email")}}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">
                                {{trans("sentence.needed_to_verify_your_account")}}
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-phone"></i>
                            <input type="text" name="mobile" placeholder="{{ trans("sentence.mobile_number") }}" {{ old('mobile') }} >
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
                    </section>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password" placeholder=" {{ trans("word.password") }}" id="password">
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">
                                {{ trans("sentence.do_not_forget_your_password") }}
                            </b>
                        </label>
                    </section>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password_confirmation" placeholder="{{ trans("sentence.confirm_password") }}">
                            <b class="tooltip tooltip-bottom-right">
                                {{ trans("sentence.do_not_forget_your_password") }}
                            </b>
                        </label>
                    </section>
                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        {{ trans("word.register") }}
                    </button>
                    <a href="{{route("login")}}" class="btn btn-danger pull-left">
                        {{ trans("word.login") }}
                    </a>
                </footer>

                <div class="message">
                    <i class="fa fa-check"></i>
                    <p>
                        {{ trans("sentence.thank_you_for_your_registration") }}
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
