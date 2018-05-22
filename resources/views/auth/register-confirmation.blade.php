@extends('auth.layouts.app')

@section('guest')
    <div class="container text-center">
        <div class="card">
            <div class="card-header">
                Confirmation email sent
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <i class="far fa-envelope fa-10x"></i>
                    </div>

                    <div class="col-md-7 align-self-center">
                        Sign up successful. Please check your email. <br>
                        You will receive an email to {{ $user->email }}. <br>

                        <br>

                        Please click on activation link to activate your user account.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
