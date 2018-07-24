@extends('layouts.master')

@section('content')

    <!-- widget grid -->
    <section id="account_detail" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>{{ trans("sentence.account_informations") }}</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">
                            {{ trans("sentence.commercial_title") }} : {{ $company->company_name }}<br>
                            {{ trans("word.sector") }} : {{ $company->sector->name }}<br>
                            {{ trans("sentence.name_and_surname") }} : {{ $company->owner->name }}<br>
                            {{ trans("word.email") }} : {{ $company->owner->email }}<br>
                            {{ trans("word.mobile_number") }} : {{ $company->owner->mobile }}<br>
                            {{ trans("sentence.expiry_date") }} : {{ $company->expiry_date->format('d.m.Y') }}
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->


            </article>
            <!-- WIDGET END -->

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-4">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-2" data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>{{ trans("sentence.moduller_list") }} </h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="table-responsive">



                                    <table class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans("sentence.modul_name") }}</th>
                                            <th>{{ trans("word.status") }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($modules as $module)
                                            <tr>
                                                <td valign="bottom">{{$module->id}}</td>
                                                <td valign="bottom">{{$module->lang}}</td>
                                                <td>
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="status[]"
                                                               class="onoffswitch-checkbox " onclick="modules_update({{$module->id}})"
                                                               id="switch-{{$module->id}}" {{in_array($module->id,json_decode($company->modules)) == true ? "checked":""}} >
                                                        <label class="onoffswitch-label" for="switch-{{$module->id}}">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-8">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-3" data-widget-editbutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>{{ trans("sentence.account_users") }}</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">


                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fa fa-building"></i> {{ trans("word.name") }}</th>
                                        <th><i class="fa fa-calendar"></i> {{ trans("word.email") }}</th>
                                        <th><i class="glyphicon glyphicon-send"></i> {{ trans("word.status") }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($company->users as $user)
                                        <tr class="success">
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{ strtoupper($user->role->name) }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>

        <!-- end row -->


    </section>
    <!-- end widget grid -->

    @push("scripts")
        <script>
            function modules_update (id){
                axios.post("{{route("admin.companies.modules.update",$company->id)}}",{id:id}).then(res=>{

                })
            }
            window.addEventListener("load", () => {



            });
        </script>
    @endpush
@endsection