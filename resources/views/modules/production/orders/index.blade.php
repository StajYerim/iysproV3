@extends('layouts.master')

@section('content')

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body no-padding">
                            <div id="search-mobile" class="btn-header transparent pull-right">
                                <span> <a href="javascript:void(0)" title="{{trans("word.search")}}"><i
                                                class="fa fa-search"></i></a> </span>
                            </div>

                            <div class="header-search pull-left" style="margin: 0px 0px 5px 7px;min-width: 360px;">
                                <input id="search-fld" type="text">
                                <button type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0);" id="cancel-search-js" title="{{trans("sentence.cancel_search")}}"><i
                                            class="fa fa-times"></i></a>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <div class="pull-right new-button">

                                <button id="print_list" class="btn btn-success">
                                    <span >
                                        {{trans("word.print")}}
                                    </span>
                                </button>
                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>{{trans("word.customer")}}</th>
                                    <th>{{trans("word.date")}}</th>
                                    <th width="50px">{{trans("word.status")}}</th>
                                </tr>
                                </thead>

                            </table>

                        </div>
                    </div>
                </div>
            </article>
        </div>

        {{--Liste Yazdır--}}
        <div class="modal fade" id="printListModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">ÜRETİM LİSTESİ YAZDIR</h4>
                    </div>
                    <form id="list_option_form" target="_blank" method="post" action="{{route("production.print_list",aid())}}">
                   @csrf
                    <div class="modal-body modal-body-content">

                        <div class="form-group">

                            <label class="col-md-2 control-label">Filtre</label>
                            <div class="col-md-10">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="list_option[]" checked value="0" class="checkbox style-0">
                                    <span>BEKLEYENLER</span>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="list_option[]" checked value="1" class="checkbox style-0">
                                    <span>ÜRETİMDEKİLER</span>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="list_option[]" checked value="2" class="checkbox style-0">
                                    <span>TAMAMLANANLAR</span>
                                </label>
                            </div>

                        </div>

                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Vazgeç
                        </button>
                        <button type="submit" class="btn btn-primary" id="on_print">
                            Yazdır
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Liste Yazdır--}}




    </section>
    @push('scripts')
        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        <script type="text/javascript">


            $("#print_list").on("click",function(){
                $("#printListModal").modal();
            });

            $("#on_print").on("click",function(){
                $("#printListModal").modal("hide");

            });

            var responsiveHelper_dt_basic = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };
            tables = $('#table').DataTable({
                "sDom": "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sUrl": "{{route("general.datatable.lang",aid())}}",
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
//                stateSave: true,
                responsive: true,
//                stateDuration: 45,
                processing: true,
                serverSide: true,
                ajax: '{!! route('production.orders.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function (id) {
                            return '<i class="fa fa-file-text-o fa-3x"></i>';
                        },
                    }, {
                        name:"company_area",
                        data:"company_area"
                    }, {
                        name:"date",
                        data: "date"

                    },  {
                        data: "sub_total"
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
                return window.location.href = '/{{aid()}}/sales/orders/' + id + '/show';
            }

        </script>
    @endpush
@endsection