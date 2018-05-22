@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Admin {{trans("general.dashboard")}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            Company Accounts:
                            {{ \App\Account::getActiveCountAttribute() }} Active
                            | {{ \App\Account::getExpiredCountAttribute() }} Expired
                        </p>

                        <p>
                            Account Users:
                            {{ \App\User::getPendingCount() }} Pending
                            | {{ \App\User::getActiveCount() }} Active
                            | {{ \App\User::getPassiveCount() }} Passive
                        </p>

                        You are logged in as Admin!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
