@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{trans("sentence.company_profile")}}
            </div>

            <div class="card-body">
                {{trans("sentence.edit_profile")}}
            </div>
        </div>
    </div>
@endsection