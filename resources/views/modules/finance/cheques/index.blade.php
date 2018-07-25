@extends('layouts.master')

@section('content')
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body no-padding">
                            <div id="search-mobile" class="btn-header transparent pull-right">
                                <span>
                                    <a href="javascript:void(0)" title="{{ trans("word.search") }}">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </span>
                            </div>

                            <div class="header-search pull-left" style="margin: 0px 0px 5px 7px;min-width: 360px;">
                                <input id="search-fld" type="text">
                                <button type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0);" id="cancel-search-js" title="{{ trans("sentence.cancel_search") }}">
                                    <i class="fa fa-times"></i>
                                </a>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>{{trans("word.editor")}}/{{trans("word.location")}}</th>
                                    <th>{{trans("sentence.expiry_date")}}/{{trans("word.type")}}</th>
                                    <th>{{trans("word.sum")}}</th>
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
                ajax: '{!! route('finance.cheques.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function (type) {

                                return '<i class="fa fa-cubes fa-2x"></i>';


                        },
                    }, {
                        data: "company.company_name",
                        render:function(company_name){
                            return company_name+'<br><small class="note">Portföyde</small>';
                        }
                    }, {
                        data: "payment_date",
                        render:function(payment_date,s,d){
                            return payment_date;
                        }

                    }, {
                        data: "amount"
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
                return window.location.href = '/{{aid()}}/finance/cheques/' + id + '/show';
            }

        </script>
    @endpush
@endsection