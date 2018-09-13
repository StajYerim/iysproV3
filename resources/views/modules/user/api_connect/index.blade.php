@extends('layouts.master')

@section('content')

    <section id="api_connect" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">


                    <div>

                        <div class="widget-body ">

                                <fieldset>
                                    <legend>
                                        N11 {{trans("sentence.api_informations")}}
                                    </legend>

                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">
                                                    {{trans("sentence.api_key")}}
                                                </label>
                                                <input type="text" class="form-control" v-model="n11_form.api_key">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">
                                                    {{trans("sentence.api_password")}}
                                                </label>
                                                <input type="text" class="form-control" v-model="n11_form.api_password" >

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" @click="n11_form_send" type="button">
                                                <i class="fa fa-eye"></i>
                                                {{trans("word.save")}}
                                            </button>
                                        </div>
                                    </div>
                                </div>



                        </div>

                    </div>

                </div>

            </article>
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                    <div>

                        <div class="widget-body ">


                                <button type="submit" class="bv-hidden-submit"
                                        style="display: none; width: 0px; height: 0px;">
                                </button>

                                <fieldset>
                                    <legend>
                                         PARAŞÜT {{trans("sentence.api_informations")}}
                                    </legend>

                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">
                                                    {{trans("sentence.client_id")}}
                                                </label>
                                                <input type="text" class="form-control" v-model="parasut_form.client_id"  >

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">
                                                    {{trans("sentence.client_secret")}}
                                                </label>
                                                <input type="text" class="form-control" v-model="parasut_form.client_secret" >
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label class="control-label">
                                                    {{trans("sentence.user_name")}}
                                                </label>
                                                <input type="text" class="form-control"  v-model="parasut_form.username">

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 ">
                                            <label class="control-label">
                                                {{trans("word.password")}}
                                            </label>
                                            <input type="password" class="form-control"  v-model="parasut_form.password">

                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label class="control-label">
                                                    {{trans("sentence.company_id")}}
                                                </label>
                                                <input type="text" class="form-control"  v-model="parasut_form.company_id">

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label class="control-label">
                                                    {{trans("sentence.callback_url")}}
                                                </label>
                                                <input type="text" class="form-control"  v-model="parasut_form.callback_url">

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-default" @click="parasut_form_send" type="button">
                                                <i class="fa fa-eye"></i>
                                                {{trans("word.save")}}
                                            </button>
                                        </div>
                                    </div>
                                </div>



                        </div>

                    </div>

                </div>

            </article>
        </div>


    </section>
    @push('scripts')
        <script>
            window.addEventListener("load", () => {
                let stock = new Vue({
                    el: "#api_connect",
                    data: () => ({
                        n11_form:{
                            type:"n11",
                            api_key:"{{$account->n11_api_key}}",
                            api_password:"{{$account->n11_api_password}}"
                        },
                        parasut_form:{
                            type:"parasut",
                            client_id:"{{$account->parasut_client_id}}",
                            client_secret:"{{$account->parasut_client_secret}}",
                            username:"{{$account->parasut_username}}",
                            password:"{{$account->parasut_password}}",
                            company_id:"{{$account->parasut_company_id}}",
                            callback_url:"{{$account->parasut_callback_url}}",
                        }
                    }),
                    methods:{
                        n11_form_send:function(){
                            axios.post("{{route("settings.api.save",aid())}}",this.n11_form)
                                .then(function (response) {
                                    notification("Success",response.data.message,"danger");
                                })
                        },
                        parasut_form_send:function(){

                            axios.post("{{route("settings.api.save",aid())}}",this.parasut_form) .then(function (response) {
                                notification("Success",response.data.message,"success");
                            })
                        }
                    }
                })
            });
        </script>
    @endpush
@endsection
