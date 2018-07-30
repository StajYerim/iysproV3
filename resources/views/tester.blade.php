@extends('layouts.master')

@section('content')

    <section id="tester" class="">

        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

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


                        </div>
                            <div class="table-responsive">
                                <form @submit.prevent="form_send">
                                    <input type="form-control" v-model="new_item">
                                    <button class="btn btn-success" type="submit">
                                        {{trans("word.send")}}
                                    </button>
                                </form>
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
                                        <td>
                                            <button class="btn btn-danger" v-on:click="delete">
                                                {{trans("word.delete")}}
                                            </button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div>

                        </div>

                    </div>

                </div>

            </article>

        </div>



        <div class="row">

            <div class="col-sm-12">

            </div>

        </div>


    </section>

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
