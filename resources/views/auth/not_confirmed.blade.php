@extends('auth.layouts.app')

@section('guest')

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
        <div class="well no-padding">

            <form action="{{ route('activation.resend') }}" method="POST"  id="smart-form-register" class="smart-form client-form">
                @csrf
                <header>
                    Email confirmation is required
                </header>

                <fieldset>

                    Please confirm your email via link sent to your email. <br>
                    If it is not in your inbox, please check spam folder or <br>

                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        RESEND CONFIRMATION LINK
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
