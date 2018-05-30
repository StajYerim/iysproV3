@extends('layouts.master')

@section('content')

    <!-- widget grid -->
    <section id="show" class="">
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <span class="semi-bold" style="font-size:19px;font-weight:bold">{{$product->name}} {{$product->code == null ? "":"(".$product->code.")"}} </span>  <br>
            </div>
            <div class="col-lg-4 col-sm-4">
                   <span class="pull-right">
                                         <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">DİĞER
                                İŞLEMLER <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                                                   <li>
                                    <a href="#" data-toggle="modal" data-target="#openStartReceipt"><i
                                                class="fa fa-plus " aria-hidden="true"></i> AÇILIŞ FİŞİ OLUŞTUR</a>
                                </li>
                                                                <li>
                                    <a href="#" id="productArchive"><i class="fa fa-archive" aria-hidden="true"></i> ARŞİVLE</a>
                                    <a href="#" style="display:none" id="productArchiveOut"><i class="fa fa-archive"
                                                                                               aria-hidden="true"></i> ARŞİVDEN ÇIKAR</a>
                                </li>
                                <li>
                                    <a href="#!" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"
                                                                                                   aria-hidden="true"> </i> DELETE</a>
                                </li>
                            </ul>
                        </div>

                            <a class="btn btn-default "
                               href="{{route("stock.product.form",[aid(),$product->id,"update"])}}"><i
                                        class="fa fa-edit"></i> EDİT</a>

                        </span>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget " id="wid-id-0" data-widget-editbutton="false">

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body ">

                            <div class="col-lg-12" style="margin-bottom:15px">
                                <div class="col-lg-4 col-xs-4">
                                    <small style="font-size:13px;">{{$product->type_name}}</small><br>
                                    <small style="font-size:14px;">KDV %{{$product->vat_rate}}</small><br>
                                    <small style="font-size:14px;">Barkod : {{$product->barcode}}</small>
                                </div>
                                <div class="col-lg-4 col-xs-3"><span class="badge"
                                                            style="background:{{$product->category["color"]}}"> {{$product->category["name"]}} </span></div>
                                <div class="col-lg-4" style="text-align:right"><img
                                            src="{{$product->images->last()["name"] == null ? "/img/noimage.gif":product_img_url($product->images->last()["name"])}}"
                                            width="100px" height="100px;"></div>
                                <hr>
                            </div>



                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->
                <ul id="myTab1" class="nav nav-tabs bordered">
                    <li class="active">
                        <a href="#g1" data-toggle="tab" aria-expanded="true">BİLGİLER</a>
                    </li>

                    <li>
                        <a href="#g2" data-toggle="tab">STOK HAREKETLERİ</a>
                    </li>
                </ul>
                <div id="myTabContent1" class="tab-content padding-10" style="background-color: #fff">
                    <div class="tab-pane fade" id="g1">
                        <small style="font-size:13px;">
                            ----- </small>
                        <br> <small style="font-size:14px;font-weight: 600;"> SATIŞ SİPARİŞİ: 0,00</small>
                        <br><small style="font-size:14px;font-weight: 600;"> SATINALMA SİPARİŞİ: </small>
                        <br> <small style="font-weight: 600">ALIŞ/MALİYET :</small> <small style="color:#886650!important;font-size:14px;font-weight: 600;">0,00<i class="fa fa-try"></i></small>
                        <br>  <small style="font-weight: 600"> LİSTE FİYATI :</small> <small style="color:#2AC!important;font-size:14px;font-weight: 600;">135,00<i class="fa fa-try"></i></small>

                    </div>


                    <div class="tab-pane fade active in" id="g2">
                        <div>
                            <div class="alert alert-info">
                                <span class="fa fa-info-circle"></span>  Hizmet / Ürünün işlem geçmişi yok, geçmiş işlemleri burada görebileceksiniz.
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
            new Vue({
                el: "#show",
                data: {
                    details: false
                },
                methods: {
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

                }
            });
        </script>

    @endpush
@endsection