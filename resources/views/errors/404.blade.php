@extends("auth.layouts.app")
@section("guest")
    <div class=""  style="left:-30%">

        <div class="row">
            <div >
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


                </div>

            </div>

        </div>

    </div>

@endsection