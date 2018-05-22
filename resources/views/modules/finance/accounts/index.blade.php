@extends('layouts.master')

@section('content')
    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <!-- search mobile button (this is hidden till mobile view port) -->
                            <div id="search-mobile" class="btn-header transparent pull-right">
                                <span> <a href="javascript:void(0)" title="Search"><i
                                                class="fa fa-search"></i></a> </span>
                            </div>

                            <div class="header-search pull-left" style="margin: 0px 0px 5px 7px;min-width: 360px;">
                                <input id="search-fld" type="text">
                                <button type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i
                                            class="fa fa-times"></i></a>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <div class="pull-right new-button">
                                <a href="{{route("finance.accounts.form",[aid(),0,1,"new"])}}"><span class="btn btn-success">KASA EKLE</span></a>
                                <a href="{{route("finance.accounts.form",[aid(),0,2,"new"])}}"><span class="btn btn-success">BANKA EKLE</span></a>
                                <a href="{{route("finance.accounts.form",[aid(),0,3,"new"])}}"> <span class="btn btn-success">KREDİ HESABI EKLE</span></a>
                                <!-- Suggestion: populate this list with fetch and push technique -->
                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>Account Name</th>
                                    <th>IBAN</th>
                                    <th>Currency</th>
                                    <th>Balance</th>
                                </tr>
                                </thead>

                            </table>

                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>
        </div>
    </section>
    <!-- end widget grid -->
    @push('scripts')
        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        {{--<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>--}}
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript">
            var responsiveHelper_dt_basic = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };
            tables = $('#table').DataTable({
                "sDom": "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                stateSave: true,
                responsive: true,
                stateDuration: 45,
                processing: true,
                serverSide: true,
                ajax: '{!! route('finance.accounts.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'type',
                        render: function (type) {
                            if (type == 1) {
                                return '<i class="fa fa-money fa-2x"></i>';
                            } else {
                                return '<i class="fa fa-bank fa-2x "></i>';
                            }

                        },
                    }, {
                        data: "name",
                    }, {
                        data: "bank_iban"

                    }, {
                        data: "currency"
                    },{
                        data: "currency",
                        render:function(){
                            return "0,00";
                        }
                    }
                ],
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback": function (oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

            table_search(tables)

            function product_update(id) {
                return window.location.href = '/{{aid()}}/stocks/movements/' + id + '/show';
            }

        </script>
    @endpush
@endsection