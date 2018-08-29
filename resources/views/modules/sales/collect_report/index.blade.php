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
                                    <div class="col-sm-8" ><h4>TAHSİLATLAR RAPORU</h4></div>

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
                                            <div class="text-center"><h6><b>VADESİ GEÇEN</b></h6></div>
                                            <div class="text-center" style="font-size:30px;color:#E74C3C!important">{{$expiry_total_collect}}<b> <small class="note"><i class="fa fa-try"></i> </small></b></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center"><h6><b>TOPLAM TAHSİLAT</b></h6></div>
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
                                            <th width="15%">TAHSİLAT TARİHİ</th>
                                            <th width="15%">FATURA/ÇEK TARİHİ</th>
                                            <th width="30%">MÜŞTERİ/TEDARİKÇİ</th>
                                            <th width="10%">FATURA/ÇEK</th>
                                            <th width="10%">GİRİŞ</th>
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
