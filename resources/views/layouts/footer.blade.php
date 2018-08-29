<!-- PAGE FOOTER -->
<div class="page-footer">
      <div class="row" >
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">{!! auth()->user()->memberOfAccount["company_name"] == null ? "Admin Area":auth()->user()->memberOfAccount["company_name"] !!} <span class="hidden-xs"> - {{ trans("sentence.web_application") }}</span> © 2017-2018</span>
        </div>

        <div class="col-xs-6 col-sm-6 text-right hidden-xs">
            <div class="txt-color-white inline-block">
                <i class="txt-color-blueLight hidden-mobile">{{ trans("sentence.last_account_activity") }} <i class="fa fa-clock-o"></i> 52 {{ trans("sentence.mins_ago") }}

            </div>
        </div>
    </div>
</div>
<!-- END PAGE FOOTER -->