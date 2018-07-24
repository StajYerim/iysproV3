@extends('auth.layouts.app')

@section('guest')
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
        <div class="well no-padding">

            <form method="POST" action="{{ route('activation.post', ['code' => $code]) }}"  id="smart-form-register" class="smart-form client-form">
                @csrf
                <header>
                    {{ trans("word.activation") }}
                </header>

                <input type="hidden" name="code" value="{{$code}}">
                <fieldset>
                     : {{ $user->memberOfAccount["company_name"] }}<br>
                    {{--SECTOR : {{ $user->memberOfAccount->sector["name"] }}<br>--}}
                    <br>
                    {{ trans("sentence.name_and_surname") }} : {{ $user->name }}<br>
                    {{ trans("word.email") }} : {{ $user->email }}<br>
                    {{ trans("word.mobile") }} : {{ $user->mobile }}<br><br>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input id="password" type="password" placeholder="{{ trans("word.password") }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <b class="tooltip tooltip-bottom-right">{{ trans("sentence.do_not_forget_your_password") }}</b> </label>
                    </section>

                    <section>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input id="password-confirm" type="password" placeholder="{{ trans("sentence.password_confirmation") }}" class="form-control" name="password_confirmation" required>
                            <b class="tooltip tooltip-bottom-right">{{ trans("sentence.do_not_forget_your_password") }}</b> </label>
                    </section>
                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        {{ trans("word.submit") }}
                    </button>
                    <a href="{{route("login")}}" class="btn btn-danger pull-left">
                        {{ trans("word.cancel") }}
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