@extends('layouts.master')

@section('content')

    <section id="widget-grid">

        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="highchart-container3"></div>
                <div class="col-sm-12 well">
                    <div class="col-sm-12 ">
                        <div class="highchart-container3"></div>
                    </div>
                    <div class="col-sm-6">
                        <table style="display:none" class="highchart table table-hover table-bordered" data-graph-container=".. .. .highchart-container3" data-graph-type="column">
                            <caption>NAKİT AKIŞI</caption>
                            <thead>
                            <tr>
                                <th>HAFTA</th>
                                <th>TAHSİLATLAR</th>
                                <th data-graph-type="area">ÖDEMELER</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cash_flow as $cash)
                            <tr>
                                <td>{!!$cash["week_id"] !!}</td>
                                <td>{{$cash["order_total"]+$cash["cheq_total"]+$cash["bank_total"]}}</td>
                                <td>{{$cash["porder_total"]+$cash["cheq_payment"]}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </article>

        </div>

        <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                        <h2>TAHSİLATLAR </h2>

                    </header>

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>TOPLAM</b>
                                    </div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">

                                    </div>
                                    <!-- end widget edit box -->
                                    <div class="widget-body no-padding">

                                        <div id="total_collection" class="chart no-padding"></div>

                                    </div>
                                    <div class="text-center">
                                        <strong>
                                            TOPLAM : {{ $total_collect }} <i class="fa fa-try"></i>
                                        </strong>
                                    </div>
                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>GECİKMİŞ</b>
                                    </div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body no-padding">
                                        <div id="overdue_collection" class="chart no-padding"></div>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>GÜNÜ GELMEMİŞ</b>
                                    </div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body no-padding">

                                        <div id="unplanning_collection" class="chart no-padding"></div>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                            </article>


                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>

        </div>

        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                        <h2>ÖDEMELER</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>TOPLAM</b>
                                    </div>

                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body no-padding">

                                        <div id="total_payment" class="chart no-padding"></div>

                                    </div>
                                    <!-- end widget content -->
                                    <div class="text-center">
                                        <b>TOPLAM : {{ $total_collect }} <i class="fa fa-try"></i></b>
                                    </div>

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>GECİKMİŞ</b>
                                    </div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body no-padding">
                                        <div id="overdue_payment" class="chart no-padding"></div>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>GÜNÜ GELMEMİŞ</b>
                                    </div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body no-padding">

                                        <div id="unplanning_payment" class="chart no-padding"></div>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                            </article>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>

        <div class="row">

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>KASA VE HESAPLAR</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Firma</th>
                                    <th>Tarih</th>
                                    <th>Bakiye</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bank_accounts as $bank_account)

                                    <tr>
                                        <td>{{ $bank_account->name }}</td>
                                        <td>{{ $bank_account->currency }}</td>
                                        <td>
                                            {{ $bank_account->balance }}
                                            <i class="fa fa-{{ strtolower($bank_account->currency) }}"></i>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>VADESİ GELEN TAHSİLATLAR</b>
                        </div>
                    </header>

                    <div>
                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Firma</th>
                                    <th>Tarih</th>
                                    <th>Bakiye</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sales_orders as $sales_order)
                                    @if(money_db_format($sales_order->remaining) > 0)
                                        <tr>
                                            <td>
                                                {{ $sales_order->company->company_name }}
                                            </td>
                                            <td>
                                                {{ $sales_order->due_date }}
                                            </td>
                                            <td>
                                                {{ $sales_order->remaining }}
                                                <i class="fa fa-{{ $bank_account->currency }}"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>VADESİ GELEN ÖDEMELER</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Firma</th>
                                    <th>Tarih</th>
                                    <th>Bakiye</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchase_orders as $purchase_order)
                                    @if(money_db_format($purchase_order->remaining) > 0)
                                        <tr>
                                            <td>
                                                {{ $purchase_order->company->company_name }}
                                            </td>
                                            <td>
                                                {{ $purchase_order->due_date }}
                                            </td>
                                            <td>
                                                {{ $purchase_order->remaining }}
                                                <i class="fa fa-{{ $purchase_order->currency }}"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>ÖDEME GEÇMİŞİ</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Firma</th>
                                    <th>Tarih</th>
                                    <th>Bakiye</th>
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bank_account_items as $bank_account_item)
                                    @if($bank_account_item->company_id != null)
                                        <tr>
                                            <td>{{ $bank_account_item->company->company_name }}</td>
                                            <td>{{ $bank_account_item->date }}</td>
                                            <td>
                                                {{ $bank_account_item->amount }}
                                                <i class="fa fa-{{ $bank_account_item->currency }}"></i>
                                            </td>
                                            <td>
                                                @if($bank_account_item->action_type == 1)
                                                    <span style="color:green">
                                                    GİRİŞ
                                                </span>
                                                @else
                                                    <span style="color:red">
                                                    ÇIKIŞ
                                                </span>
                                                @endif

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                            <ul>




                            </ul>
                        </div>

                    </div>
                </div>
            </article>
        </div>

    </section>
    <script src="/js/plugin/highChartCore/highcharts-custom.min.js"></script>
    <script src="/js/plugin/highchartTable/jquery.highchartTable.min.js"></script>
    <script src="/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
    <script src="/js/plugin/morris/raphael.min.js"></script>
    <script src="/js/plugin/morris/morris.min.js"></script>
    <script>

        $(document).ready(function(){
            if ($('#total_collection').length) {
                Morris.Donut({
                    element : 'total_collection',
                    data : [
                        {
                            value : '{{$unplanning_collect}}',
                            label : 'GÜNÜ GELMEMİŞ'
                        },
                        {
                            value:'{{ $expiry_remaining }}',
                            label:'GECİKMİŞ'
                        }

                    ],
                    labelColor: '#000000',
                    colors: [
                        '#3149a4',
                        '#b5130a',
                    ],
                    formatter : function(x) {
                        return x + " ₺"
                    }
                });
            }
            if ($('#overdue_collection').length) {
                Morris.Donut({
                    element : 'overdue_collection',
                    data : [{
                        value:'{{ $expiry_remaining }}',
                        label:''
                    }],
                    formatter : function(x) {
                        return x + " ₺"
                    }
                });
            }
            if ($('#unplanning_collection').length) {
                Morris.Donut({
                    element : 'unplanning_collection',
                    data : [{
                        value:'{{ $unplanning_collect }}',
                        label:''
                    }],
                    formatter : function(x) {
                        return x + " ₺"
                    }
                });
            }
            if ($('#total_payment').length) {
                Morris.Donut({
                    element : 'total_payment',
                    data : [
                        {
                            value : '{{$purchase_expiry_remaining}}',
                            label : 'GECİKMİŞ'
                        },
                        {
                            value : '{{$unplanning_remaining}}',
                            label : 'GÜNÜ GELMEMİŞ'
                        }
                    ],
                    labelColor: '#000000',
                    colors: [
                        '#3149a4',
                        '#b5130a',
                    ],
                    formatter : function(x) {
                        return x + " ₺"
                    }
                });
            }
            if ($('#overdue_payment').length) {
                Morris.Donut({
                    element : 'overdue_payment',
                    resize: true,
                    data : [{
                        value:'{{$purchase_expiry_remaining}}',
                        label:''
                    }],
                    formatter : function(x) {
                        return x + " ₺"
                    }
                });
            }
            if ($('#unplanning_payment').length) {
                Morris.Donut({
                    element : 'unplanning_payment',
                    data : [{
                        value:'{{ $unplanning_remaining }}',
                        label:''
                    }],
                    formatter : function(x) {

                        return x + " ₺"
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {

            $('table.highchart').highchartTable();
        })

    </script>

@endsection
