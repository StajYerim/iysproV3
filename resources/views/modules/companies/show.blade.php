@extends('layouts.master')
@section('content')
    <style>
        .table thead tr th, .table tbody tr td {
            border: none;
            padding: 0px;
        }

    </style>
    <section id="show" v-cloak>
        <div class="row">
            <div class="col-lg-12 new-title">
                <div class="col-lg-8 col-sm-8">
                    <h1>
                        <i class="fa fa-building-o"></i>
                        <span class="semi-bold">
                            {{$company->company_name}}
                        </span>
                    </h1>

                </div>
                <div class="col-lg-4 col-sm-4">

                    <div class="btn-group btn-group-justified pull-right option-menu">
                        <div class="btn-group ">
                            <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="fa fa-reorder"></span> &nbsp;<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route($company_type == "supplier" ? "purchases.companies.form":"sales.companies.form",[aid(),$company_type,$company->id,'update'])}}">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        {{trans("word.edit")}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#!"  data-toggle="modal" data-target="#transaction">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        {{trans("sentence.add_collection") }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#!"  data-toggle="modal" data-target="#transaction_payment">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                       {{trans("sentence.add_payment")}}
                                    </a>
                                </li>


                                <li class="divider"></li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        {{trans("word.delete")}}
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>


                </div>
            </div>

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div >
                    <div>
                        <div class="">

                            <div class="row">
                                <div class="col-sm-8">

                                    <div class="well">

                                        <table class="table table-striped table-condensed table-hover smart-form ">
                                            <thead>
                                            <tr>
                                                <th width="15%">{{trans("word.type")}}</th>
                                                <th width="30%">{{trans("word.description")}}</th>
                                                <th width="10%">{{trans("word.date")}}</th>
                                                <th width="10%">{{trans("word.sum")}}</th>
                                                <th width="10%">{{trans("word.balance")}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr v-for="item in reverseItems " style="cursor:pointer" @click="redirect(item.url)">
                                                <td>@{{item.type}}</td>
                                                <td>@{{item.description}}</td>
                                                <td>@{{item.date}}</td>
                                                <td>@{{item.action_type }} @{{item.amount}}</td>
                                                <td>@{{item.last_balance}}</td>
                                            </tr>


                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <div class="col-sm-4" >
                                    <div id="order_info" class="well">

                                        <div id="short_info" class="col-12">

                                            <div class="row">
                                                <div class="col-sm-12 bottom-info">
                                                    {{trans("word.balance")}}
                                                    <span class="pull-right">@{{remaining}}
                                                    </span>

                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-primary btn btn-block">
                                                        {{trans("sentence.download_pdf_account_summary")}}
                                                    </button>
                                                </div>
                                            </div>

                                       </div>

                                    </div>

                                    <div class="well">

                                        <table class="table table-condensed table-striped table-no-padding"
                                               width="100%"
                                               border="0">
                                            <tr>
                                                <td width="10">
                                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->company_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->company_short_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->fax}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->addresss  }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-gavel" aria-hidden="true"></i>
                                                </td>
                                                <td>{{$company->tax_id}}/{{$company->tax_office}}</td>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>

            </article>
        </div>

        @include("components.external.delete_modal",[$title=trans('sentence.are_you_sure'),$type = "deleteModal",$message=trans('sentence.are_you_sure_delete_company'),$id=$company->id])

    </section>
    @include("components.external.transaction",[$type="collect",$local="company",$detail = $company,$abble="App\\\Model\\\Sales\\\SalesOrders"])
    @include("components.external.transaction_payment",[$type="payment",$local="company",$detail = $company,$abble="App\\\Model\\\Purchases\\\PurchaseOrders"])

    <!-- end widget grid -->
    @push('scripts')
        <script>
            window.addEventListener("load", () => {
                Vue.filter('reverse', function(value) {
                    // slice to make a copy of array, then reverse the copy
                    return value.slice().reverse();
                });
                VueName = new Vue({
                el: "#show",
                data: {
                    remaining:"{{$company->balance}}",
                    details: false,
                    detail_name: 'TÜM BİLGİLER',
                    items: []
                },
                    mounted: function () {
                       this.statement();
                        <?php
                        if (session()->has('cheque_status')) {?>
                        notification("Success", "Çek Alım işlemi başarıyla gerçekleşti.", "success");
                        <?php          }
                        ?>
                    },
                    computed: {
                        reverseItems() {
                            return this.items.slice().reverse();
                        }
                    },
                methods: {
                    statement:function(){
                        axios.post("{{route("company.items",[aid(),$company->id])}}")
                            .then(response => {
                                VueName.items = response.data
                            })
                    },
                    detail:function(){
                        if(this.details == false){
                            this.details = true;
                            this.detail_name = "ÖZET BİLGİ"

                        }else{
                            this.details = false;
                            this.detail_name = "TÜM BİLGİLER"
                        }
                    },
                    redirect:function(url){
                      return window.location.href = url;
                    },
                    delete_data:function($id){
                        fullLoading();
                        axios.post('{{route("sales.companies.destroy",[aid(),$id])}}')
                            .then(function (response) {
                                if(response.data.message == "success"){
                                    window.location.href = '{{route($company_type=="supplier"?"purchases.companies.supplier":"sales.companies.customer",aid())}}';
                                }
                            }).catch(function (error) {
                            notification("Error", error.response.data.message, "danger");
                            fullLoadingClose();
                        });
                    },


                },


          });
            });
        </script>
    @endpush
@endsection