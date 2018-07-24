@extends('layouts.master')

@section('content')

    <!-- widget grid -->
    <section id="tester" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0">
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
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                            <input class="form-control" type="text">
                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="table-responsive">
<form @submit.prevent="form_send">
    <input type="form-control" v-model="new_item">
    <button class="btn btn-suuccess" type="submit">{{trans("word.send")}}</button></form>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>@{{ mesaj }}</th>
                                        <th>{{trans("word.action")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in list">
                                        <td>@{{item}}</td>
                                        <td><button class="btn btn-danger" v-on:click="delete">{{trans("WORD.delete")}}</button> </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                            <!-- this is what the user will see -->

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

        <!-- row -->

        <div class="row">

            <!-- a blank row to get started -->
            <div class="col-sm-12">

            </div>

        </div>

        <!-- end row -->

    </section>
    <!-- end widget grid -->

    <script>
        new Vue({
            el:"#tester",
            data:{
                list:[],
                new_item:"",
                mesaj:"mesaj"
            },
            methods:{
                form_send(){
            this.list.push(this.new_item);
                    this.new_item = ""
                },
                delete(){
                    this.remove();
                }
            }
        })
    </script>

@endsection
