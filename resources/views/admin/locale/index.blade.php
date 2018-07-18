@extends('layouts.master')

@section('content')
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0"
             data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle">
                <div class="col-md-6">
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2> Lang Description List</h2>
                    <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success text-right row_modal" data-id="0">Ekle</button>
                </div>
            </header>

            <!-- widget div-->
            <div role="content">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
                <!-- widget content -->
                <div class="widget-body no-padding">

                    <div class="table-responsive">
                        @if(count($language_lines) != 0)
                            <table id="table" class="table">
                                <thead>
                                <tr>
                                    {{--<th>ID</th>--}}
                                    <th>Group</th>
                                    <th>Key</th>
                                    @foreach($langs as $l)
                                        <th>{{$l->name}}</th>
                                    @endforeach
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($language_lines as $language_line)
                                    @php
                                        $dizi = json_decode($language_line->text);
                                    @endphp
                                    <tr>
                                        {{--<td>{{$language_line->id}}</td>--}}
                                        <td>{{$language_line->group}}</td>
                                        <td>{{$language_line->key}}</td>
                                        @foreach($langs as $l)
                                            @php $d = $l->lang_code; @endphp
                                            <td>
                                                @if(isset($dizi->$d))
                                                    {{$dizi->$d}}
                                                @else
                                                    Bu dil için kayıt yok
                                                @endif
                                            </td>
                                        @endforeach
                                        <td width="250">
                                            <button type="button" class="btn btn-primary row_modal"
                                                    data-id="{{$language_line->id}}">Düzenle
                                            </button>
                                            <form id="delete-form-{{$language_line->id}}" method="post" action="{{ route('admin.locale.destroy',$language_line->id) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button type="button" onclick="if(confirm('Are you sure?')){event.preventDefault();document.getElementById('delete-form-{{$language_line->id}}').submit()}else{event.preventDefault();}" class="btn btn-danger">Sil</button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        @else
                            Eklenmiş data yok
                        @endif
                    </div>
                </div>

                <div class="modal fade" id="LanguageModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-icerik">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- end widget div -->

        </div>
        @push("scripts")
            <script>
                $('.row_modal').on("click", function () {
                    $(".modal-icerik").html("loading");
                    $id = $(this).data("id");
                    axios.get("/app/locale/form/" + $id).then(function (res) {
                        // console.log(res.data);
                        $(".modal-icerik").html(res.data)
                    });


                    $("#LanguageModal").modal("show");

                })
            </script>
            <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
            <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
            <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
            <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
            <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
            <script type="text/javascript">
                // var responsiveHelper_dt_basic = undefined;
                // var breakpointDefinition = {
                //     tablet: 1024,
                //     phone: 480
                // };
                tables = $('#table').DataTable({

                    "oLanguage": {
                        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                    },

                    responsive: true,
                    order:[[0,"desc"]]

                });

                table_search(tables)

            </script>
    @endpush

@endsection

