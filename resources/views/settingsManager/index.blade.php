@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">App Settings Manager</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    General Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Sales Offer
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Sales Settings
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Purchase Settings
                                </a>
                            </div>
                            <hr>
                            <div class="col-xs-6 col-md-3">
                                <a href="{{ \App\User::getProductSettingsRoute() }}">
                                    Product Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Account Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    User Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Printer Templates
                                </a>
                            </div>
                            <hr>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Production Planning Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Warehouse Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    E-mail Settings
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    Category and Tags
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
