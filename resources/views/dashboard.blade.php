@extends('layouts.master')

@section('content')

    <section id="widget-grid">

        <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->

            <div class="jarviswidget jarviswidget-color-blue"  data-widget-colorbutton="false"
                 data-widget-editbutton="false"
                 data-widget-togglebutton="false"
                 data-widget-deletebutton="false"
                 data-widget-fullscreenbutton="false"
                 data-widget-custombutton="false"
                 data-widget-collapsed="false"
                 data-widget-sortable="false" id="wid-id-0">

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
                                        <b>{{ trans('sentence.total_collections') }}</b><br>
                                        <span>{{get_money($total_collect)}} TL</span>
                                    </div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">

                                    </div>
                                    <!-- end widget edit box -->
                                    <div class="widget-body no-padding">

                                        {{--<div class="text-center">--}}
                                        {{--<img src="https://koban.cloud/wp-content/uploads/2017/08/fa-check.png" style="width:40px">--}}
                                        {{--</div>--}}
                                        <div id="total_collection" class="chart no-padding"></div>

                                    </div>

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('sentence.delayed_collections') }}</b>
                                        <br>
                                        <span>{{get_money($sales["gecikmis"]+$cheques["gecikmis"])}} TL</span>

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
                                        <b>{{ trans('sentence.unplannıng_collections') }}</b>
                                        <br>
                                        <span>{{get_money($sales["gelecek"]+$cheques["gelecek"])}} TL</span>
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

                    <div class="jarviswidget jarviswidget-color-blue"  data-widget-colorbutton="false"
                         data-widget-editbutton="false"
                         data-widget-togglebutton="false"
                         data-widget-deletebutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-custombutton="false"
                         data-widget-collapsed="false"
                         data-widget-sortable="false" id="wid-id-0">

                        <header>
                            <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                            <h2>{{ trans('word.payments') }}</h2>

                        </header>
                    <div>

                        <div class="widget-body no-padding">

                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('sentence.total_payments') }}</b>
                                        <br>
                                        <span>{{get_money($total_payment)}} TL</span>
                                    </div>

                                    <div class="widget-body no-padding">

                                        <div id="total_payment" class="chart no-padding"></div>

                                    </div>

                                </div>
                            </article>
                            <article class="col-sm-4">
                                <div>
                                    <div class="text-center">
                                        <b>{{ trans('sentence.delayed_payments') }}</b>
                                        <br>
                                        <span>{{get_money($purchase["gecikmis"]+$cheques_payment["gecikmis"]+$expenses["gecikmis"])}} TL</span>
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
                                        <b>{{ trans('sentence.unplannıng_payments') }}</b>
                                        <br>
                                        <span>{{get_money($purchase["gelecek"]+$cheques_payment["gelecek"]+$expenses["gelecek"])}} TL</span>

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
                <div class="jarviswidget jarviswidget-color-blueDark"
                     data-widget-colorbutton="false"
                     data-widget-editbutton="false"
                     data-widget-togglebutton="false"
                     data-widget-deletebutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-custombutton="false"
                     data-widget-collapsed="false"
                     data-widget-sortable="false"
                >

                    <header>

                            <h2> {{ trans('sentence.safe_and_accounts') }}</h2>

                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ trans('word.company') }}</th>
                                    <th>{{ trans('word.currency') }}</th>
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
                <div class="jarviswidget jarviswidget-color-blue"  data-widget-colorbutton="false"
                     data-widget-editbutton="false"
                     data-widget-togglebutton="false"
                     data-widget-deletebutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-custombutton="false"
                     data-widget-collapsed="false"
                     data-widget-sortable="false" id="wid-id-0">

                    <header>

                            <h2>{{ trans('sentence.due_collections') }}</h2>

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
        </div>
            <div class="row">
            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget jarviswidget-color-blue"  data-widget-colorbutton="false"
                     data-widget-editbutton="false"
                     data-widget-togglebutton="false"
                     data-widget-deletebutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-custombutton="false"
                     data-widget-collapsed="false"
                     data-widget-sortable="false" id="wid-id-0">

                    <header>

                        <h2>{{ trans('sentence.due_payments') }}</h2>

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
                <div class="jarviswidget jarviswidget-color-blue"  data-widget-colorbutton="false"
                     data-widget-editbutton="false"
                     data-widget-togglebutton="false"
                     data-widget-deletebutton="false"
                     data-widget-fullscreenbutton="false"
                     data-widget-custombutton="false"
                     data-widget-collapsed="false"
                     data-widget-sortable="false" id="wid-id-0">

                    <header>

                        <h2>{{ trans('sentence.payment_history') }}</h2>

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

    <script src="/js/plugin/morris/raphael.min.js"></script>
    <script src="/js/plugin/morris/morris.min.js"></script>
    <script>

        $(document).ready(function(){
            pageSetUp();
            // donut
            if ($('#total_collection').length) {
                Morris.Donut.prototype.drawEmptyDonutLabel = function (xPos, yPos, color, fontSize, fontWeight) {
                    var text;
                    text = this.raphael.text(xPos, yPos, '').attr('font-size', "12px").attr('fill', "#636972").attr('font-family', "futura-pt");
                    if (fontWeight != null) {
                        text.attr('font-weight', fontWeight);
                    }
                    return text;
                };
                Morris.Donut({
                    element : 'total_collection',
                    data: [@if($total_collect != 0)
                        @if($sales["gecikmis"] !=0)
                    {
                        value: '{{$sales["gecikmis"]}}',
                        label: "{{ trans('sentence.delayed_order') }}"
                    },
                            @endif
                            @if($sales["gelecek"] !=0)
                        {
                            value: '{{$sales["gelecek"]}}',
                            label: "{{ trans('sentence.future_order') }}"
                        },
                            @endif
                            @if($cheques["gecikmis"] != 0)
                        {
                            value: '{{$cheques["gecikmis"]}}',
                            label: "{{ trans('sentence.delayed_cheque') }}"
                        },
                            @endif()
                            @if($cheques["gelecek"] !=0)
                        {
                            value: '{{$cheques["gelecek"]}}',
                            label: "{{ trans('sentence.future_cheque') }}"
                        },
                            @endif()

                            @else
                        {
                            value: '100',
                            label: "{{ trans('sentence.no_collection') }}"
                        }
                        @endif()

                    ],
                    colors: [
                        @if($total_collect != 0)
                                @if($sales["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($sales["gelecek"] !=0)
                            "#2AC",
                        @endif
                                @if($cheques["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($cheques["gelecek"] !=0)
                            "#2AC",
                        @endif
                                @else
                            "#d8d6d6"
                        @endif
                    ],
                    formatter: function (x, data) {
                        if (data.label != "{{ trans('sentence.no_collection') }}") {
                            return parseFloat(x).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + " TL";
                        } else {
                            return "";
                        }
                    }
                });
            }

            if ($('#overdue_collection').length) {
                Morris.Donut.prototype.drawEmptyDonutLabel = function (xPos, yPos, color, fontSize, fontWeight) {
                    var text;
                    text = this.raphael.text(xPos, yPos, '').attr('font-size', "12px").attr('fill', "#636972").attr('font-family', "futura-pt");
                    if (fontWeight != null) {
                        text.attr('font-weight', fontWeight);
                    }
                    return text;
                };
                Morris.Donut({
                    element: 'overdue_collection',
                    data: [@if($sales["gecikmis"]+$cheques["gecikmis"]!= 0)
                        @if($sales["gecikmis"] !=0)
                    {
                        value: '{{$sales["gecikmis"]}}',
                        label: "{{ trans('sentence.delayed_order') }}"
                    },
                            @endif()

                            @if($cheques["gecikmis"] !=0)
                        {
                            value: '{{$cheques["gecikmis"]}}',
                            label: "{{ trans('sentence.delayed_cheque') }}"
                        }
                        , @endif()

                            @else
                        {
                            value: '100',
                            label: "{{ trans('sentence.no_collection') }}"
                        }
                        @endif
                    ],
                    colors: [
                        @if($sales["gecikmis"]+$cheques["gecikmis"]!= 0)
                                @if($sales["gecikmis"] !=0)
                            "#a90329",
                        @endif

                                @if($cheques["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @else
                            "#d8d6d6"
                        @endif
                    ],
                    formatter: function (x, data) {
                        if (data.label != "{{ trans('sentence.no_collection') }}") {
                            return parseFloat(x).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + " TL";
                        } else {
                            return "";
                        }
                    }
                });
            }

            if ($('#unplanning_collection').length) {
                Morris.Donut.prototype.drawEmptyDonutLabel = function (xPos, yPos, color, fontSize, fontWeight) {
                    var text;
                    text = this.raphael.text(xPos, yPos, '').attr('font-size', "12px").attr('fill', "#636972").attr('font-family', "futura-pt");
                    if (fontWeight != null) {
                        text.attr('font-weight', fontWeight);
                    }
                    return text;
                };
                Morris.Donut({
                    element: 'unplanning_collection',
                    data: [@if($sales["gelecek"]+$cheques["gelecek"]!= 0)
                        @if($sales["gelecek"] !=0)
                    {
                        value: '{{$sales["gelecek"]}}',
                        label: "{{ trans('sentence.future_order') }}"
                    },
                            @endif

                            @if($cheques["gelecek"] !=0)
                        {
                            value: '{{$cheques["gelecek"]}}',
                            label: "{{ trans('sentence.future_cheque') }}"
                        }
                        , @endif()

                            @else
                        {
                            value: '100',
                            label: "{{ trans('sentence.no_collection') }}"
                        }

                        @endif

                    ],
                    colors: [@if($sales["gelecek"]+$cheques["gelecek"]!= 0)
                            @if($sales["gelecek"] !=0)
                        "#2AC",
                        @endif

                                @if($cheques["gelecek"] !=0)
                            "#2AC",
                        @endif

                                @else
                            "#d8d6d6"
                        @endif
                    ],
                    formatter: function (x, data) {
                        if (data.label != "{{ trans('sentence.no_collection') }}") {
                            return parseFloat(x).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + " TL";
                        } else {
                            return "";
                        }
                    }
                });
            }
//                    total payment

            if ($('#total_payment').length) {
                Morris.Donut.prototype.drawEmptyDonutLabel = function (xPos, yPos, color, fontSize, fontWeight) {
                    var text;
                    text = this.raphael.text(xPos, yPos, '').attr('font-size', "12px").attr('fill', "#636972").attr('font-family', "futura-pt");
                    if (fontWeight != null) {
                        text.attr('font-weight', fontWeight);
                    }
                    return text;
                };
                Morris.Donut({
                    element: 'total_payment',
                    data: [@if($total_payment != 0)
                             @if($purchase["gecikmis"] !=0)
                            {
                                value: '{{$purchase["gecikmis"]}}',
                                label: "{{ trans('sentence.delayed_payment') }}"
                            },
                            @endif
                            @if($cheques_payment["gecikmis"] !=0)
                        {
                            value: '{{$cheques_payment["gecikmis"]}}',
                            label: "{{ trans('sentence.delayed_cheque') }}"
                        },
                            @endif
                            @if($expenses["gecikmis"] !=0)
                        {
                            value: '{{$expenses["gecikmis"]}}',
                            label: "{{ trans('sentence.delayed_expense') }}"
                        },
                            @endif
                            @if($purchase["gelecek"] !=0)
                        {
                            value: '{{$purchase["gelecek"]}}',
                            label: "{{ trans('sentence.future_payment') }}"
                        },
                            @endif

                            @if($cheques_payment["gelecek"] !=0)
                        {
                            value: '{{$cheques_payment["gelecek"]}}',
                            label: "{{ trans('sentence.future_cheque') }}"
                        },
                            @endif
                            @if($expenses["gelecek"] !=0)
                        {
                            value: '{{$expenses["gelecek"]}}',
                            label: "{{ trans('sentence.future_expense') }}"
                        },
                            @endif
                            @else
                        {
                            value: '100',
                            label: "{{ trans('sentence.no_payment') }}"
                        }
                        @endif()

                    ],
                    colors: [
                        @if($total_payment != 0)
                                @if($purchase["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($cheques_payment["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($expenses["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($purchase["gelecek"] !=0)
                            "#886650",
                        @endif

                                @if($cheques_payment["gelecek"] !=0)
                            "#886650",
                        @endif
                                @if($expenses["gelecek"] !=0)
                            "#886650",
                        @endif
                                @else
                            "#d8d6d6"
                        @endif
                    ],
                    formatter: function (x, data) {
                        if (data.label != "{{ trans('sentence.no_payment') }}") {
                            return parseFloat(x).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + " TL";
                        } else {
                            return "";
                        }
                    }
                });
            }

            if ($('#overdue_payment').length) {
                Morris.Donut.prototype.drawEmptyDonutLabel = function (xPos, yPos, color, fontSize, fontWeight) {
                    var text;
                    text = this.raphael.text(xPos, yPos, '').attr('font-size', "12px").attr('fill', "#636972").attr('font-family', "futura-pt");
                    if (fontWeight != null) {
                        text.attr('font-weight', fontWeight);
                    }
                    return text;
                };
                Morris.Donut({
                    element: 'overdue_payment',
                    data: [@if($purchase["gecikmis"]+$cheques_payment["gecikmis"]+$expenses["gecikmis"] != 0)
                        @if($purchase["gecikmis"] !=0)
                    {
                        value: '{{$purchase["gecikmis"]}}',
                        label: "{{ trans('sentence.delayed_payment') }}"
                    },
                            @endif
                            @if($cheques_payment["gecikmis"] !=0)
                        {
                            value: '{{$cheques_payment["gecikmis"]}}',
                            label: "{{ trans('sentence.delayed_cheque') }}"
                        },
                            @endif
                            @if($expenses["gecikmis"] !=0)
                        {
                            value: '{{$expenses["gecikmis"]}}',
                            label: "{{ trans('sentence.delayed_expense') }}"
                        },
                            @endif

                            @else
                        {
                            value: '100',
                            label: "{{ trans('sentence.no_payment') }}"
                        }
                        @endif()

                    ],
                    colors: [
                        @if($purchase["gecikmis"]+$cheques_payment["gecikmis"]+$expenses["gecikmis"] != 0)
                                @if($purchase["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($cheques_payment["gecikmis"] !=0)
                            "#a90329",
                        @endif
                                @if($expenses["gecikmis"] !=0)
                            "#a90329",
                        @endif

                                @else
                            "#d8d6d6"
                        @endif
                    ],
                    formatter: function (x, data) {
                        if (data.label != "{{ trans('sentence.no_payment') }}") {
                            return parseFloat(x).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + " TL";
                        } else {
                            return "";
                        }
                    }
                });
            }

            if ($('#unplanning_payment').length) {
                Morris.Donut.prototype.drawEmptyDonutLabel = function (xPos, yPos, color, fontSize, fontWeight) {
                    var text;
                    text = this.raphael.text(xPos, yPos, '').attr('font-size', "12px").attr('fill', "#636972").attr('font-family', "futura-pt");
                    if (fontWeight != null) {
                        text.attr('font-weight', fontWeight);
                    }
                    return text;
                };
                Morris.Donut({
                    element: 'unplanning_payment',
                    data: [@if($purchase["gelecek"]+$cheques_payment["gelecek"]+$expenses["gelecek"] != 0)
                        @if($purchase["gelecek"] !=0)
                    {
                        value: '{{$purchase["gelecek"]}}',
                        label: "{{ trans('sentence.future_payment') }}"
                    },
                            @endif
                            @if($cheques_payment["gelecek"] !=0)
                        {
                            value: '{{$cheques_payment["gelecek"]}}',
                            label: "{{ trans('sentence.future_cheque') }}"
                        },
                            @endif
                            @if($expenses["gelecek"] !=0)
                        {
                            value: '{{$expenses["gelecek"]}}',
                            label: "{{ trans('sentence.future_expense') }}"
                        },
                            @endif

                            @else
                        {
                            value: '100',
                            label: "{{ trans('sentence.no_payment') }}"
                        }
                        @endif()

                    ],
                    colors: [
                        @if($purchase["gelecek"]+$cheques_payment["gelecek"]+$expenses["gelecek"] != 0)
                                @if($purchase["gelecek"] !=0)
                            "#886650",
                        @endif
                                @if($cheques_payment["gelecek"] !=0)
                            "#886650",
                        @endif
                                @if($expenses["gelecek"] !=0)
                            "#886650",
                        @endif
                                @else
                            "#d8d6d6"
                        @endif
                    ],
                    formatter: function (x, data) {
                        if (data.label != "{{ trans('sentence.no_payment') }}") {
                            return parseFloat(x).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }) + " TL";
                        } else {
                            return "";
                        }
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {


        })

    </script>

@endsection
