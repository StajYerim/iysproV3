@extends('layouts.master')

@section('content')

    <section id="show" class="">
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <span class="semi-bold" style="font-size:19px;font-weight:bold">
                    {{$product->name}} {{$product->code == null ? "":"(".$product->code.")"}}
                </span>  <br>
            </div>
            <div class="col-lg-4 col-sm-4">
                   <span class="pull-right">
                       <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                {{trans("sentence.other_transactions")}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @php $parasut = auth()->user()->memberOfAccount; @endphp
                                @if($parasut["parasut_callback_url"] != null && $parasut["parasut_client_id"] != null && $parasut["parasut_client_secret"] != null && $parasut["parasut_username"] != null && $parasut["parasut_password"] != null && $parasut["parasut_company_id"] != null)
                                <li>
                                    <a href="{{ route('stock.product.sync', [ aid(), $product->id ]) }}">
                                        <i class="fa fa-send"></i>
                                        {{trans("sentence.send_to_parasut")}}
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#openStartReceipt">
                                        <i class="fa fa-plus " aria-hidden="true"></i>
                                        {{trans("sentence.create_opening_receipt")}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="productArchive">
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                        {{trans("word.archive")}}
                                    </a>
                                    <a href="#" style="display:none" id="productArchiveOut">
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                        {{trans("sentence.remove_archive")}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fa fa-trash-o" aria-hidden="true"> </i>
                                        {{trans("word.delete")}}
                                    </a>
                                </li>
                            </ul>
                        </div>

                            <a class="btn btn-default " href="{{route("stock.product.form",[aid(),$product->id,"update"])}}">
                                <i class="fa fa-edit"></i>
                                {{trans("word.edit")}}
                            </a>

                        </span>
            </div>
        </div>
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget " id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body ">

                            <div class="col-lg-12" style="margin-bottom:15px">
                                <div class="col-lg-4 col-xs-4">
                                    <small style="font-size:13px;">
                                        {{$product->type_name}}
                                    </small><br>
                                    <small style="font-size:14px;">
                                        {{trans("word.vat")}} %{{$product->vat_rate}}
                                    </small><br>
                                    <small style="font-size:14px;">
                                        {{trans("word.barcode")}} : {{$product->barcode}}
                                    </small>
                                </div>
                                <div class="col-lg-4 col-xs-3">
                                    <span class="badge" style="background:{{$product->category["color"]}}"> {{$product->category["name"]}} </span>
                                </div>
                                <div class="col-lg-4" style="text-align:right">
                                    <img src="{{$product->images->last()["name"] == null ? "/img/noimage.gif":product_img_url($product->images->last()["name"])}}"
                                            width="135px" height="100px;">
                                </div>
                                <hr>
                            </div>



                        </div>

                    </div>

                </div>
                <ul id="myTab1" class="nav nav-tabs bordered">
                    <li class="active">
                        <a href="#g1" data-toggle="tab" aria-expanded="true">
                            {{trans("wrd.informations")}}
                        </a>
                    </li>

                    <li>
                        <a href="#g2" data-toggle="tab">
                            {{trans("sentence.stock_movements")}}
                        </a>
                    </li>
                </ul>
                <div id="myTabContent1" class="tab-content padding-10" style="background-color: #fff">
                    <div class="tab-pane fade  active in" id="g1">
                        <small style="font-size:13px;">
                            ----- </small>
                        <br> <small style="font-size:14px;font-weight: 600;"> {{trans("sentence.sales_order")}}: 0,00</small>
                        <br><small style="font-size:14px;font-weight: 600;"> {{trans("sentence.purchase_order")}}: </small>
                        <br> <small style="font-weight: 600">{{trans("word.purchase")}}/{{trans("word.cost")}} :</small> <small style="color:#886650!important;font-size:14px;font-weight: 600;">0,00<i class="fa fa-try"></i></small>
                        <br>  <small style="font-weight: 600"> {{trans("sentence.list_price")}} :</small> <small style="color:#2AC!important;font-size:14px;font-weight: 600;">135,00<i class="fa fa-try"></i></small>

                    </div>


                    <div class="tab-pane fade" id="g2">
                        <div>
                            <div class="table-responsive" v-if="stock.data.length > 0">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>İŞLEM TÜRÜ</th>
                                        <th>AÇIKLAMA</th>
                                        <th>MÜŞTERİ / TEDARİKÇİ</th>
                                        <th>İŞLEM TARİHİ</th>
                                        <th>MİKTAR</th>
                                        <th>BİRİM FİYATI</th>
                                        <th>TOPLAM FİYAT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in stock.data">
                                        <td> @{{item.receipt.type_name}}</td>
                                        <td>@{{ item.receipt.description }}</td>
                                        <td>

                                            <span v-if="item.receipt.company == null">-</span>
                                            <span v-if="item.receipt.company != null">@{{ item.receipt.company.company_name}}</span>
                                        </td>
                                        <td>@{{ item.receipt.date }}</td>
                                        <td>@{{ item.quantity }} @{{ item.unit.short_name }}</td>
                                        <td>@{{ item.product.list_price }} <i class="fa fa-try"></i> </td>
                                        <td>-<i class="fa fa-try"></i></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <ul class="pagination pagination-xs no-margin">
                                                <li class="prev ">
                                                    <a @click="movements(stock.per_page)">First</a>
                                                </li>
                                                <li  v-for="i in (3, stock.last_page)" @click="movements(i)" :class="{active:stock.current_page == i}">
                                                    <a href="javascript:void(0);">@{{ i }}</a>
                                                </li>

                                                <li class="next">
                                                    <a href="#!" @click="movements(stock.last_page)">Next</a>
                                                </li>
                                            </ul></td>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>

                            <div class="alert alert-info" v-else="stock.data.length < 0">
                                <span class="fa fa-info-circle">
                                    {{trans("sentence.service_product_transaction_history")}}
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
            </article>
        </div>

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete product ?",$id=$product->id])

    </section>

    @push('scripts')
        <script>
           $stock = new Vue({
                el: "#show",
                data: {
                    details: false,
                    stock:[]
                },
                methods: {
                    movements:function($page=1){

                        axios.get("/{{aid()}}/stocks/product/{{$id}}/movements?page="+$page).then(res=>{

                            $stock.stock = res.data
                        })
                    },
                    delete_data: function ($id) {
                        fullLoading();
                        axios.delete('{{route("stock.product.destroy",[aid(),$id])}}')
                            .then(function (response) {
                                if (response.data.message == "success") {
                                    window.location.href = '{{route("stock.index",aid())}}';
                                }
                            }).catch(function (error) {
                            notification("Error", error.response.data.message, "danger");
                            fullLoadingClose();
                        });
                    },

                },
                mounted(){
                    this.movements(1);
                }
            });
        </script>

    @endpush
@endsection
