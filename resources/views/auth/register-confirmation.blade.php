@extends('auth.layouts.app')

@section('guest')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well no-padding">
                    <h1> {{ trans("sentence.confirmation_email_sent") }}</h1><br>
                    {{ trans("sentence.click_on_activation_link") }}
                </div>
            </div>
        </div>
@endsection
