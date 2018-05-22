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
                                    Product İmage Upload ?
                            </div>

                            <div class="col-xs-6 col-md-9">
                                <a href="#">
                                  <input type="checkbox">
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <a href="#">
                                   Stock Units
                                </a>
                            </div>
                        </div><br>
                            <button type="submit" >Save!</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
