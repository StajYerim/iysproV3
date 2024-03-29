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
                                      <a href="{{route("stock.product.form",[aid(),$product->id,"update"])}}">
                                        <i class="fa fa-edit " aria-hidden="true"></i>
                                        {{trans("word.edit")}}
                                    </a>
                                </li>
                                <li>
                                    {{--<a href="#" id="productArchive">--}}
                                        {{--<i class="fa fa-archive" aria-hidden="true"></i>--}}
                                        {{--{{trans("word.archive")}}--}}
                                    {{--</a>--}}
                                    {{--<a href="#" style="display:none" id="productArchiveOut">--}}
                                        {{--<i class="fa fa-archive" aria-hidden="true"></i>--}}
                                        {{--{{trans("sentence.remove_archive")}}--}}
                                    {{--</a>--}}
                                </li>
                                <li>
                                    <a href="#!" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fa fa-trash-o" aria-hidden="true"> </i>
                                        {{trans("word.delete")}}
                                    </a>
                                </li>
                            </ul>
                        </div>



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
                                    @if($product->category)
                                    <span class="badge" style="background:{{$product->category["color"]}}"> {{$product->category["name"]}} </span>
                                    @else
                                        <span class="badge" style="background:lightgrey"> Kategorisiz </span>

                                    @endif
                                </div>
                                <div class="col-lg-4" style="text-align:right">
                                    <img src="{{$product->images->last() ? $product->images->last()["name"] == null ? "/img/noimage.gif":product_img_url($product->images->last()["name"]):"/img/noimage.gif"}}"
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
                            {{trans("word.informations")}}
                        </a>
                    </li>

                    <li>
                        <a href="#g2" data-toggle="tab">
                            {{trans("sentence.stock_movements")}}
                        </a>
                    </li>
                    <li>
                        <a href="#g3" data-toggle="tab">
                            ÜRÜN AÇIKLAMASI
                        </a>
                    </li>
                </ul>
                <div id="myTabContent1" class="tab-content padding-10" style="background-color: #fff">
                    <div class="tab-pane fade  active in" id="g1">
                        <small style="font-size:13px;">
                            ----- </small>
                        <br> <small style="font-weight: 600">{{trans("word.purchase")}}/{{trans("word.cost")}} :</small> <small style="color:#886650!important;font-size:14px;font-weight: 600;">{{ $product->buying_price }} <i class="fa fa-try"></i></small>
                        <br>  <small style="font-weight: 600"> {{trans("sentence.list_price")}} :</small> <small style="color:#2AC!important;font-size:14px;font-weight: 600;">{{ $product->list_price }} <i class="fa fa-try"></i></small>

                    </div>


                    <div class="tab-pane fade" id="g2">
                        <div v-show="stock.data.length > 0 ">
                            <div class="table-responsive" v-show="stock.data.length > 0">

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
                                        <td>@{{ item.order_item.price }} <i v-if="item.order_item.price != null" class="fa fa-try"></i></td>
                                        <td><span v-if="item.order_item.prices != null">@{{ formatPrice(item.order_item.prices*item.quantitys) }} <i class="fa fa-try"></i></span></td>
                                    </tr>
                                    </tbody>

                                </table>

                            </div>
                            <ul style="bottom:5px" class="pagination pagination-xs no-margin">
                                <li class="prev ">
                                    <a href="#!" @click="movements(1)"><<</a>
                                </li>
                                <li  v-for="i in (3, stock.last_page)" @click="movements(i)" :class="{active:stock.current_page == i}">
                                    <a href="javascript:void(0);">@{{ i }}</a>
                                </li>
                                <li class="next">
                                    <a href="#!" @click="movements(stock.last_page)">>></a>
                                </li>
                            </ul>

                            <div class="alert alert-info" v-show="stock.data.length < 0">
                                <span class="fa fa-info-circle">
                                    {{trans("sentence.service_product_transaction_history")}}
                                </span>
                            </div>
                        </div>
                        <div v-show="stock.data.length == 0">Bu ürün için mevcut stok hareketi bulunmuyor.</div>
                    </div>
                    <div class="tab-pane fade" id="g3">

                        <form class="form-horizontal">
                            <div class="chat-footer">

                                <!-- CHAT TEXTAREA -->
                                <div class="textarea-div" style="width:500px;">

                                    <div class="typearea">
                                        <textarea v-model="description" placeholder="Ürün açıklaması...."
                                                  rows="10"></textarea>
                                    </div>

                                </div>

                                <!-- CHAT REPLY/SEND -->
                                <span class="textarea-controls" style="width:500px">
								<button type="button" v-on:click="desc_save()" class="btn btn-sm btn-primary pull-right">
									KAYDET
								</button> <span class="pull-right smart-form"
                                                style="margin-top: 3px; margin-right: 10px;">  </span></span>

                            </div>

                        </form>
                    </div>


                </div>
            </article>
        </div>

        @include("components.external.delete_modal",[$title=trans('sentence.are_you_sure'),$type = "deleteModal",$message=trans("sentence.are_you_sure_delete_product"),$id=$product->id])

    </section>

    @push('scripts')
        <script>
           $stock = new Vue({
                el: "#show",
                data: {
                    description: "{{$product->description}}",
                    details: false,
                    stock:[]
                },
               methods: {
                    desc_save:function(){
                        axios.post("{{route("stock.product.description.save",aid())}}",{id:"{{$product->id}}",description:this.description}).then(res=>{
                           notification("Başarılı","Ürün açıklaması kaydedildi.","success");
                        })
                    },
                   formatPrice: function (val) {
               return    val.toLocaleString('tr-TR', {
                           minimumFractionDigits: 2,
                           maximumFractionDigits: 2
                       });
                   },
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
                                }else{
                                    $("#response_data_delete").html(response.data.desc)
                                }
                                fullLoadingClose();
                            }).catch(function (error) {
                            fullLoadingClose();
                            notification("Error", error.response.data.message, "danger");

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
