@extends('layouts.master')
@section("title","SATIŞ RAPORLARI")
@section('content')
    <!-- MAIN CONTENT -->
    <div id="content">
        <section id="sales_report" v-cloak>
            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget well" id="wid-id-0" data-widget-colorbutton="false"
                         data-widget-editbutton="false" data-widget-custombutton="false">
                        <div class="widget-body">
                            <div class="widget-body-toolbar st">
                                <div class="row">
                                    <div class="col-sm-4" style="margin-top:-20px;"><h2>{{ trans('sentence.expense_reports') }}</h2></div>

                                    <div class="col-sm-4 text-right">

                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="demo" type="text"
                                                       placeholder='{{ trans("sentence.day_month_year_format") }} - {{ trans("sentence.day_month_year_format") }}'/>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12">
                                    <div v-if="expenses_list.length == 0">
                                        {{ trans('sentence.there_is_no_expense_receipt_in_the_system') }}
                                    </div>

                                    <div v-if="expenses_list.length != 0" class="col-sm-4">

                                        <div class="text-center"><b>{{ trans('sentence.expense_categories') }}</b></div>
                                        <canvas id="customersChart" height="160"></canvas>

                                        <div v-for="(item) in expenses_pie" class="col-md-12">
                                            <label class="pull-left label"
                                                   v-bind:style="{'background-color':item.bgcolor}">
                                                @{{ item.labels }}
                                            </label>
                                            <label class="pull-right">
                                                <b>@{{formatPrice(item.data)}}</b>
                                                <i class="fa fa-try"></i>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col-sm-4">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget well" id="wid-id-2" data-widget-colorbutton="false"
                         data-widget-editbutton="false" data-widget-custombutton="false">
                        <div class="widget-body">
                            <div class="widget-body-toolbar st">

                                <div class="row">
                                    <div class="col-sm-8" style="margin-top:-20px;"><h2>{{ trans('sentence.expense_reports_table') }}</h2>
                                    </div>

                                </div>
                            </div>
                            <div v-if="expenses_list.length != 0" id="invoice_table"  class="tab-pane fade in active">
                                <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="40%">{{ trans('word.name') }}</th>
                                        <th width="30%">{{ trans('word.description') }}</th>
                                        <th width="10%">{{ trans('word.account') }}</th>
                                        <th width="10%">{{ trans('word.date') }}</th>
                                        <th width="10%">{{ trans('word.amount') }}</th>
                                        <th width="10%">{{ trans('word.status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="item in expenses_list">
                                        <td width="25">
                                            <i class="fa fa-file-text-o fa-3x"></i>
                                        </td>
                                        <td>
                                            <b>@{{ item.name }}</b><br>
                                            <span v-html="item.tags_label"></span>
                                        </td>
                                        <td>
                                            @{{ item.description }}
                                        </td>
                                        <td>
                                            <span v-if="item.bank-item != null">@{{ item.bank_name }} </span>
                                        </td>
                                        <td>
                                            @{{ item.date }}
                                        </td>
                                        <td>
                                            @{{ item.amount }} <i class="fa fa-try"></i>
                                        </td>
                                        <td>
                                            <span class="label label-success" v-if="item.pay_status == 1">{{ trans('word.paid') }}</span>
                                            <span class="label label-danger" v-if="item.pay_status == 0">{{ trans('sentence.not_paid') }}</span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div v-if="expenses_list.length == 0" >

                                {{ trans('sentence.there_is_no_expense_receipt_in_the_system') }}

                            </div>
                        </div>
                    </div>
                </article>
            </div>

            {{----}}
        </section>
    </div>

    @push("scripts")
        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="{{asset("/js/plugin/moment/moment.min.js")}}"></script>
        <script src="{{asset("/js/plugin/chartjs/chart.min.js")}}"></script>
        <script src="{{asset("/js/plugin/daterangepicker/daterangepicker.js")}}"></script>
        <link rel="stylesheet" href="{{asset("/js/plugin/daterangepicker/daterangepicker.css")}}">

        <script type="text/javascript">


            $(document).ready(function () {
                sales_report = new Vue({
                    el: "#sales_report",
                    data: {

                        start: "{{ \Carbon\Carbon::now()->subDays(30)->format('Y-m-d') }}",
                        end: "{{ \Carbon\Carbon::now()->format('Y-m-d') }}",
                        expenses_list: [
                            {
                                bank_item:""
                            }
                        ],
                        expenses_pie: [],
                    },
                    mounted() {

                        this.pies_data(this.start, this.end);

                    },
                    methods: {
                        updateData: function () {
                            this.pies_data(this.start, this.end);

                        },
                        formatPrice($value) {
                            return $value.toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        },
                        pies_data: function (start, end) {
                            axios.post("{{route("finance.expenses_pies.data",aid())}}", {
                                start: start,
                                end: end
                            }).then(res => {
                                sales_report.expenses_list = [];
                                sales_report.expenses_pie = [];

                                sales_report.expenses_list = res.data["expenses_list"];


                                let expenses_pie = {
                                    type: 'pie',
                                    data: {
                                        datasets: [{
                                            data: [],
                                            backgroundColor: [],
                                        }],
                                        labels: []
                                    },
                                    options: {
                                        responsive: true,
                                        legend: {
                                            display: false
                                        },
                                    },
                                };


                                expenses = new Chart(document.getElementById("customersChart"), expenses_pie);


                                jQuery.each(res.data["expenses"]["labels"], function (index, value) {
                                    $labels = res.data["expenses"]["labels"][index];
                                    $data = res.data["expenses"]["data"][index];
                                    $bgcolor = res.data["expenses"]["bgcolor"][index];

                                    sales_report.addData(expenses, $labels, $data, $bgcolor);

                                    sales_report.expenses_pie.push({
                                        labels: $labels,
                                        data: $data,
                                        bgcolor: $bgcolor
                                    })
                                });


                            });


                            @php
                                $start = new \Carbon\Carbon('first day of last month');
                                $end = new \Carbon\Carbon('last day of last month');
                            @endphp

                            $('#demo').daterangepicker({
                                "locale": {
                                    "format": "DD-MM-YYYY",
                                    "separator": " / ",
                                    "applyLabel": "{{ trans('word.apply') }}",
                                    "cancelLabel": "{{ trans('word.cancel') }}",
                                    "fromLabel": "From",
                                    "toLabel": "To",
                                    "customRangeLabel": "{{ trans('time.special_date') }}",
                                    "daysOfWeek": [
                                        "{{ trans('time.mo') }}",
                                        "{{ trans('time.tu') }}",
                                        "{{ trans('time.we') }}",
                                        "{{ trans('time.th') }}",
                                        "{{ trans('time.fr') }}",
                                        "{{ trans('time.sa') }}",
                                        "{{ trans('time.su') }}"
                                    ],
                                    "monthNames": [
                                        "{{ trans('month.january') }}",
                                        "{{ trans('month.february') }}",
                                        "{{ trans('month.march') }}",
                                        "{{ trans('month.april') }}",
                                        "{{ trans('month.may') }}",
                                        "{{ trans('month.june') }}",
                                        "{{ trans('month.july') }}",
                                        "{{ trans('month.august') }}",
                                        "{{ trans('month.september') }}",
                                        "{{ trans('month.october') }}",
                                        "{{ trans('month.november') }}",
                                        "{{ trans('month.december') }}"
                                    ],
                                    "firstDay": 1
                                },
                                "ranges": {
                                    "{{ trans('time.today') }}": [
                                        "{{ \Carbon\Carbon::now()->format('d-m-Y') }}",
                                        "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                                    ],
                                    "{{ trans('time.yesterday') }}": [
                                        "{{ \Carbon\Carbon::yesterday()->format('d-m-Y') }}",
                                        "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                                    ],
                                    "{{ trans('time.last_7_days') }}": [
                                        "{{ \Carbon\Carbon::now()->subDays(7)->format('d-m-Y') }}",
                                        "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                                    ],
                                    "{{ trans('time.last_30_days') }}": [
                                        "{{ \Carbon\Carbon::now()->subDays(30)->format('d-m-Y') }}",
                                        "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                                    ],
                                    "{{ trans('time.this_month') }}": [
                                        "{{ \Carbon\Carbon::now()->startOfMonth()->format('d-m-Y') }}",
                                        "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                                    ],
                                    "{{ trans('time.last_month') }}": [
                                        "{{ $start->format('d-m-Y') }}",
                                        "{{ $end->format('d-m-Y') }}"
                                    ]
                                },
                                "alwaysShowCalendars": true,
                                "startDate": "{{ \Carbon\Carbon::now()->subDay(1)->format('d-m-Y') }}",
                                "endDate": "{{ \Carbon\Carbon::now()->format('d-m-Y') }}",
                            }, function (start, end, label) {
                                start = start.format('YYYY-MM-DD');
                                end = end.format('YYYY-MM-DD');
                                sales_report.end = end;
                                sales_report.start = start;

                                sales_report.pies_data(start, end);

                            });
                        },
                        addData: function (chart, label, data, bgcolor) {
                            chart.clear()
                            chart.data.labels.push(label);
                            chart.data.datasets.forEach((dataset) => {
                                dataset.data.push(parseFloat(data));
                                dataset.backgroundColor.push(bgcolor);
                            });

                            chart.update();
                        }

                    }
                });


            });


        </script>
    @endpush

@endsection
