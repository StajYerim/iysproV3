@extends("auth.layouts.app")
@section("guest")


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="left:-30%">

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center error-box">
                    <h1 class="error-text tada animated"><i class="fa fa-times-circle text-danger error-icon-shadow"></i> Error 500</h1>
                    <h2 class="font-xl">
                        <strong>
                            {{ trans("sentence.something_went_wrong") }}
                        </strong>
                    </h2>
                    <br>
                    <p class="lead semi-bold">
                        <strong>{{ trans("sentence.a_technical_error") }}.</strong><br><br>
                        <small>
                             {{ trans("sentence.correct_this_issue") }}
                        </small>
                    </p>
                    {{--<ul class="error-search text-left font-md">--}}
                        {{--<li><a href="javascript:void(0);"><small>Go to My Dashboard <i class="fa fa-arrow-right"></i></small></a></li>--}}
                        {{--<li><a href="javascript:void(0);"><small>Contact SmartAdmin IT Staff <i class="fa fa-mail-forward"></i></small></a></li>--}}
                        {{--<li><a href="javascript:void(0);"><small>Report error!</small></a></li>--}}
                        {{--<li><a href="javascript:void(0);"><small>Go back</small></a></li>--}}
                    {{--</ul>--}}
                </div>

            </div>

        </div>

    </div>


@endsection