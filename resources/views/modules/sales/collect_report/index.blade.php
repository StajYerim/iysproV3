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
                                            <div class="text-center"><h6><b>ORT.VADE AŞIMI</b></h6></div>

                                            <div class="text-center" style="font-size:30px"><b>30 <small class="note">gün</small></b></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-12">
                                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="20%">TAHSİLAT TARİHİ</th>
                                            <th width="20%">FATURA/ÇEK TARİHİ</th>
                                            <th width="20%">MÜŞTERİ/TEDARİKÇİ</th>
                                            <th width="20%">FATURA/ÇEK</th>
                                            <th width="20%">GİRİŞ</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>Jennifer</td>
                                            <td>1-342-463-8341</td>
                                            <td>1-342-463-8341</td>
                                            <td>1-342-463-8341</td>
                                        </tr>


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
