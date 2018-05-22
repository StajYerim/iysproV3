@extends('auth.layouts.app')

@section('guest')
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
        <div class="well no-padding">

            <form method="POST" action="{{ route('activation.post', ['code' => $code]) }}"  id="smart-form-register" class="smart-form client-form">
                @csrf
                <header>
                    Activation
                </header>

                <input type="hidden" name="code" value="{{$code}}">
                <fieldset>
                    COMMERCIAL TITLE : {{ $user->memberOfAccount->company_name }}<br>
                    SECTOR : {{ $user->memberOfAccount->sector->name }}<br>
                    <br>
                    FULL NAME : {{ $user->name }}<br>
                    E-MAIL : {{ $user->email }}<br>
                    PHONE : {{ $user->mobile }}<br><br>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                    </section>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>
                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                    </section>
                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    <a href="{{route("login")}}" class="btn btn-danger pull-left">
                        Cancel
                    </a>
                </footer>

                <div class="message">
                    <i class="fa fa-check"></i>
                    <p>

                    </p>
                </div>
            </form>

        </div>
    </div>


@endsection