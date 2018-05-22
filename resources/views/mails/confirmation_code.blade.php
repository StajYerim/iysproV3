@extends('mails.layout')

@section('content')
    <p>
        You've been registered to {{ config('app.name') }}.
    </p>

    <p>
        Please follow
        <a href="{{ route('activation', ['code' => $user->confirmation_code]) }}">
            {{ route('activation', ['code' => $user->confirmation_code]) }}
        </a>
        link for email confirmation and password setup.
    </p>
@endsection