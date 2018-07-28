@extends('layouts.master')
@section("title","SATIŞ RAPORLARI")
@section('content')
    @php $oran = 0; @endphp
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

        <section id="sales_report" v-cloak>
            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget well" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                        <div class="widget-body">
                            <div class="widget-body-toolbar st">
                                <div class="row">
                                    <div class="col-sm-4" style="margin-top:-20px;"><h2>Sales Invoices</h2></div>

                                    <div class="col-sm-4 text-right">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="demo" type="text" placeholder='6 TEMMUZ 2017 - 6 EKIM 2017' />
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <select v-model='vat' @change="updateData()" class="form-control">
                                            <option value="1">VERGİLER DAHİL</option>
                                            <option value="0">VERGİLER HARİÇ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>FATURA KATEGORİLERİ</b></div>
                                        <canvas id="ordersChart" height="160"></canvas>

                                        <div v-for='(item,index) in order_pie' :key="index" class="col-md-12">
                                            <label class="pull-left label"
                                                   v-bind:style="{'background-color':item.bgcolor}">
                                                @{{ item.labels}}
                                                    </label>
                                            <label class="pull-right"><b>@{{item.data}}</b> <i
                                                        class="fa fa-try"></i></label>
                                                </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>MÜŞTERİ KATEGORİLERİ</b></div>
                                        <canvas id="customersChart" height="160"></canvas>

                                        <div v-for="(item,index) in customer_pie" class="col-md-12">
                                            <label class="pull-left label"
                                                   v-bind:style="{'background-color':item.bgcolor}">
                                                @{{ item.labels }}
                                                    </label>
                                            <label class="pull-right"><b>@{{ item.data }}</b> <i class="fa fa-try"></i></label>
                                                </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>HİZMET/ÜRÜN KATEGORİLERİ</b></div>
                                        <canvas id="productChart" height="160"></canvas>
                                                <div v-for="(item,index) in product_pie" class="col-md-12">
                                                    <label class="pull-left label"
                                                           v-bind:style="{'background-color':item.bgcolor}">
                                                        @{{ item.labels }}
                                                    </label>
                                                    <label class="pull-right"><b>@{{ item.data }}</b> <i class="fa fa-try"></i></label>
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
                <div class="col-sm-8" style="margin-top:-20px;"><h2>Satış Rapoları Tablosu</h2></div>
                    <div class="col-sm-4">
                        <div class="btn-group btn-group-justified nav nav-tabs">
                            <button style="width:100px!important;" data-toggle="tab" href="#invoice_table" class="btn btn-default">FATURA</button>
                            <button style="width:100px!important;" data-toggle="tab" href="#customer_table" class="btn btn-default">MÜŞTERİ</button>
                            <button style="width:100px!important;" data-toggle="tab" href="#product_table" class="btn btn-default">ÜRÜN</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
            <div class="col-sm-12 tab-content">
                <div id="invoice_table" class="tab-pane fade in active">
                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="33%">AÇIKLAMA</th>
                            <th width="33%">DÜZENLENME TARİHİ</th>
                            <th width="33%">BAKİYE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales_orders as $sale)
                        <tr>
                            <td width="25">
                                <i class="fa fa-file-text-o fa-3x"></i>
                            </td>
                            <td>
                                <b>{{ $sale->company->company_name}}</b> <br>
                                {{ ($sale->description == "") ? "FATURA" : $sale->description }}
                            </td>
                            <td>{{ $sale->date }}</td>
                            <td>
                                {!! $sale->collect_label !!} <br>
                                <b>{{ $sale->grand_total }}</b> <i class="fa fa-{{ $sale->currency }}"></i>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="customer_table" class="tab-pane fade">
                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="50%">ŞİRKET ADI</th>
                            <th width="45%">BAKİYE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $com)
                        @if($com->balance != "0,00")
                        <tr>
                            <td width="25">
                                <i class="fa fa-building-o fa-3x"></i>
                            </td>
                            <td>{{ $com->company_name }}</td>
                            <td>
                                <b>{{ $com->balance }}</b>
                                <i class="fa fa-{{ $sale->currency }}"></i>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="product_table" class="tab-pane fade">
                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th width="25">#</th>
                            <th width="33%">ÜRÜN</th>
                            <th width="33%">ADET</th>
                            <th width="33%">TUTAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $pr)
                        @if($pr->order_items()->sum("price") != 0)
                        <tr>
                            <td>
                                <i class="fa fa-cube fa-3x"></i>
                            </td>
                            <td>{{ $pr->name }}</td>
                            <td>{{ $pr->order_items()->sum("quantity") }} {{ $pr->unit["short_name"] }}</td>
                            <td>
                                <b>{{ get_money($pr->order_items()->sum("price")*$pr->order_items()->sum("quantity")) }}</b>
                                <i class="fa fa-{{ $sale->currency }}"></i>
                            </td>
                        </tr>
                        @endif
                        @endforeach
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
        <script src="/js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="/js/plugin/moment/moment.min.js"></script>
        <script src="/js/plugin/chartjs/chart.min.js"></script>
        <script src="/js/plugin/morris/raphael.min.js"></script>
        <script src="/js/plugin/morris/morris.min.js"></script>
        <script src="/js/plugin/daterangepicker/daterangepicker.js"></script>
        <link rel="stylesheet" href="/js/plugin/daterangepicker/daterangepicker.css">

        <script type="text/javascript">


            $(document).ready(function () {
                sales_report = new Vue({
                    el: "#sales_report",
                    data: {
                        order_pie: [],
                        customer_pie: [],
                        product_pie: [],
                        vat:"1"
                    },
                    mounted() {

                        this.pies_data();

                    },
                    methods: {
                        updateData:function(){
                          this.pies_data();

                        },
                        pies_data: function () {
                            axios.post("{{route("sales.pies.data",aid())}}",{vat:this.vat}).then(res => {
                                sales_report.order_pie = [];
                                sales_report.customer_pie = [];
                                sales_report.product_pie = [];

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


                            })
                        },
                        addData: function (chart, label, data, bgcolor) {

                            chart.data.labels.push(label);
                            chart.data.datasets.forEach((dataset) => {
                                dataset.data.push(data);
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
