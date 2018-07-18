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
                                {{trans("general.product")}} {{trans("general.image")}} {{trans("general.upload")}} ?
                            </div>

                            <div class="col-xs-6 col-md-9">
                                <a href="#">
                                  <input type="checkbox">
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <a href="#">
                                    {{trans("general.stock")}} Units
                                </a>
                            </div>
                        </div><br>
                            <button type="submit" >{{trans("general.save")}}!</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
