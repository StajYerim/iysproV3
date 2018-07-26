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
                                        <div class="active-cart">
                                            {{--<div class="col-md-12">--}}
                                                {{--<label class="pull-left label label-success">Kategorisiz</label>--}}
                                                {{--<label class="pull-right" id="fatura_kategori"><b>500</b> <i class="fa fa-try"></i></label>--}}
                                            {{--</div>--}}

                                            <div class="col-md-12">
                                                <label class="pull-left label label-default">Kategorisiz</label>
                                                <label class="pull-right"><b>0</b>₺</label>
                                            </div>
                                                @foreach($tags as $tag)
                                                    <div class="col-md-12">
                                                        <label class="pull-left label" style="background-color: {{ $tag->bg_color }}">
                                                            {{ $tag->title }}
                                                        </label>
                                                        <label class="pull-right"><b>{{ $tag->sales_orders_amount }}</b> <i class="fa fa-try"></i></label>
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>MÜŞTERİ KATEGORİLERİ</b></div>
                                        <canvas id="pieChart2" height="160"></canvas>
                                        <label class="pull-left label label-default">Category</label>
                                        <label class="pull-right"><b>64.29</b>,21$</label>
                                        <br /><br /><br />
                                        <label class="pull-left label label-success">OSGB</label>
                                        <label class="pull-right"><b>64.29</b>,21$</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center"><b>HİZMET/ÜRÜN KATEGORİLERİ</b></div>
                                        <canvas id="pieChart3" height="160"></canvas>

                                        <div class="col-md-12">
                                            <label class="pull-left label label-default">Kategorisiz</label>
                                            <label class="pull-right"><b>0</b>₺</label>
                                        </div>

                                        @foreach($kategoriler as $kategori)
                                            <div class="col-md-12">
                                                <label class="pull-left label" style="background-color: {{ $kategori->color }}">
                                                    {{ $kategori->name }}
                                                </label>
                                                <label class="pull-right"><b>{{$kategori->totalOrder}}</b>₺</label>
                                            </div>
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
            {{--<div class="row">--}}
                {{--<article class="col-sm-12">--}}
                    {{--<div class="jarviswidget well" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">--}}
                        {{--<div class="widget-body">--}}
                            {{--<div class="widget-body-toolbar st">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-8" style="margin-top:-20px;"><h2>Table 1</h2></div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="btn-group btn-group-justified">--}}
                                            {{--<a href="javascript:void(0);" class="btn btn-default">Button1</a>--}}
                                            {{--<a href="javascript:void(0);" class="btn btn-default">Button2</a>--}}
                                            {{--<a href="javascript:void(0);" class="btn btn-default">Button3</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-12">--}}
                                    {{--<table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th width="33%">ID</th>--}}
                                            {{--<th width="33%">Name</th>--}}
                                            {{--<th width="33%">Phone</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>1</td>--}}
                                            {{--<td>Jennifer</td>--}}
                                            {{--<td>1-342-463-8341</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>91</td>--}}
                                            {{--<td>Neil</td>--}}
                                            {{--<td>1-550-664-4050</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>92</td>--}}
                                            {{--<td>Hunter</td>--}}
                                            {{--<td>1-637-483-4408</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>93</td>--}}
                                            {{--<td>Marcia</td>--}}
                                            {{--<td>1-512-896-6301</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>94</td>--}}
                                            {{--<td>Lavinia</td>--}}
                                            {{--<td>1-222-745-5312</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>95</td>--}}
                                            {{--<td>Cynthia</td>--}}
                                            {{--<td>1-392-134-2788</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>96</td>--}}
                                            {{--<td>Lee</td>--}}
                                            {{--<td>1-128-816-7274</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>97</td>--}}
                                            {{--<td>Linda</td>--}}
                                            {{--<td>1-546-735-8920</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>98</td>--}}
                                            {{--<td>Wayne</td>--}}
                                            {{--<td>1-744-647-6144</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>99</td>--}}
                                            {{--<td>Liberty</td>--}}
                                            {{--<td>1-841-489-1665</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>100</td>--}}
                                            {{--<td>Cathleen</td>--}}
                                            {{--<td>1-883-567-6065</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<article class="col-sm-12">--}}
                    {{--<div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">--}}
                        {{--<div class="widget-body">--}}
                            {{--<div class="widget-body-toolbar st">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-8" style="margin-top:-20px;"><h2>Table 1</h2></div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="btn-group btn-group-justified">--}}
                                            {{--<a href="javascript:void(0);" class="btn btn-default">Button1</a>--}}
                                            {{--<a href="javascript:void(0);" class="btn btn-default">Button2</a>--}}
                                            {{--<a href="javascript:void(0);" class="btn btn-default">Button3</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-12">--}}
                                    {{--<table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th width="33%">ID</th>--}}
                                            {{--<th width="33%">Name</th>--}}
                                            {{--<th width="33%">Phone</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>1</td>--}}
                                            {{--<td>Jennifer</td>--}}
                                            {{--<td>1-342-463-8341</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>91</td>--}}
                                            {{--<td>Neil</td>--}}
                                            {{--<td>1-550-664-4050</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>92</td>--}}
                                            {{--<td>Hunter</td>--}}
                                            {{--<td>1-637-483-4408</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>93</td>--}}
                                            {{--<td>Marcia</td>--}}
                                            {{--<td>1-512-896-6301</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>94</td>--}}
                                            {{--<td>Lavinia</td>--}}
                                            {{--<td>1-222-745-5312</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>95</td>--}}
                                            {{--<td>Cynthia</td>--}}
                                            {{--<td>1-392-134-2788</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>96</td>--}}
                                            {{--<td>Lee</td>--}}
                                            {{--<td>1-128-816-7274</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>97</td>--}}
                                            {{--<td>Linda</td>--}}
                                            {{--<td>1-546-735-8920</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>98</td>--}}
                                            {{--<td>Wayne</td>--}}
                                            {{--<td>1-744-647-6144</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>99</td>--}}
                                            {{--<td>Liberty</td>--}}
                                            {{--<td>1-841-489-1665</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>100</td>--}}
                                            {{--<td>Cathleen</td>--}}
                                            {{--<td>1-883-567-6065</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--</div>--}}
        </section>
        <!-- end widget grid -->
    </div>
    <!-- END MAIN CONTENT -->

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
                    $labels = "";
                    $data   = "";
                    $backgroundColor = "";
                    foreach($tags as $tag)
                    {
                        $labels   .= "\"$tag->title\", ";
                        $data     .= "$tag->sales_orders_amount,";
                        $backgroundColor   .= "\"$tag->bg_color\", ";
                    }
                @endphp

                var PieConfig = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [ {!! $data !!} ],
                            backgroundColor: [ {!! $backgroundColor !!} ],
                        }],
                        labels: [{!! $labels !!}]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        },
                    },
                };

                var PieConfig2 = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [
                                {{ $oran }},
                            ],
                            backgroundColor: [
                                "#949FB1",
                                "#46BFBD",
                                "#FDB45C",
                                "#F7464A",
                                "#4D5360",
                            ],
                        }],
                        labels: [
                            "Kategorisiz",
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                };

                @php
                    $labels = "";
                    $data   = "";
                    $backgroundColor = "";
                    foreach($kategoriler as $category)
                    {
                        $labels   .= "\"$category->name\", ";
                        $data     .= "$category->totalOrder,";
                        $backgroundColor   .= "\"$category->color\", ";
                    }
                @endphp

                var PieConfig3 = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [ {!! $data !!} ],
                            backgroundColor: [{!! $backgroundColor !!}]
                        }],
                        labels: [{!! $labels !!}]
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
