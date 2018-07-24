@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans("sentence.app_settings_manager")}} </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.general_settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.sales_offer")}}
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.sales_settins")}}
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.purchase_settings")}}
                                </a>
                            </div>
                            <hr>
                            <div class="col-xs-6 col-md-3">
                                <a href="{{ \App\User::getProductSettingsRoute() }}">
                                    {{trans("sentence.product_settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.account_settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.user_settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.printing_templates")}}
                                </a>
                            </div>
                            <hr>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.production_planning_settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("settings.warehouse_settings")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.email")}}
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    {{trans("sentence.category_and_tag_settings")}}
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
