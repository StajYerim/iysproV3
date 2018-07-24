@extends('auth.layouts.app')

@section('guest')

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
        <div class="well no-padding">

            <form action="{{ route('activation.resend') }}" method="POST"  id="smart-form-register" class="smart-form client-form">
                @csrf
                <header>
                    {{trans("sentence.email_confirmation_is_required")}}
                </header>

                <fieldset>
                    {{ trans("sentence.confirm_email_via_link") }}
                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        {{ trans("sentence.resend_confirmation_link") }}
                    </button>

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
