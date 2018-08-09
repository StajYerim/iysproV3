@extends('layouts.master')

@section('content')

    <section id="widget-grid">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div class="well">
                        <b>STOK DEĞERİ</b>
                        <div style="margin:20px!important;" class="col-xs-12">
                            <div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">
                                <span class="text-info" style="font-size: 25px;">{{ $sales_price }} ₺</span> <br>
                                <b>TAHMİNİ SATIŞ DEĞERİ</b>
                            </div>
                            <div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">
                                <span class="text-danger" style="font-size: 25px;">{{ $purchase_price }} ₺</span> <br>
                                <b>TAHMİNİ ALIŞ DEĞERİ</b>
                            </div>
                            <div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">
                                <span class="text-success" style="font-size: 25px;">{{ get_money($potantial_price) }} ₺</span> <br>
                                <b>POTANSİYEL KAZANÇ</b>
                            </div>
                        </div>
                        <div>
                            <div class="text-center" style="margin-bottom:25px; font-size:12px;">
                            <i class="fa fa-info-circle"></i>
                            <b>
                                Tahmini Satış Değeri, Tahmini Alış Değeri ve Potansiyel Kazanç hesaplamalarına stokta olmayan ürünler dahil edilmez.
                        Hesaplamalar ürün sayfalarında belirtilen Alış Fiyatı ve Satış Fiyatı üzerinden yapılır.
                            </b>
                        </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body no-padding">

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>
                                        {{trans("word.code")}}
                                    </th>
                                    <th>
                                        {{trans("word.name")}}
                                    </th>
                                    <TH>
                                        {{trans('sentence.stock_quantity')}}
                                    </TH>
                                    <th>
                                        {{trans('sentence.purchase_price')}}
                                    </th>
                                    <th>
                                        {{trans('sentence.sales_price')}}
                                    </th>
                                </tr>
                                </thead>

                            </table>

                        </div>

                    </div>

                </div>

            </article>
        </div>


    </section>
    @push('scripts')
        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        <script type="text/javascript">
            tables = $('#table').DataTable({
                "sDom": "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                "autoWidth": true,
                stateSave: true,
                responsive: true,
                stateDuration: 45,
                processing: true,
                serverSide: true,
                ajax: '{!! route('stock.report.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function ($name) {
                            return '<i class="fa fa-cube fa-2x"></i>';
                        },
                    }, {
                        data: "code",
                    }, {
                        data: "named.name",
                        name: "named.name"

                    }, {
                        data: "inventory_tracking",
                        name:"inventory_tracking"
                    },
                   {
                       data: "buying_price"
                   },
                   {
                       data: "list_price"
                   }
                ]
            });

            table_search(tables)

        </script>
    @endpush
@endsection
