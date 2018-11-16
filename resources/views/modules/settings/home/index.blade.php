@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">

            <ol class="dd-list">
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("general",aid()) }}">--}}
                            {{--<i class="fa fa-cogs"></i>--}}
                            {{--{{ trans("sentence.general_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("offer",aid()) }}">
                            <i class="fa fa-list-alt"></i>
                            {{ trans("sentence.offer_settings") }}
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("product", aid()) }}">
                            <i class="fa fa-shopping-cart"></i>
                            {{ trans("sentence.product_settings") }}
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("categoryandtags", aid()) }}">
                            <i class="fa fa-tag"></i>
                            {{ trans("sentence.category_and_tag_settings") }}
                        </a>
                    </h3>
                </li>
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("sales",aid()) }}">--}}
                            {{--<i class="fa fa-money"></i>--}}
                            {{--{{ trans("sentence.sales_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("purchase",aid()) }}">--}}
                            {{--<i class="fa fa-money"></i>--}}
                            {{--{{ trans("sentence.purchase_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}

                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("account", aid()) }}">--}}
                            {{--<i class="fa fa-suitcase"></i>--}}
                            {{--{{ trans("sentence.current_account_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("user", aid()) }}">--}}
                            {{--<i class="fa fa-user"></i>--}}
                            {{--{{ trans("sentence.user_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("print", aid()) }}">--}}
                            {{--<i class="fa fa-print"></i>--}}
                            {{--{{ trans("sentence.printing_templates") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("planning", aid()) }}">--}}
                            {{--<i class="fa fa-bar-chart-o"></i>--}}
                            {{--{{ trans("sentence.production_planning_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("store", aid()) }}">--}}
                            {{--<i class="fa fa-archive"></i>--}}
                            {{--{{ trans("sentence.warehouse_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("email", aid()) }}">--}}
                            {{--<i class="fa fa-send-o"></i>--}}
                            {{--{{ trans("sentence.email_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}

                {{--<li class="col-md-4">--}}
                    {{--<h3 class="h3 settings-title">--}}
                        {{--<a href="{{ route("invoice", aid()) }}">--}}
                            {{--<i class="fa fa-tag"></i>--}}
                            {{--{{ trans("sentence.invoice_waybill_settings") }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</li>--}}
            </ol>

        </div>
    </div>
@endsection