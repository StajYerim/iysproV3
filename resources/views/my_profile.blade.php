@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{trans("general.benim")}} {{trans("general.profile")}}
            </div>

            <div class="card-body">
                {{trans("general.name")}} {{trans("general.surname")}} : {{ $user->name }}<br>
                {{trans("general.email")}} : {{ $user->email }}<br>
                {{trans("general.password")}} : ********<br>
                {{trans("general.mobile")}} : {{ $user->mobile }}
            </div>
        </div>
    </div>
@endsection