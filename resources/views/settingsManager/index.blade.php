@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans("general.app")}} {{trans("general.settings")}} {{trans("general.manager")}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.general")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.sales")}} {{trans("general.offer")}}
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.sales")}} {{trans("general.settings")}}
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.purchase")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <hr>
                            <div class="col-xs-6 col-md-3">
                                <a href="{{ \App\User::getProductSettingsRoute() }}">
                                    {{trans("general.product")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.account")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.user")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.printer")}} {{trans("general.templates")}}
                                </a>
                            </div>
                            <hr>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.product")}} {{trans("general.planning")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.warehouse")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.email")}} {{trans("general.settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("general.category")}} {{trans("general.and")}} {{trans("general.tags")}}
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
