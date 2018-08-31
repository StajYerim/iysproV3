@extends('layouts.master')

@section('content')

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <div>

                        <div class="widget-body no-padding">
                            <table class="table  table-hover table-condensed table-striped">
                                <thead class="fixed-title">
                                <tr>
                                    <th>{{trans("sentence.widget_name")}}</th>
                                    <th>{{trans("word.short")}}</th>
                                    <th>{{trans("word.group")}}</th>
                                    <th>{{trans("word.show")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td>
                                            {{$unit->name}}
                                        </td>
                                        <td>
                                            {{$unit->short_name}}
                                        </td>
                                        <td>
                                            {{$unit->type}}
                                        </td>
                                        <td>
                                            <span class="onoffswitch">
												<input type="checkbox" name="unit_status"  onchange="switcher({{$unit->id}})"
                                                       class="onoffswitch-checkbox" {{$unit->account_unit == 1 ? "checked":""}} id="{{$unit->id}}">
												<label class="onoffswitch-label" for="{{$unit->id}}">
													<span class="onoffswitch-inner" data-swchon-text="ON"
                                                          data-swchoff-text="OFF">
                                                    </span>
								                <span class="onoffswitch-switch"></span>
                                                </label>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>

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

         function switcher(id){
             axios.post('{{route("settings.units.update",aid())}}',{id: id })
                 .then(function (response) {
                     console.log(response);
                 })
                 .catch(function (error) {
                     console.log(error);
                 });
         }


            $('#table').DataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'TB>r >" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sUrl": "{{route("general.datatable.lang",aid())}}",
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                buttons: [
                    {
                        text: 'New Customer',
                        className: "DTTT_button btn btn-success",
                        action: function (e, dt, node, config) {
                            window.location.href = '{{route("sales.companies.form",[aid(),"Customer","0","new"])}}'
                        }
                    }
                ],

                "autoWidth": true,
                stateSave: true,
                responsive: true,
                stateDuration: 45,
                processing: true,

            });
        </script>
    @endpush
@endsection