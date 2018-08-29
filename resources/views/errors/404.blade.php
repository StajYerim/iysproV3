@extends("auth.layouts.app")
@section("guest")
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="left:-30%">

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center error-box">
                    <h1 class="error-text-2 bounceInDown animated"> {{ trans("word.error") }} 404 <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1>
                    <h2 class="font-xl">
                        <strong>
                            <i class="fa fa-fw fa-warning fa-lg text-warning"></i>
                            {{ trans("sentence.page_not_found") }}
                        </strong>
                    </h2>
                    <br>
                    <p class="lead">
                        {{ trans("sentence.the_page_you_request_could_not_be_found") }}
                    </p>
                    <br>
                    <div class="error-search well well-lg padding-10">
                        <div class="input-group">
                            <input class="form-control input-lg" type="text" placeholder="{{ trans("word.search") }}" id="search-error">
                            <span class="input-group-addon"><i class="fa fa-fw fa-lg fa-search"></i></span>
                        </div>
                    </div>

                    {{--<div class="row">--}}

                        {{--<div class="col-sm-12">--}}
                            {{--<ul class="list-inline">--}}
                                {{--<li>--}}
                                    {{--&nbsp;<a href="javascript:void(0);">Dashbaord</a>&nbsp;--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--.--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--&nbsp;<a href="javascript:void(0);">Inbox (14)</a>&nbsp;--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--.--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--&nbsp;<a href="javascript:void(0);">Calendar</a>&nbsp;--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--.--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--&nbsp;<a href="javascript:void(0);">Gallery</a>&nbsp;--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--.--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--&nbsp;<a href="javascript:void(0);">My Profile</a>&nbsp;--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                </div>

            </div>

        </div>

    </div>

@endsection