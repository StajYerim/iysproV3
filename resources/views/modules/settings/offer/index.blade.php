@extends('layouts.master')
@section('content')

    <section>
        <div class="row">
            <div class="col-sm-12">
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('offer.post',aid()) }}" id="offerSettingsForm">
                                @csrf

                                <ul id="myTab1" class="nav nav-tabs bordered">
                                    <li class="active">
                                        <a href="#s1" data-toggle="tab" aria-expanded="true"><i class="fa fa-fw fa-lg fa-gear"></i> {{ trans('sentence.offer_settings') }} </a>
                                    </li>
                                    <li class="">
                                        <a href="#s2" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-lg fa-file-text-o"></i> {{ trans('sentence.cover_page') }}</a>
                                    </li>

                                </ul>

                                <div id="myTabContent1" class="tab-content padding-10">
                                    <div class="tab-pane fade active in" id="s1">

                                        <fieldset>
                                            <legend></legend>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">{{ trans('sentence.show_logo') }}</label>
                                                <div style="float:left" class="col-md-9">
                                                    <label class="radioStyle">
                                                        <input type="radio"
                                                               class="radiobox style-0" value="0" {{ empty($sales_offers) ? 'checked' : '' }} {{ (!empty($sales_offers) && $sales_offers->logo_show == 0) ? 'checked' : '' }} name="logo_show">
                                                        <span>{{ trans('word.no') }}</span>
                                                    </label>
                                                    <label class="radioStyle ">
                                                        <input type="radio" class="radiobox style-0" {{ (!empty($sales_offers) && $sales_offers->logo_show == 1) ? 'checked' : '' }} value="1" name="logo_show">
                                                        <span>{{ trans('word.yes') }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <legend></legend>
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    {{ trans('sentence.default_validity_day') }}
                                                </label>
                                                <div class="col-md-2">
                                                    <label class="radioStyle pull-right">
                                                        <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                                            <input type="text" value="{{ !empty($sales_offers) ? $sales_offers->due_day : '' }}" class="spinner ui-spinner-input" name="due_day" aria-valuenow="10" autocomplete="off" role="spinbutton">
                                                        </span>
                                                    </label>

                                                </div>
                                            </div>
                                        </fieldset>
                                        <legend></legend>
                                        <fieldset>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>{{ trans('sentence.introduction_text') }}</label>
                                                    <textarea name="front_text" id="front_text" style="visibility: hidden; display: none;">{{ (!empty($sales_offers)) ? $sales_offers->front_text : '' }}</textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <legend></legend>
                                        <fieldset>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>{{ trans('sentence.bottom_note') }}</label>
                                                    <textarea name="bottom_text" id="bottom_text" style="visibility: hidden; display: none;">{{ (!empty($sales_offers)) ? $sales_offers->bottom_text : '' }}</textarea>
                                                </div>
                                            </div>
                                        </fieldset>



                                    </div>
                                    <div class="tab-pane fade" id="s2">
                                        <small class="note alert-warning">{{ trans('sentence.if_you_do_not_want_to_use_the_cover_page') }}</small>
                                        <textarea name="cover_page" id="cover_page" style="visibility: hidden; display: none;">{{ (!empty($sales_offers)) ? $sales_offers->cover_page : '' }}</textarea>
                                    </div>

                                </div>
                                <fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="btnChanges" style="display: inline-block">
                                                    <button type="submit" id="salesSettingsBtn" class="btn btn-success btn-lg save">
                                                        <i class="fa fa-save"></i> {{ trans('word.save') }}
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        @include("components.modals.companies",[$option="customer",$title= trans('sentence.new_company'),$type = "new_company",$message=trans('sentence.company_form'),$id=0])

    </section>

    @push('scripts')
        <script src="/js/plugin/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'front_text');
            CKEDITOR.replace( 'bottom_text');
            CKEDITOR.replace( 'cover_page');
        </script>
    @endpush

@endsection