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


                                <span class="btn btn-success  dropdown-toggle" data-toggle="dropdown"
                                      aria-expanded="false">{{trans("general.new")}} {{trans("general.action")}}
            <i class="fa fa-angle-down"></i></span>
                                <!-- Suggestion: populate this list with fetch and push technique -->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route("stock.movements.form",[aid(),0,"new","in"])}}">IN STOCK </a>
                                    </li>
                                    <li>
                                        <a href="{{route("stock.movements.form",[aid(),0,"new","out"])}}">OUT STOCK </a>
                                    </li>
                                </ul>

                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>{{trans("general.description")}}</th>
                                    <th>{{trans("general.type")}}</th>
                                    <th>{{trans("general.edition")}} {{trans("general.date")}}</th>
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
                ajax: '{!! route('stock.movements.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'status',
                        render: function (status) {
                            if (status == 0) {
                                return '<i class="fa fa-truck fa-2x fa-flip-horizontal fa-2x"></i>';
                            } else {
                                return '<i class="fa fa-truck fa-2x "></i>';
                            }

                        },
                    }, {
                        data: "description",
                        render: function (description,d,s) {
                            if (description == null) {
                             return   (s.status) === 0 ? "Stock Out":"Stock In";
                            } else {
                                return description;
                            }
                        }
                    }, {
                        data: "receipt_id",
                        name:"receipt_id"

                    }, {
                        data: "date",
                        name:"date"
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