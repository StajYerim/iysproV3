@extends('auth.layouts.app')
@section('guest')
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" >
        <div class="alert alert-block alert-warning">
            <h4 class="alert-heading">Maintenance Mode</h4>
            {{ $exception->getMessage() }}
        </div>
    </div>
@endsection
