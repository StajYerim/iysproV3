@extends('layouts.master')
@section('content')
    <style>
        .table thead tr th, .table tbody tr td {
            border: none;
            padding: 0px;
        }

    </style>
    <!-- widget grid -->
    <section id="show" v-cloak>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12 new-title">
                <div class="col-lg-8 col-sm-8">
                    <h1><i class="fa fa-building-o"></i> <span class="semi-bold">{{$company->company_name}}
                                                </span>
                    </h1>

                </div>
                <div class="col-lg-4 col-sm-4">

                    <div class="btn-group btn-group-justified pull-right option-menu">
                        <div class="btn-group ">
                            <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                        class="fa fa-reorder"></span> &nbsp;<span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route("sales.companies.form",[aid(),'Customer',$company->id,'update'])}}"><i
                                                class="fa fa-edit" aria-hidden="true"></i>
                                        DÜZENLE</a>
                                </li>
                                <li>
                                    <a href="#!"  data-toggle="modal" data-target="#transaction"><i
                                                class="fa fa-edit" aria-hidden="true"></i>
                                        TAHSİLAT EKLE</a>
                                </li>
                                <li>
                                    <a href="#!"  data-toggle="modal" data-target="#transaction"><i
                                                class="fa fa-edit" aria-hidden="true"></i>
                                        ÖDEME EKLE</a>
                                </li>


                                <li class="divider"></li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"
                                                                                                  aria-hidden="true"></i>
                                        SİL</a>
                                </li>

                            </ul>

                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                        class="fa fa-print"></span> YAZDIR <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a target="_blank" href="http://demo.iyspro.com/salesmanager/sales-offer/8/print"><i
                                                class="fa fa-print" aria-hidden="true"></i>
                                        TEKLİFİ YAZDIR</a>
                                </li>
                                <li>
                                    <a download="" href="http://demo.iyspro.com/salesmanager/sales-offer/8/printDown"
                                       id="waybillInfo"><i class="fa fa-print" aria-hidden="true"></i>
                                        TEKLİFİ İNDİR</a>
                                </li>

                            </ul>

                        </div>

                        <a href="#" data-toggle="modal" data-target="#remoteModal" class="btn btn-default"><i
                                    class="fa fa-envelope"></i> Paylaş</a>

                    </div>


                </div>
            </div>
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div >
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="">

                            <div class="row">
                                <div class="col-sm-8">

                                    <div class="well">

                                        <div class="row">
                                            <div id="short_info" class="col-12">
                                                <div class="col-sm-5">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$company->email}}
                                                </div>
                                                <div class="col-sm-5"><i class="fa fa-phone" aria-hidden="true"></i> {{$company->phone}}
                                                </div>
                                                <div class="col-sm-2"><span  v-on:click="detail()"  class="pull-right" style="cursor:pointer;">@{{ detail_name }}</span>
                                                </div>
                                            </div>
                                            <div style="display:none" v-show="details" class="col-12"><br>
                                                <hr>
                                                <div class=" col-sm-9">

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
                                            @foreach($company->statement as $stat)
                                            <tr>
                                                <td></td>
                                                <td>{{$stat->description}}</td>
                                                <td>{{$stat->date}}</td>
                                                <td>{{$stat->amount}} {{ $stat->grand_total}}</td>
                                                <td>{{money_db_format($company->balance)}}</td>
                                            </tr>
                                                @endforeach

                                            </tbody>
                                        </table>


                                    </div>

                                    <ul id="myTab1" class="nav nav-tabs bordered">
                                        <li class="active">
                                        </li>


                                    </ul>

                                    <div id="myTabContent1" class="tab-content padding-10">
                                        <div class="tab-pane fade active in" id="g1">
                                            <div id="contacts_table">

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-4" >
                                    {{--payment info --}}
                                    <div id="order_info" class="well">



                                        <div id="short_info" class="col-12">
                                            {{--<div class="row">--}}
                                                {{--<div class="col-sm-12">--}}
                                                    {{--GECİKMİŞ TAHSİLAT <span class="pull-right">2.500,00</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<hr>--}}

                                            <div class="row">
                                                <div class="col-sm-12 bottom-info" >
                                                     BAKİYE <span class="pull-right">@{{remaining}}</span>

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
    @include("components.external.transaction",[$type="collect",$local="company",$detail = $company,$abble="App\\\Model\\\Sales\\\SalesOrders"])


    <!-- end widget grid -->
    @push('scripts')
        <script>
            window.addEventListener("load", () => {
          VueName =  new Vue({
                el: "#show",
                data: {
                    remaining:"{{$company->balance}}",
                    details: false,
                    detail_name: 'TÜM BİLGİLER'
                },
                methods: {
                    detail:function(){
                        if(this.details == false){
                            this.details = true;
                            this.detail_name = "ÖZET BİLGİ"

                        }else{
                            this.details = false;
                            this.detail_name = "TÜM BİLGİLER"
                        }
                    },
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
            });
        </script>
    @endpush
@endsection