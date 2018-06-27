@extends('layouts.master')

@section('content')

    <!-- widget grid -->
    <section id="api_connect" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">


                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body ">




                                <fieldset>
                                    <legend>
                                        N11 API BİLGİLERİ
                                    </legend>

                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">API KEY</label>
                                                <input type="text" class="form-control" v-model="n11_form.api_key">

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">API PASSWORD</label>
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
                                                KAYDET
                                            </button>
                                        </div>
                                    </div>
                                </div>



                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">


                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body ">


                                <button type="submit" class="bv-hidden-submit"
                                        style="display: none; width: 0px; height: 0px;"></button>

                                <fieldset>
                                    <legend>
                                        PARAŞÜT APİ BİLGİLERİ
                                    </legend>

                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">CLIENT ID</label>
                                                <input type="text" class="form-control" v-model="parasut_form.client_id"  >

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 ">
                                                <label class="control-label">CLIENT SECRET</label>
                                                <input type="text" class="form-control" v-model="parasut_form.client_secret" >

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label class="control-label">USER NAME</label>
                                                <input type="text" class="form-control"  v-model="parasut_form.username">

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label class="control-label">COMPANY ID</label>
                                                <input type="text" class="form-control"  v-model="parasut_form.company_id">

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label class="control-label">CALLBACK URL</label>
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
                                                KAYDET
                                            </button>
                                        </div>
                                    </div>
                                </div>



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


axios.post("{{route("settings.api.save",aid())}}",this.n11_form) .then(function (response) {
        notification("Success",response.data.message,"success");
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