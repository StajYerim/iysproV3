@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{trans("general.benim")}} {{trans("general.profile")}}
            </div>

            <div class="card-body">
                {{trans("sentence.name_and_surname")} : {{ $user->name }}<br>
                {{trans("word.email")}} : {{ $user->email }}<br>
                {{trans("word.password")}} : ********<br>
                {{trans("word.mobile")}} : {{ $user->mobile }}
            </div>
        </div>
    </div>
@endsection