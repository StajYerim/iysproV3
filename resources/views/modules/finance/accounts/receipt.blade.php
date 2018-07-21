@extends('layouts.master')

@section('content')
    <style>
        .form-horizontal .control-label {
            text-align: left;
        }
         .table thead tr th, .table tbody tr td {
             border: none;

         }
    </style>
    <div id="receipt" style="opacity: 1;" v-cloak>
        <div class="row">
            <div class="col-sm-12">

                <div class="well">

                    <h1>
                        <i style="vertical-align: -7px;color:#2AC!important"
                           class="fa fa-sign-in fa-rotate-90 fa-2x "></i> <span
                                class="semi-bold"> {{$receipt->type}}
                             </span>

                        <span class="pull-right"><a  href="#!" data-toggle="modal" data-target="#deleteModal" class="btn btn-default btn-lg "> {{trans("word.delete")}}</a></span>
                    </h1>
                    <hr>
                    <div class="row">

                        <div id="more_info" class="col-12">
                            <div class="col-sm-9">

                                <table class="table table-condensed table-striped table-no-padding" width="100%"
                                       border="0">
                                    <tr>
                                        <td width="200px">
                                            <div class="bottom-info"><i class="fa fa-building-o" aria-hidden="true"></i> {{trans("word.customer")}}
                                            </div>
                                        </td>
                                        <td><a href="{{route("sales.companies.show",[aid(),$receipt->company["id"]])}}">{{$receipt->company["company_name"]}}</a></td>
                                    </tr>
                                    <tr>
                                        <td width="200px">
                                            <div class="bottom-info"><i class="fa fa-calendar" aria-hidden="true"></i> {{trans("word.date")}}</div>
                                        </td>
                                        <td>{{$receipt->date}}</td>
                                    </tr>
                                    <tr>
                                        <td width="200px">
                                            <div class="bottom-info"><i class="fa fa-bank" aria-hidden="true"></i> {{trans("sentence.account_processed")}}</div>
                                        </td>
                                        <td><a href="{{route("finance.accounts.show",[aid(),$receipt->bank_account["id"]])}}">{{$receipt->bank_account["name"]}}</a></td>
                                    </tr>

                                    </tr>

                                </table>

                            </div>

                        </div>

                        <div class="col-sm-8" style="font-weight: 400;font-size:15px;">
                        </div>

                        <div class="col-sm-4" style="font-weight: 600;font-size:15px;"> {{trans("sentence.collected_sum")}} <span class="pull-right">{{$receipt->amount}} <i
                                        class="fa fa-try"></i> </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive table-condensed table-hover " >
                            <table class="table table-hover">
                                <tfoot>
                                <tr>
                                    <td width="5%"></td>
                                    <td></td>
                                    <td style="text-align:right" >{{trans("word.remaining")}}</td>
                                    <td><span class="pull-right">{{$receipt->remaining}} <i class="fa fa-{{$receipt->currency}}"></i></span></td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <th width="20%">{{trans("sentence.invoice_processed")}}</th>
                                    <th width="20%">{{trans("word.status")}}</th>
                                    <th style="text-align:right" width="10%">{{trans("sentence.total_invoice")}}</th>
                                    <th style="text-align:right" width="15%">{{trans("sentence.currency_processed")}}</th>

                                </tr>
                                </tbody>
                                <tbody id="tablo" style="font-size: 11px;">
                                <tr v-for="item in orders" style="cursor:pointer" v-on:click="redirect(item.id,item.type)">
                                    <td>
                                        @{{ item.name }}
                                    </td>
                                    <td>@{{ item.status }}</td>
                                    <td style="text-align:right">@{{ item.grand_total }} </td>
                                    <td align="right">@{{ item.process_amount }}</td>

                                </tr>
                                </tbody>

                            </table>


                        </div>
                    </div>

                    <br>

                </div>


            </div>
            @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete account receipt ?",$id=$receipt->id])

        </div>

        @push("scripts")
            <script>
                window.addEventListener("load", () => {
                    VueName = new Vue({
                        el:"#receipt",
                        data:{
                            orders:[

                            ]
                        },
                        mounted:function(){
                          this.orders.push(
                              @foreach($receipt->orders as $order){
                                  id:"{{$order->id}}",
                                  type:"sales",
                                  name:"Satış Siparişi",
                                  status:"{{$order->status}}",
                                  grand_total:"{{$order->grand_total}}",
                                  process_amount:"{{get_money($order->pivot->amount)}}"
                              },@endforeach()
                                @foreach($receipt->porders as $order){
                                  id:"{{$order->id}}",
                                  type:"purchases",
                                  name:"Alış Siparişi",
                                  status:"{{$order->status}}",
                                  grand_total:"{{$order->grand_total}}",
                                  process_amount:"{{get_money($order->pivot->amount)}}"
                              },@endforeach()
                              );
                        },
                        methods:{
                            redirect:function($id,$type){
                              return window.location.href='/{{aid()}}/'+$type+'/orders/'+$id+"/show";
                            },
                            delete_data: function ($id) {
                                fullLoading();
                                axios.delete('{{route("finance.accounts.receipt.destroy",[aid(),$receipt->id])}}')
                                    .then(function (response) {
                                        if (response.data.message == "success") {
                                            history.go(-1);
                                        }
                                    }).catch(function (error) {
                                    notification("Error", error.response.data.message, "danger");

                                });
                            },
                        }
                    })
                });
            </script>
        @endpush
    </div>
@endsection