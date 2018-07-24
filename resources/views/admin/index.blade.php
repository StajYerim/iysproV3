@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{trans("sentence.admin_dashboard")}}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            {{ trans("sentence.company_accounts") }} :
                            {{ \App\Account::getActiveCountAttribute() }} Active
                            | {{ \App\Account::getExpiredCountAttribute() }} Expired
                        </p>

                        <p>
                            {{ trans("sentence.account_users") }} :
                            {{ \App\User::getPendingCount() }} Pending
                            | {{ \App\User::getActiveCount() }} Active
                            | {{ \App\User::getPassiveCount() }} Passive
                        </p>

                        {{ trans("sentence.you_are_logged_in_as_admi") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
