@extends('auth.layouts.app')

@section('guest')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-xs">
                                {{ trans("sentence.resend_confirmation_link") }}
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <i class="fa fa-undo"></i> {{ trans('sentence.back_to_login') }}
                            </a>
                        </div>
                    </footer>

                </form>
            </div>
        </div>
    </div>

@endsection
