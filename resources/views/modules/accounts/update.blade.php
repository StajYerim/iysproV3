@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{trans("general.company")}} {{trans("general.profile")}}
            </div>

            <div class="card-body">
                {{trans("general.profile")}} {{trans("general.edit")}}
            </div>
        </div>
    </div>
@endsection