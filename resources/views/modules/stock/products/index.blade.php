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
                                    <a href="javascript:void(0)" title="{{trans("word.search")}}">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </span>
                            </div>

                            <div class="header-search pull-left" style="margin: 0px 0px 5px 7px;">
                                <input id="search-fld" type="text">
                                <button type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0);" id="cancel-search-js" title="{{trans("sentence.cancel_search")}}">
                                    <i class="fa fa-times"></i>
                                </a>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <a href="{{route("stock.product.form",[aid(),0,"new"])}}" style="margin-top: 8px;margin-right: 4px;float: right;" class="btn btn-success">
                                {{ trans("sentence.new_product") }}
                            </a>

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
                                    <th>
                                        {{trans("word.stock")}}/{{trans("word.orders")}}
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
                ajax: '{!! route('stock.index_list',aid()) !!}',
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
//                    {
//                        data: "buying_price"
//                    },
//                    {
//                        data: "list_price"
//                    }
                ]
            });

           table_search(tables)

            function product_update(id) {
                return window.location.href = '/{{aid()}}/stocks/product/' + id + '/show';
            }


        </script>
    @endpush
@endsection
