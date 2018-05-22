@extends('layouts.master')
@section('content')
    <!-- widget grid -->
    <section id="show" class="">
        <div class="row">
            <div class="col-sm-8">

                <div class="well">
                    <h1><i style="vertical-align: -7px;color:#2AC!important" class="fa fa-money fa-2x"></i> <span class="semi-bold">YENİ KASA</span> <span class="pull-right"><a class="btn btn-default btn-lg" href="http://demo.iyspro.com/financemanager/accounts/4/edit" >{{trans("general.edit")}}
					</a><a class="btn btn-default btn-lg dropdown-toggle" aria-haspopup="true"><span class="caret"></span></a></span></h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6" style="font-weight: 400;font-size:15px;"><i class="fa fa-info-circle"></i>                                     TRL,KASA HESABI
                        </div>
                        <br>


                        <br></div>

                    <div class="row">
                        <div class="table-responsive ">

                            <table class="table table-hover">

                                <tbody>
                                <tr>
                                    <th width="20%">İŞLEM TÜRÜ</th>
                                    <th width="20%">İŞLEM TARİH</th>
                                    <th style="text-align:right" width="10%">MÜŞTERİ/TEDARİKÇİ</th>
                                    <th style="text-align:right" width="12%">AÇIKLAMA</th>
                                    <th style="text-align:right" width="20%">MEBLAĞ</th>
                                    <th style="text-align:right" width="20%">BAKİYE</th>
                                </tr>

                                </tbody>
                                <tbody id="tablo"><tr>
                                    <td>
                                        Açılış Bakiyesi
                                    </td>
                                    <td>04.05.2018</td>
                                    <td> </td>
                                    <td align="right"></td>
                                    <td align="right">

                                        + 45.000,00 <i class="fa fa-try"></i>

                                    </td>


                                    <td align="right">  45.000,00
                                    </td>
                                </tr>
                                </tbody>

                            </table>


                        </div>
                    </div>


                </div>


            </div>
            <div class="col-sm-4" style=";height: 500px;overflow: scroll;">

                <div id="order_info" class="well">


                    <div id="short_info" class="col-12">

                        <div class="transferInfo">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button id="transferAccount" type="button" class="btn  btn-block bg-color-blueDark txt-color-white ">
                                        DİĞER HESABA TRANSFER YAP
                                    </button>

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="btn-group btn-block">
                                        <button class="btn btn-block bg-color-blueDark txt-color-white dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            PARA GİRİŞİ EKLE <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="min-width:293px;text-align:center;font-size:15px;">
                                            <li>
                                                <a href="javascript:void(0);" onclick="moneyIn()"><i class="fa fa-sign-in fa-rotate-90"></i> PARA GİRİŞİ EKLE</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" onclick="moneyOut()"><i class="fa fa-sign-out fa-rotate-270"></i> PARA ÇIKIŞI
                                                    EKLE</a>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-block bg-color-blueLight txt-color-white">
                                        DİĞER HESAP İŞLEMLERİ
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="transferSendForm" style="display:none">
                            <form id="AccountTransferForm" class="form-horizontal bv-form" novalidate="novalidate">
                                <h1><i class="fa fa-1x c-textLight fa-share-square-o"></i> <span class="semi-bold">HESABA TRANSFER</span>
                                </h1>

                                <input type="hidden" value="4" name="thisAccId">
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>HESAP</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <select class="form-control" name="AccId" data-bv-field="color">
                                                    <option value="1">Kasa Hesabı</option>
                                                    <option value="2">GARANTİ</option>
                                                    <option value="3">IYZICO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>TARİH</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" name="TransactionDate" value="22.05.2018" class="form-control xdate datepicker hasDatepicker" data-mask="99.99.9999" data-dateformat="dd.mm.yy" id="dp1526983556330">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>MEBLAĞ</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" name="Amount" class="form-control money transferAmount" value="0,00">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>AÇIKLAMA</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" name="Description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="button" class="btn pull-left backAccountDetail">
                                        VAZGEÇ
                                    </button>

                                    <button type="button" class="btn btn btn-danger pull-right" disabled="" id="transferSend">
                                        TRANSFER ET
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>

                        <div class="moneyInForm" style="display:none">
                            <form id="MoneyInForm" class="form-horizontal bv-form" novalidate="novalidate">
                                <h1><i class="fa fa-sign-in fa-rotate-90"></i> <span class="semi-bold">PARA GİRİŞİ</span></h1>

                                <input type="hidden" value="4" name="thisAccId">

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>TARİH</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" name="TransactionDate" value="22.05.2018" class="form-control xdate datepicker hasDatepicker" data-mask="99.99.9999" data-dateformat="dd.mm.yy" id="dp1526983556331">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>MEBLAĞ</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" name="Amount" class="form-control money transferAmount" value="0,00">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>AÇIKLAMA</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" name="Description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="button" class="btn pull-left backAccountDetail">
                                        VAZGEÇ
                                    </button>

                                    <button type="button" class="btn btn btn-danger pull-right" disabled="" id="InMoneySend">
                                        EKLE
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>

                        <div class="moneyOutForm" style="display:none">
                            <form id="MoneyOutForm" class="form-horizontal bv-form" novalidate="novalidate">
                                <h1><i class="fa fa-sign-out fa-rotate-270"></i> <span class="semi-bold">PARA ÇIKIŞI</span></h1>

                                <input type="hidden" value="4" name="thisAccId">

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>TARİH</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" name="TransactionDate" value="22.05.2018" class="form-control xdate datepicker hasDatepicker" data-mask="99.99.9999" data-dateformat="dd.mm.yy" id="dp1526983556332">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>MEBLAĞ</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" name="Amount" class="form-control" value="0,00">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>AÇIKLAMA</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" name="Description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="button" class="btn pull-left backAccountDetail">
                                        VAZGEÇ
                                    </button>

                                    <button type="button" class="btn btn btn-danger pull-right" disabled="" id="OutMoneySend">
                                        EKLE
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>
                        <a href="#">
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span style="color:gray;font-weight: 600;">BAKİYE <span style="font-size:15px;" class="pull pull-right">45.000,00
                                            <i class="fa fa-try"></i></span></span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
        </div>

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete stock receipt ?",$id=$account->id])

    </section>

    @push('scripts')
        <script>
            new Vue({
                el: "#show",
                data: {
                    details: false
                },
                methods: {
                    delete_data: function ($id) {
                        fullLoading();
                        axios.delete('{{route("stock.movements.destroy",[aid(),$account->id])}}')
                            .then(function (response) {
                                if (response.data.message == "success") {
                                    window.location.href = '{{route("stock.movements.index",aid())}}';
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