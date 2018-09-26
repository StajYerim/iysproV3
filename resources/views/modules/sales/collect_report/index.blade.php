@extends('layouts.master')
@section('content')
    <style>
        .active-cart{
            width: 100%;
            height: 16px;
            background: #e3e3e3;
            padding: 0px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
    <!-- MAIN CONTENT -->
    <div id="content">

        <section id="widget-grid">

            {{--<div class="row">--}}
                {{--<article class="col-sm-12">--}}
                    {{--<div class="jarviswidget well" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">--}}
                        {{--<div class="widget-body">--}}
                            {{--<div class="widget-body-toolbar st">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<h2>Bar Chart</h2>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-12">--}}
                                {{--<div id="normal-bar-graph" class="chart no-padding"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--</div>--}}

            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                        <div class="widget-body">
                            <div class="widget-body-toolbar st">
                                <div class="row">
                                    <div class="col-sm-8" >
                                        <h4>{{ trans('sentence.collect_reports') }}</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="btn btn-default  dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-print"></span> {{trans("word.print")}} <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <a class="test" tabindex="-1" href="#">  <i class="fa fa-print" aria-hidden="true"></i> TAHSİLAT YAZDIR</a>
                                                <ul class="dropdown-menu"  style="   right: 158px;top: 5px;">
                                                    @foreach($langs as $lang)
                                                        <li>
                                                            <a tabindex="-1" target="_blank" href="{{ route("sales.collect_report.pdf",[aid(),"url",$lang->lang_code])}}">
                                                                <img src="https://dev.iyspro.com/img/blank.gif" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}">
                                                                {{$lang->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <style>
                                .note{
                                    font-size:20px;
                                }
                            </style>
                            <div class="row">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-4">
                                            <div class="text-center"><h6><b>{{ trans('sentence.overdue_collections') }}</b></h6></div>
                                            <div class="text-center" style="font-size:30px;color:#E74C3C!important">{{$expiry_total_collect}}<b> <small class="note"><i class="fa fa-try"></i> </small></b></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center"><h6><b>{{ trans('sentence.total_collection') }}</b></h6></div>
                                            <div class="text-center" style="font-size:30px;color:#2AC!important">{{$total_collect}}<b> <small class="note"><i class="fa fa-try"></i> </small></b></div>

                                        </div>
                                        <div class="col-sm-4">
                                            {{--<div class="text-center"><h6><b>ORT.VADE AŞIMI</b></h6></div>--}}

                                            {{--<div class="text-center" style="font-size:30px"><b>30 <small class="note">gün</small></b></div>--}}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-12">
                                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="15%">{{ trans('sentence.collection_date') }}</th>
                                            <th width="15%">{{ trans('sentence.invoice_and_cheque_date') }}</th>
                                            <th width="30%">{{ trans('sentence.customer_and_supplier') }}</th>
                                            <th width="10%">{{ trans('sentence.invoice_and_cheque') }}</th>
                                            <th width="10%">{{ trans('word.entry') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($export_collect["sales_orders"] as $order)
                                            @if($order->remaining != "0,00")
                                        <tr style="cursor:pointer" onclick="window.location.href='{{route("sales.orders.show",[aid(),$order->id])}}'">
                                            <td>{{$order->due_date}}</td>
                                            <td>{{$order->date}}</td>
                                            <td>{{$order->company["company_name"]}}</td>
                                            <td>FATURA</td>
                                            <td>{{$order->remaining}}  <i class="fa fa-try"></i></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @foreach($export_collect["cheques"] as $cheque)
                                            @if($cheque->collect_statu == 0)
                                            <tr style="cursor:pointer" onclick="window.location.href='{{route("finance.cheques.show",[aid(),$cheque->id])}}'">
                                                <td>{{$cheque->payment_date}}</td>
                                                <td>{{$cheque->date}}</td>
                                                <td>{{$cheque->company_id != null ? $cheque->company["company_name"]:"-"}}</td>
                                                <td>ÇEK</td>
                                                <td>{{$cheque->amount}} <i class="fa fa-try"></i></td>
                                            </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <!-- end widget grid -->
    </div>
    <!-- END MAIN CONTENT -->

    @push("scripts")
        <!-- PAGE RELATED PLUGIN(S) -->
        {{--<script src="/js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>--}}
        {{--<script src="/js/plugin/moment/moment.min.js"></script>--}}
        {{--<script src="/js/plugin/chartjs/chart.min.js"></script>--}}
        {{--<script src="/js/plugin/morris/raphael.min.js"></script>--}}
        {{--<script src="/js/plugin/morris/morris.min.js"></script>--}}
        {{--<script src="/js/plugin/daterangepicker/daterangepicker.js"></script>--}}
        {{--<link rel="stylesheet" href="/js/plugin/daterangepicker/daterangepicker.css">--}}

        <script type="text/javascript">


            $(document).ready(function () {

                pageSetUp();


            });


        </script>
    @endpush


@endsection
