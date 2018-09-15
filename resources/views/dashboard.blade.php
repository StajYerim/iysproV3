@extends('layouts.master')

@section('content')

    <section id="widget-grid">

        <div class="row" style="display:none">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="highchart-container3"></div>
                <div class="col-sm-12 well">
                    <div class="col-sm-12 ">
                        <div class="highchart-container3"></div>
                    </div>
                    <div class="col-sm-6">
                        <table style="display:none" class="highchart table table-hover table-bordered" data-graph-container=".. .. .highchart-container3" data-graph-type="column">
                            <caption>{{ trans('sentence.cash_flow') }}</caption>
                            <thead>
                            <tr>
                                <th>{{ trans('word.week') }}</th>
                                <th>{{ trans('word.collections') }}</th>
                                <th data-graph-type="area">{{ trans('word.payments') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cash_flow as $cash)
                            <tr>
                                <td>{!!$cash["week_id"] !!}</td>
                                <td>{{$cash["order_total"]+$cash["cheq_total"]+$cash["bank_total"]}}</td>
                                <td>{{$cash["porder_total"]+$cash["cheq_payment"]+$cash["expense_payment"]}}</td>
                            </tr>
                            @endforeach

                            </tbody>{{ trans('word.collections') }}</table>
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
                        <h2>{{ trans('word.collections') }}</h2>

                    </header>

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('word.total') }}</b>
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
                                            {{ trans('word.total') }} : {{ $total_collect }} <i class="fa fa-try"></i>
                                        </strong>
                                    </div>
                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('word.delayed') }}</b>
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
                                        <b>{{ trans('word.unplanning') }}</b>
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

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                        <h2>{{ trans('word.payments') }}</h2>

                    </header>

                    <div>

                        <div class="widget-body no-padding">

                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('word.total') }}</b>
                                    </div>

                                    <div class="widget-body no-padding">

                                        <div id="total_payment" class="chart no-padding"></div>

                                    </div>
                                    <div class="text-center">
                                        <b>{{ trans('word.total') }} : {{ $total_payment }} <i class="fa fa-try"></i></b>
                                    </div>

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('word.delayed') }}</b>
                                    </div>
                                    <div class="jarviswidget-editbox">

                                    </div>

                                    <div class="widget-body no-padding">
                                        <div id="overdue_payment" class="chart no-padding"></div>

                                    </div>

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('word.unplanning') }}</b>
                                    </div>
                                    <div class="jarviswidget-editbox">

                                    </div>

                                    <div class="widget-body no-padding">

                                        <div id="unplanning_payment" class="chart no-padding"></div>

                                    </div>

                                </div>
                            </article>

                        </div>

                    </div>

                </div>

            </article>

        </div>

        <div class="row">
            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>{{ trans('sentence.safe_and_accounts') }}</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ trans('word.company') }}</th>
                                    <th>{{ trans('word.date') }}</th>
                                    <th>{{ trans('word.balance') }}</th>
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
                            <b>{{ trans('sentence.due_collections') }}</b>
                        </div>
                    </header>

                    <div>
                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ trans('word.company') }}</th>
                                    <th>{{ trans('word.date') }}</th>
                                    <th>{{ trans('word.balance') }}</th>
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
                            <b>{{ trans('sentence.due_payments') }}</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ trans('word.company') }}</th>
                                    <th>{{ trans('word.date') }}</th>
                                    <th>{{ trans('word.balance') }}</th>
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
                            <b>{{ trans('sentence.payment_history') }}</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ trans('word.company') }}</th>
                                    <th>{{ trans('word.date') }}</th>
                                    <th>{{ trans('word.balance') }}</th>
                                    <th>{{ trans('word.status') }}</th>
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
                                                    {{ trans('word.entry') }}
                                                </span>
                                                @else
                                                    <span style="color:red">
                                                    {{ trans('word.exit') }}
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
                        @if($total_collect != 0)
                        {
                            value : '{{$unplanning_collect}}',
                            label : '{{ trans("word.unplanning") }}'
                        },
                        {
                            value:'{{ $expiry_remaining }}',
                            label:'{{ trans("word.delayed") }}'
                        }
                        @else
                        {
                            value : 100,
                            label : '{{ trans('sentence.no_record') }}'
                        }
                        @endif

                    ],
                    labelColor: '#000000',
                    colors: {!!  $total_collect_color !!},
                    formatter : function(x,d) {
                        if(d.label == "{{ trans('sentence.no_record') }}"){
                            return "";
                        }
                        return x + " ₺"
                    }
                });
            }

            if ($('#overdue_collection').length) {
                Morris.Donut({
                    element : 'overdue_collection',
                    data : [{
                        value:'{{ $expiry_remaining == 0 ? '100' : $expiry_remaining }}',
                        label:'{{ $expiry_remaining == 0 ? trans('sentence.no_record') :""}}'
                    }],
                    colors: ['{{ $expiry_remaining_color }}'],
                    formatter : function(x,d,s) {
                        if(d.label == "{{ trans('sentence.no_record') }}"){
                            return "";
                        }
                        return x + " ₺"
                    },
                });
            }

            if ($('#unplanning_collection').length) {
                Morris.Donut({
                    element : 'unplanning_collection',
                    data : [{
                        value:'{{ $unplanning_collect == 0 ? "100":$unplanning_collect}}',
                        label:'{{ $unplanning_collect == 0 ? trans('sentence.no_record') :""}}'
                    }],
                    colors: ['{{ $unplanning_collect_color }}'],
                    formatter : function(x,d,s) {
                        if(d.label == "{{ trans('sentence.no_record') }}"){
                            return "";
                        }
                        return  x + " ₺"
                    }
                });
            }

            if ($('#total_payment').length) {
                Morris.Donut({
                    element : 'total_payment',
                    data : [
                        @if($total_payment != 0)
                            {
                                value : '{{ $unplanning_remaining }}',
                                label : "{{ trans('word.unplanning') }}"
                            },
                            {
                                value:'{{ $purchase_expiry_remaining }}',
                                label:"{{ trans('word.delayed') }}"
                            }
                        @else
                            {
                                value : 100,
                                label : "{{ trans('sentence.no_record') }}"
                            }
                        @endif
                    ],
                    labelColor: '#000000',
                    colors: {!! $total_payment_color !!},
                    formatter : function(x,d) {
                        if(d.label == "{{ trans('sentence.no_record') }}"){
                            return "";
                        }
                        return x.toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })+" ₺"
                    }
                });
            }

            if ($('#overdue_payment').length) {
                Morris.Donut({
                    element : 'overdue_payment',
                    resize: true,
                    data : [{
                        value:'{{ $purchase_expiry_remaining == 0 ? 100 : $purchase_expiry_remaining }}',
                        label:'{{ $purchase_expiry_remaining == 0 ? trans('sentence.no_record') : "" }}'
                    }],
                    colors: ['{{ $purchase_expiry_remaining_color  }}'],
                    formatter : function(x,d) {
                        if(d.label == "{{ trans('sentence.no_record') }}"){
                            return "";
                        }
                        return x + " ₺"
                    }
                });
            }

            if ($('#unplanning_payment').length) {
                Morris.Donut({
                    element : 'unplanning_payment',
                    data : [{
                        value:'{{ $unplanning_remaining == 0 ? 100 : $unplanning_remaining}}',
                        label:'{{ $unplanning_remaining == 0 ? trans('sentence.no_record') : "" }}'
                    }],
                    colors: ['{{ $unplanning_remaining_color  }}'],
                    formatter : function(x,d) {
                        if(d.label == "{{ trans('sentence.no_record') }}"){
                            return "";
                        }
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
