@extends('layouts.master')
@section('content')
    <style>
        .table thead tr th, .table tbody tr td {
            border: none;
            padding: 0px;
        }

    </style>
    <!-- widget grid -->
    <section id="show" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body">

                            <div class="row">
                                <div class="col-sm-8">

                                    <div class="well">

                                        <h1><i class="fa fa-building-o"></i> <span class="semi-bold">{{$company->company_name}}
                                                </span>
                                            <span class="pull-right">
                                                <a class="btn btn-default"
                                                   href="{{route("sales.companies.form",[aid(),'Customer',$company->id,'update'])}}"><i
                                                            class="fa fa-edit"></i> Düzenle</a></span></h1>

                                        <hr>

                                        <div class="row">
                                            <div id="short_info" class="col-12">
                                                <div class="col-sm-5">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$company->email}}
                                                </div>
                                                <div class="col-sm-5"><i class="fa fa-phone" aria-hidden="true"></i> {{$company->phone}}
                                                </div>
                                                <div class="col-sm-2"><span  v-on:click="details = !details"  class="pull-right" style="cursor:pointer;">Tüm Bilgiler</span>
                                                </div>
                                            </div>
                                            <div style="display:none" v-show="details" class="col-12">
                                                <div class="col-sm-9">

                                                    <table class="table table-condensed table-striped table-no-padding"
                                                           width="100%"
                                                           border="0">
                                                        <tr>
                                                            <td><i class="fa fa-building-o" aria-hidden="true"></i>
                                                                FİRMA ÜNVANI

                                                            </td>
                                                            <td>{{$company->company_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                KISA İSİM

                                                            </td>
                                                            <td>{{$company->company_short_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-envelope" aria-hidden="true"></i>
                                                                E-POSTA

                                                            </td>
                                                            <td>{{$company->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-phone" aria-hidden="true"></i>
                                                                TELEFON NUMARASI

                                                            </td>
                                                            <td>{{$company->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-fax" aria-hidden="true"></i> FAKS
                                                                NUMARASI

                                                            </td>
                                                            <td>{{$company->fax}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                AÇIK ADRESİ

                                                            </td>
                                                            <td>{{$company->addresss  }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-gavel" aria-hidden="true"></i> VERGİ
                                                                BİLGİLERİ

                                                            </td>
                                                            <td>{{$company->tax_id}}/{{$company->tax_office}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-bank" aria-hidden="true"></i> IBAN

                                                            </td>
                                                            <td>{{$company->iban}}</td>
                                                        </tr>

                                                    </table>

                                                </div>
                                                <div class="col-sm-3">
                                                <span id="short_data"
                                                              class="pull-right">Özet Bilgilere Dön</span>
                                                </div>
                                            </div>

                                        </div>

                                        <hr>


                                        <table class="table table-striped table-condensed table-hover smart-form ">
                                            <thead>
                                            <tr>
                                                <th>İŞLEM TÜRÜ</th>
                                                <th>AÇIKLAMA</th>
                                                <th>İŞLEM TARİHİ</th>
                                                <th>MEBLAĞ</th>
                                                <th>BAKİYE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>AÇILIŞ BAKİYESİ</td>
                                                <td>Firmanın borcu var</td>
                                                <td>6 Eylül 2017</td>
                                                <td>1.000,00 TL</td>
                                                <td>1.000,00</td>
                                            </tr>

                                            </tbody>
                                        </table>


                                    </div>

                                    <ul id="myTab1" class="nav nav-tabs bordered">
                                        <li class="active">test
                                        </li>


                                    </ul>

                                    <div id="myTabContent1" class="tab-content padding-10">
                                        <div class="tab-pane fade active in" id="g1">
                                            <div id="contacts_table">

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-4" style=";height: 500px;overflow: scroll;">
                                    {{--payment info --}}
                                    <div id="order_info" class="well">

                                        <h1>
                                            <div class="btn-group ">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false">DİĞER
                                                    İŞLEMLER <span class="caret"></span> </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="javascript:void(0);"><i class="fa fa-file-text-o"
                                                                                         aria-hidden="true"></i>
                                                            SATIŞ FATURASI OLUŞTUR</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);"><i class="fa fa-file-text-o"
                                                                                         aria-hidden="true"></i>
                                                            ALIŞ FİŞ / FATURASI OLUŞTUR</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="javascript:void(0);"><i
                                                                    class="fa fa-sign-out fa-rotate-270"
                                                                    aria-hidden="true"></i> ÖDEME EKLE</a>
                                                    </li>

                                                    <li>
                                                        <a href="#!" data-toggle="modal" data-target="#deleteModal" id="delete"><i class="fa fa-trash-o"
                                                                                         aria-hidden="true"></i>
                                                            SİL</a>
                                                    </li>
                                                </ul>
                                            </div>


                                            <a id="payment_click" class="btn btn-default pull-right ">TAHSİLAT EKLE </a>

                                        </h1>

                                        <hr>


                                        <div id="short_info" class="col-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    GECİKMİŞ TAHSİLAT <span class="pull-right">2.500,00</span>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                     TOPLAM TAHSİLAT <span class="pull-right">2.500,00</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-primary btn btn-block">
                                                        EKSTRE PDF OLARAK İNDİR
                                                    </button>
                                                </div>
                                            </div>


                                        </div>

                                        <hr>


                                    </div>
                                    {{--payment process--}}
                                    <div id="payment_info" style="display:none" class="well">

                                        <h1><i class="fa fa-1x c-textLight fa-sign-in fa-rotate-90"></i> <span
                                                    align="center"
                                                    class="semi-bold">TAHSİLAT EKLE</span>
                                        </h1>

                                        <hr>

                                        <div class="row">

                                            <ul id="myTab1" style="display:flex;text-align:center"
                                                class="nav nav-tabs flex-wrap">
                                                <li class="active" style="text-align: center;flex:1;">
                                                    <a href="#s1" data-toggle="tab" aria-expanded="false"> NAKİT
                                                        TAHSİLAT</a>
                                                </li>
                                                <li style="text-align: center;flex:1;">
                                                    <a href="#s2" data-toggle="tab" aria-expanded="true"> ÇEK
                                                        TAHSİLAT</a>
                                                </li>
                                            </ul>

                                            <div id="myTabContent1" class="tab-content padding-10">
                                                <div class="tab-pane fade active in" id="s1">
                                                    <form id="productForm" class="form-horizontal bv-form"
                                                          novalidate="novalidate">
                                                        <button type="submit" class="bv-hidden-submit"
                                                                style="display: none; width: 0px; height: 0px;"></button>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    TARİH
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input type="text" name="tarih" placeholder=""
                                                                               class="form-control xdate"
                                                                               data-dateformat="dd.mm.yy">
                                                                        <span class="input-group-addon"><i
                                                                                    class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    HESAP
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group" style="width:100%">
                                                                        <select class="form-control" name="color"
                                                                                data-bv-field="color">
                                                                            <option value="">KASA HESABI</option>
                                                                            <option value="">BANKA HESABI</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    MEBLAĞ
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group" style="width:100%">
                                                                        <input type="text" class="form-control"
                                                                               value="00,00">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    AÇIKLAMA
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group" style="width:100%">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>


                                                    </form>

                                                </div>
                                                <div class="tab-pane fade " id="s2">
                                                    <form id="productForm" class="form-horizontal bv-form"
                                                          novalidate="novalidate">
                                                        <button type="submit" class="bv-hidden-submit"
                                                                style="display: none; width: 0px; height: 0px;"></button>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    TARİH
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input type="text" name="tarih" placeholder=""
                                                                               class="form-control xdate"
                                                                               data-dateformat="dd.mm.yy">
                                                                        <span class="input-group-addon"><i
                                                                                    class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    VADE TARİHİ
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input type="text" name="tarih" placeholder=""
                                                                               class="form-control xdate"
                                                                               data-dateformat="dd.mm.yy">
                                                                        <span class="input-group-addon"><i
                                                                                    class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    MEBLAĞ
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group" style="width:100%">
                                                                        <input type="text" class="form-control"
                                                                               value="00,00">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-group has-feedback">
                                                                <label class="col-sm-4 control-label">
                                                                    AÇIKLAMA
                                                                </label>
                                                                <div class="col-sm-8 inputGroupContainer">
                                                                    <div class="input-group" style="width:100%">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>


                                                    </form>
                                                </div>
                                            </div>


                                        </div>

                                        <footer>
                                            <button type="button" class="btn pull-left" id="back-order-info">
                                                VAZGEÇ
                                            </button>

                                            <button type="submit" class="btn btn btn-danger pull-right">
                                                TAHSİLAT EKLE
                                            </button>
                                            <br><br>
                                        </footer>

                                    </div>
                                    {{--notes--}}
                                    <div class="well">

                                        <h1><i class="fa  fa-comment "></i> <span align="center" class="semi-bold">NOTLAR</span>
                                        </h1>

                                        <hr>

                                        <div class="row">
                                            <div id="note_info" class="col-12">
                                                <div class="chat-footer">

                                                    <!-- CHAT TEXTAREA -->
                                                    <div class="textarea-div">

                                                        <div class="typearea">
                                        <textarea style="min-height:20px;" id="textarea-expand"
                                                  class="custom-scroll"></textarea>
                                                        </div>

                                                    </div>

                                                    <!-- CHAT REPLY/SEND -->
                                                    <span class="textarea-controls">
								<button class="btn btn-sm btn-danger pull-right">
									Ekle
								</button>
                                </span>

                                                </div>

                                            </div>

                                        </div>
                                        <hr>


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

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete company ?",$id=$company->id])


    </section>

    <!-- end widget grid -->
    @push('scripts')
        <script>
            new Vue({
                el: "#show",
                data: {
                    details: false
                },
                methods: {
                    delete_data:function($id){
                        fullLoading();
                        axios.post('{{route("sales.companies.destroy",[aid(),$id])}}')
                            .then(function (response) {
                                if(response.data.message == "success"){
                                    window.location.href = '{{route("sales.companies.customer",aid())}}';
                                }
                            }).catch(function (error) {
                            notification("Error", error.response.data.message, "danger");
                            fullLoadingClose();
                        });
                    },

                }
            });
        </script>
    @endpush
@endsection