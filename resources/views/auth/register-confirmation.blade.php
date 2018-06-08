@extends('auth.layouts.app')

@section('guest')

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
        <div class="well no-padding">
            <h1> Confirmation email sent</h1><br>
            Sign up successful. Please check your email. <br>
            You will receive an email to {{ $user->email }}. <br>

            <br>

            Please click on activation link to activate your user account.
        </div>

    </div>
@endsection
