@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Company Profile
            </div>

            <div class="card-body">
                COMMERCIAL TITLE : {{ $company->company_name }}<br>
                SECTOR : {{ $company->sector->name }}<br>
                FULL NAME : {{ $company->owner->name }}<br>
                E-MAIL : {{ $company->owner->email }}<br>
                PHONE : {{ $company->owner->mobile }}<br>
                EXPIRY : {{ $company->expiry_date->format('d.m.Y') }}
            </div>
        </div>
    </div>
@endsection