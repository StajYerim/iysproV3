@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                My Profile
            </div>

            <div class="card-body">
                NAME SURNAME : {{ $user->name }}<br>
                E-MAIL : {{ $user->email }}<br>
                PASSWORD : ********<br>
                PHONE : {{ $user->mobile }}
            </div>
        </div>
    </div>
@endsection