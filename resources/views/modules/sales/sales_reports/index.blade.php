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

        <section id="widget-grid">
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
                                        <select class="form-control">
                                            <option>VERGİLER DAHİL</option>
                                            <option>VERGILER HARİÇ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>FATURA KATEGORİLERİ</b></div>
                                        <canvas id="pieChart" height="160"></canvas>
                                        <div class="col-md-12">
                                            <label class="pull-left label label-default">Kategorisiz</label>
                                            <label class="pull-right"><b>0</b>₺</label>
                                        </div>
                                        @foreach($tags as $tag)
                                            @if($tag->sales_orders_amount != "0,00")
                                                <div class="col-md-12">
                                                    <label class="pull-left label" style="background-color: {{ $tag->bg_color }}">
                                                        {{ $tag->title }}
                                                    </label>
                                                    <label class="pull-right"><b>{{ $tag->sales_orders_amount }}</b> <i class="fa fa-try"></i></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>MÜŞTERİ KATEGORİLERİ</b></div>
                                        <canvas id="pieChart2" height="160"></canvas>
                                        <div class="col-md-12">
                                            <label class="pull-left label label-default">Kategorisiz</label>
                                            <label class="pull-right"><b>0</b>₺</label>
                                        </div>
                                        @foreach($company_tags as $company_tag)
                                            @if($company_tag->companies_amount != "0,00")
                                                <div class="col-md-12">
                                                    <label class="pull-left label" style="background-color: {{ $company_tag->bg_color }}">
                                                        {{ $company_tag->title }}
                                                    </label>
                                                    <label class="pull-right"><b>{{ $company_tag->companies_amount }}</b> <i class="fa fa-try"></i></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>HİZMET/ÜRÜN KATEGORİLERİ</b></div>
                                        <canvas id="pieChart3" height="160"></canvas>

                                        <div class="col-md-12">
                                            <label class="pull-left label label-default">Kategorisiz</label>
                                            <label class="pull-right"><b>{{ get_money($product_dont_category)}}</b>₺</label>
                                        </div>

                                        @foreach($kategoriler as $kategori)
                                            @if($kategori->totalOrder != "0,00")
                                                <div class="col-md-12">
                                                    <label class="pull-left label" style="background-color: {{ $kategori->color }}">
                                                        {{ $kategori->name }}
                                                    </label>
                                                    <label class="pull-right"><b>{{$kategori->totalOrder}}</b>₺</label>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
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
                                <i class="fa fa-cube fa-2x"></i>
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

                pageSetUp();

                var randomScalingFactor = function () {
                    return Math.round(Math.random() * 100);
                    //return 0;
                };
                var randomColorFactor = function () {
                    return Math.round(Math.random() * 255);
                };
                var randomColor = function (opacity) {
                    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
                };

                        @php
                            $labels_tag = "";
                            $data_tag   = "";
                            $backgroundColor_tag = "";
                            foreach($tags as $tag)
                            {
                                $labels_tag   .= "\"$tag->title\", ";
                                $data_tag     .= "$tag->sales_orders_amount,";
                                $backgroundColor_tag   .= "\"$tag->bg_color\", ";
                            }
                        @endphp

                var PieConfig = {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [ {!! $data_tag !!} ],
                                backgroundColor: [ {!! $backgroundColor_tag !!} ],
                            }],
                            labels: [ {!! $labels_tag !!} ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                        },
                    };

                        @php
                            $labels_company_tag = "";
                            $data_company_tag  = "";
                            $backgroundColor_company_tag = "";
                            foreach($company_tags as $company_tag)
                            {
                                $labels_company_tag   .= "\"$company_tag->title\", ";
                                $data_company_tag     .= "$company_tag->companies_amount,";
                                $backgroundColor_company_tag   .= "\"$company_tag->bg_color\", ";
                            }
                        @endphp

                var PieConfig2 = {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [ {!! $data_company_tag !!} ],
                                backgroundColor: [ {!! $backgroundColor_company_tag !!} ],
                            }],
                            labels: [ {!! $labels_company_tag !!} ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            }
                        }
                    };

                        @php
                            $labels_category = "";
                            $data_category   = "";
                            $backgroundColor_category = "";
                            foreach($kategoriler as $category)
                            {
                                $labels_category            .= "\"$category->name\", ";
                                $data_category              .= "$category->totalOrder,";
                                $backgroundColor_category   .= "\"$category->color\", ";
                            }
                        @endphp

                var PieConfig3 = {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [ {!! $data_category !!} ],
                                backgroundColor: [{!! $backgroundColor_category !!}]
                            }],
                            labels: [{!! $labels_category !!}]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            }
                        }
                    };

                // Use Morris.Bar
                if ($('#normal-bar-graph').length) {

                    Morris.Bar({
                        element: 'normal-bar-graph',
                        data: [{
                            x: '2011',
                            y: 10
                        }, {
                            x: '2012',
                            y: 30
                        }, {
                            x: '2013',
                            y: 40
                        }, {
                            x: '2014',
                            y: 20
                        }],
                        xkey: 'x',
                        ykeys: ['y'],
                        labels: ['Y']
                    });

                }


                window.onload = function () {
                    window.myPie = new Chart(document.getElementById("pieChart"), PieConfig);
                    window.myPie2 = new Chart(document.getElementById("pieChart2"), PieConfig2);
                    window.myPie3 = new Chart(document.getElementById("pieChart3"), PieConfig3);
                };

                @php
                    $start = new \Carbon\Carbon('first day of last month');
                    $end = new \Carbon\Carbon('last day of last month');
                @endphp

                $('#demo').daterangepicker({
                    "locale": {
                        "format": "DD-MM-YYYY",
                        "separator": " / ",
                        "applyLabel": "Uygula",
                        "cancelLabel": "İptal",
                        "fromLabel": "From",
                        "toLabel": "To",
                        "customRangeLabel": "Özel Tarih",
                        "daysOfWeek": [
                            "Pt",
                            "Sa",
                            "Ça",
                            "Pe",
                            "Cu",
                            "Ct",
                            "Pa"
                        ],
                        "monthNames": [
                            "Ocak",
                            "Şubat",
                            "Mart",
                            "Nisan",
                            "Mayıs",
                            "Haziran",
                            "Temmuz",
                            "Ağustos",
                            "Eylül",
                            "Ekim",
                            "Kasım",
                            "Aralık"
                        ],
                        "firstDay": 1
                    },
                    "ranges": {
                        "Bugün": [
                            "{{ \Carbon\Carbon::now()->format('d-m-Y') }}",
                            "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                        ],
                        "Dün": [
                            "{{ \Carbon\Carbon::yesterday()->format('d-m-Y') }}",
                            "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                        ],
                        "Son 7 Gün": [
                            "{{ \Carbon\Carbon::now()->subDays(7)->format('d-m-Y') }}",
                            "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                        ],
                        "Son 30 Gün": [
                            "{{ \Carbon\Carbon::now()->subDays(30)->format('d-m-Y') }}",
                            "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                        ],
                        "Bu Ay": [
                            "{{ \Carbon\Carbon::now()->startOfMonth()->format('d-m-Y') }}",
                            "{{ \Carbon\Carbon::now()->format('d-m-Y') }}"
                        ],
                        "Geçen Ay": [
                            "{{ $start->format('d-m-Y') }}",
                            "{{ $end->format('d-m-Y') }}"
                        ]
                    },
                    "alwaysShowCalendars": true,
                    "startDate": "{{ \Carbon\Carbon::now()->subDay(1)->format('d-m-Y') }}",
                    "endDate": "{{ \Carbon\Carbon::now()->format('d-m-Y') }}",
                }, function(start, end, label) {
                    start = start.format('DD-MM-YYYY');
                    end = end.format('DD-MM-YYYY');
                    $.ajax({
                        method: "POST",
                        {{--url: "{{ route('sales-report.grafik') }}",--}}
                        data: {start: start,end:end},
                        dataType:"JSON",
                        success: function (data) {
                            PieConfig.data.datasets.forEach(function (dataset) {
                                dataset.data = dataset.data.map(function () {
                                    return data.oran;
                                });
                            });
                            $("#fatura_kategori b").html(moneyDecimal(data.total));
                            window.myPie.update();
                        }

                    });
                });

            });


        </script>
    @endpush

@endsection
