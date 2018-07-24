@extends('mails.layout')

@section('content')
    <p>
        You've been registered to {{ config('app.name') }}.
    </p>

    <p>
        {{ trans("sentence.please_follow_link_for_email_confirmation") }} <br>
        <a href="{{ route('activation', ['code' => $user->confirmation_code]) }}">
            {{ route('activation', ['code' => $user->confirmation_code]) }}
        </a>

    </p>
@endsection