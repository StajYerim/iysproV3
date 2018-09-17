@extends('layouts.master')
@section("title","SATIŞ RAPORLARI")
@section('content')
    <!-- MAIN CONTENT -->
    <div id="content">
        <section id="sales_report" v-cloak>
            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget well" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                        <div class="widget-body">
                            <div class="widget-body-toolbar st">
                                <div class="row">
                                    <div class="col-sm-4" style="margin-top:-20px;"><h2>{{trans("sentence.sales_reports")}}</h2></div>

                                    <div class="col-sm-4 text-right">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="demo" type="text" placeholder='{{ trans("sentence.day_month_year_format") }} - {{ trans("sentence.day_month_year_format") }}' />
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <select v-model='vat' @change="updateData()" class="form-control">
                                            <option value="1">{{ trans('sentence.including_vat') }}</option>
                                            <option value="0">{{ trans('sentence.excluding_vat') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>FATURA KATEGORİLERİ</b></div>

                                        <canvas v-show="order_pie.length > 0"  id="ordersChart" height="160"></canvas>
                                        <div v-html='loading'></div>
                                        <div v-show="order_pie.length > 0" v-for='(item,index) in order_pie' :key="index" class="col-md-12">
                                            <label class="pull-left label"
                                                   v-bind:style="{'background-color':item.bgcolor}">
                                                @{{ item.labels}}
                                                    </label>
                                            <label class="pull-right"><b>@{{formatPrice(item.data)}}</b> <i
                                                        class="fa fa-try"></i></label>
                                                </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center" ><b>MÜŞTERİ KATEGORİLERİ</b></div>

                                        <canvas v-show="order_pie.length >0" id="customersChart" height="160"></canvas>
                                        <div v-html='loading'></div>
                                        <div v-show="order_pie.length >0" v-for="(item) in customer_pie" class="col-md-12">
                                            <label class="pull-left label"
                                                   v-bind:style="{'background-color':item.bgcolor}">
                                                @{{ item.labels }}
                                                    </label>
                                            <label class="pull-right"><b>@{{formatPrice(item.data)}}</b> <i class="fa fa-try"></i></label>
                                                </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>HİZMET/ÜRÜN KATEGORİLERİ</b></div>
                                        <canvas v-show="order_pie.length >0" id="productChart" height="160"></canvas>
                                        <div v-html='loading'></div>
                                                <div v-show="order_pie.length >0" v-for="(item,index) in product_pie" class="col-md-12">
                                                    <label class="pull-left label"
                                                           v-bind:style="{'background-color':item.bgcolor}">
                                                        @{{ item.labels }}
                                                    </label>
                                                    <label class="pull-right"><b>@{{formatPrice(item.data)}}</b> <i class="fa fa-try"></i></label>
                                                </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="row">
            <article class="col-sm-12">
            <div class="jarviswidget well" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
            <div class="widget-body">
            <div class="widget-body-toolbar st">
                <div class="row">
                <div class="col-sm-8" style="margin-top:-20px;"><h2>SATIŞ RAPORLARI TABLOSU</h2></div>
                    <div class="col-sm-4">
                        <div class="btn-group btn-group-justified nav nav-tabs">
                            <button style="width:100px!important;" data-toggle="tab" href="#invoice_table" class="btn btn-default">{{ trans('word.invoice') }}</button>
                            <button style="width:100px!important;" data-toggle="tab" href="#customer_table" class="btn btn-default">{{ trans('word.customer') }}</button>
                            <button style="width:100px!important;" data-toggle="tab" href="#product_table" class="btn btn-default">{{ trans('word.product') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-sm-12 tab-content">
                <div id="invoice_table" class="tab-pane fade in active">
                    <div v-html='loading'>Kayıt bulunamadı</div>
                    <table v-show="order_pie.length >0" id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="33%">{{ trans('word.description') }}</th>
                            <th width="33%">{{ trans('sentence.edit_date') }}</th>
                            <th width="33%">{{ trans('word.balance') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="order in order_list">
                            <td width="25">
                                <i class="fa fa-file-text-o fa-3x"></i>
                            </td>
                            <td>
                                <b>@{{order.company.company_name}}</b> <br>
                                 <span v-if="order.description != null"> @{{ order.description }}</span>
                                 <span v-if="order.description == null"> {{ trans('word.invoice') }}</span>
                            </td>
                            <td>
                                @{{ order.date }}
                            </td>
                            <td>
                              <span v-html="order.collect_label"></span> <br>
                                <b>@{{ order.grand_total }}</b> <i class="fa fa-try"></i>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div id="customer_table" class="tab-pane fade">
                    <div v-html='loading'>Kayıt bulunamadı</div>
                    <table v-show="order_pie.length > 0" id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="50%">{{ trans('sentence.company_name') }}</th>
                            <th width="45%">{{ trans('word.balance') }}</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr v-for="customer in customer_list">
                            <td width="25">
                                <i class="fa fa-building-o fa-3x"></i>
                            </td>
                            <td>@{{ customer[0]["company"]["company_name"] }}</td>
                            <td>
                                <b>@{{ customer[0]["company"]["balance"]  }}</b>
                                <i class="fa fa-try"></i>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div id="product_table" class="tab-pane fade">

                    <div v-html='loading'>Kayıt bulunamadı</div>
                    <table v-show="order_pie.length > 0" id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th width="25">#</th>
                            <th width="33%">{{ trans('word.product') }}</th>
                            <th width="33%">{{ trans('word.quantity') }}</th>
                            <th width="33%">{{ trans('word.amount') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="product in product_list">
                            <td>
                                <i class="fa fa-cube fa-3x"></i>
                            </td>
                            <td>@{{ product.named.name }}</td>
                            <td>@{{ product.total_quantity }} @{{ product.unit.short_name }}</td>
                            <td>
                                <b>@{{ product.total_amount }}</b>
                                <i class="fa fa-try"></i>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
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
                        order_pie: [],
                        customer_pie: [],
                        product_pie: [],
                        order_list:[],
                        customer_list:[],
                        product_list:[],
                        vat:"1",
                        start:"{{ \Carbon\Carbon::now()->subDays(30)->format('Y-m-d') }}",
                        end: "{{ \Carbon\Carbon::now()->format('Y-m-d') }}",
                        loading: '<br><br><center><i class="fa fa-refresh fa-spin" style="font-size:32px"></i></center><br><br>'
                    },
                    mounted() {

                        this.pies_data(this.start,this.end);

                    },
                    methods: {
                        updateData:function(){
                          this.pies_data(this.start,this.end);

                        },
                        formatPrice($value){
                          return $value.toLocaleString('tr-TR', {
                              minimumFractionDigits: 2,
                              maximumFractionDigits: 2
                          });
                        },
                        pies_data: function (start,end) {
//                            this.loading = '<i class="fa fa-refresh fa-spin" style="font-size:24px"></i>';
                            axios.post("{{route("sales.pies.data",aid())}}",{vat:this.vat,start:start,end:end}).then(res => {
                                sales_report.order_pie = [];
                                sales_report.customer_pie = [];
                                sales_report.product_pie = [];
                                sales_report.customer_list = [];

                                sales_report.customer_list = res.data["customer_order_list"];
                                sales_report.order_list = res.data["sales_order_list"];
                                sales_report.product_list = res.data["product_list"];

                                let order_pie = {
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

                                let customers_pie = {
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

                                let product_pie = {
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


                                orders = new Chart(document.getElementById("ordersChart"), order_pie);
                                customers = new Chart(document.getElementById("customersChart"), customers_pie);
                                products = new Chart(document.getElementById("productChart"), product_pie);


                                    jQuery.each(res.data["orders"]["labels"], function (index, value) {

                                        $labels = res.data["orders"]["labels"][index];
                                        $data = res.data["orders"]["data"][index];
                                        $bgcolor = res.data["orders"]["bgcolor"][index];

                                        sales_report.addData(orders, $labels, $data, $bgcolor);

                                        sales_report.order_pie.push({
                                            labels: $labels,
                                            data: $data,
                                            bgcolor: $bgcolor
                                        })
                                    });

                                jQuery.each(res.data["customers"]["labels"], function (index, value) {
                                    $labels = res.data["customers"]["labels"][index];
                                    $data = res.data["customers"]["data"][index];
                                    $bgcolor = res.data["customers"]["bgcolor"][index];

                                    sales_report.addData(customers, $labels, $data, $bgcolor);

                                    sales_report.customer_pie.push({
                                        labels: $labels,
                                        data: $data,
                                        bgcolor: $bgcolor
                                    })
                                });

                                jQuery.each(res.data["products"]["labels"], function (index, value) {
                                    $labels = res.data["products"]["labels"][index];
                                    $data = res.data["products"]["data"][index];
                                    $bgcolor = res.data["products"]["bgcolor"][index];

                                    sales_report.addData(products, $labels, $data, $bgcolor);

                                    sales_report.product_pie.push({
                                        labels: $labels,
                                        data: $data,
                                        bgcolor: $bgcolor
                                    })


                                });
                                if(sales_report.order_pie.length >0 ){
                                    sales_report.loading = '';
                                }else{
                                    sales_report.loading = '<br><br><center>Kayıt Bulunamadı</center>';
                                }


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
                            }, function(start, end, label) {
                                start = start.format('YYYY-MM-DD');
                                end = end.format('YYYY-MM-DD');
                                sales_report.end = end;
                                sales_report.start = start;

                                sales_report.pies_data(start,end);

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
