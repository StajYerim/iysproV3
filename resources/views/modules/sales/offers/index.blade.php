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

                                <a href="{{route("sales.offers.form",[aid(),0,"new"])}}">
                                <span class="btn btn-success">{{ trans("sentence.new_offer") }}</span>
                                </a>
                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>{{ trans("row.customer") }}</th>
                                    <th>{{ trans("row.date") }}</th>
                                    <th>{{ trans("row.total") }}</th>
                                    <th>{{ trans("row.status") }}</th>
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
                ajax: '{!! route('sales.offers.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function (id) {
                            return '<i class="fa fa-file-text-o fa-3x"></i>';
                        },
                    }, {
                        data: "company.company_name",
                    }, {
                        data: "date"

                    }, {
                        data: "grand_total"
                    }, {
                        data: "status"
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
                return window.location.href = '/{{aid()}}/sales/offers/' + id + '/show';
            }

        </script>
    @endpush
@endsection