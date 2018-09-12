@extends('layouts.master')
@section('content')
    <div id="content" v-cloak>
        <section id="widget-grid" class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Satış Sipariş Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.sales_orders" >
                                        <span v-bind:style="{'background-color':tag.bg_color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.title}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit" data-toggle="dropdown" data-target=".sales_orders" v-on:click="update_tag(tag.id,tag.bg_color,tag.title,'sales_orders')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                    <div class="btn-group sales_orders " >
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                        </button>
                                        <ul class="dropdown-menu" role="menu" >
                                            <li>
                                                <div class="col-md-12" style="width:324px">
                                                    <div class="form-group">
                                                        <label>Kategori Adı</label>
                                                        <input type="text" class="form-control" v-model="name"  placeholder="Kategori Adını Giriniz">
                                                    </div>
                                                    <div class="form-group">
                                                        <label  >Zemin Rengi</label>
                                                        <ul class="bg-color-list">

                                                            <li v-for="(color,index) in colors"   class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}">
                                                                <i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i>
                                                            </li>

                                                     </ul>

                                                    </div>

                                                    <button type="button" class="btn btn-info tags-save-btn pull-right" v-on:click="add_update(0,'sales_orders',select_color,name)"><i class="fa fa-save"></i> Kaydet</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">

                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Satış Teklif Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.sales_offers" >
                                        <span v-bind:style="{'background-color':tag.bg_color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.title}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit"  data-toggle="dropdown" data-target=".sales_offers" v-on:click="update_tag(tag.id,tag.bg_color,tag.title,'sales_offers')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                <div class="btn-group sales_offers">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                    </button>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <div class="col-md-12" style="width:324px">
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                    <input type="text" class="form-control" v-model="name" name="title" placeholder="Kategori Adını Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                    <ul class="bg-color-list">

                                                        <li v-for="(color,index) in colors" class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}" ><i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i></li>

                                                    </ul>

                                                </div>

                                                <button type="button" class="btn btn-info tags-save-btn pull-right" v-on:click="add_update(0,'sales_offers',select_color,name)"><i class="fa fa-save"></i> Kaydet</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Müşteri/Tedarikçi Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.companies" >
                                        <span v-bind:style="{'background-color':tag.bg_color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.title}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit"  data-toggle="dropdown" data-target=".companies" v-on:click="update_tag(tag.id,tag.bg_color,tag.title,'companies')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                <div class="btn-group companies">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                    </button>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <div class="col-md-12" style="width:324px">
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                    <input type="text" class="form-control" name="title" v-model="name" placeholder="Kategori Adını Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                    <ul class="bg-color-list">

                                                        <li v-for="(color,index) in colors" class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}" ><i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i></li>

                                                    </ul>

                                                </div>

                                                <button type="button" class="btn btn-info tags-save-btn pull-right"  v-on:click="add_update(0,'companies',select_color,name)"><i class="fa fa-save"></i> Kaydet</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">

                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Satın Alma Sipariş Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.purchases_orders" >
                                        <span v-bind:style="{'background-color':tag.bg_color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.title}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit"  data-toggle="dropdown" data-target=".purchases_orders" v-on:click="update_tag(tag.id,tag.bg_color,tag.title,'purchases_orders')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                <div class="btn-group purchases_orders">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                    </button>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <div class="col-md-12" style="width:324px">
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                    <input type="text" class="form-control" v-model="name" name="title" placeholder="Kategori Adını Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                    <ul class="bg-color-list">

                                                        <li v-for="(color,index) in colors" class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}" ><i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i></li>

                                                    </ul>

                                                </div>

                                                <button type="button" class="btn btn-info tags-save-btn pull-right"  v-on:click="add_update(0,'purchases_orders',select_color,name)"><i class="fa fa-save"></i> Kaydet</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Satın Alma Talep Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.purchase_offers">
                                        <span v-bind:style="{'background-color':tag.bg_color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.title}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit" data-toggle="dropdown" data-target=".purchases_offers" v-on:click="update_tag(tag.id,tag.bg_color,tag.title,'purchases_offers')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                <div class="btn-group purchases_offers">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                    </button>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <div class="col-md-12" style="width:324px">
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                    <input type="text" class="form-control" v-model="name" name="title" placeholder="Kategori Adını Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                    <ul class="bg-color-list">

                                                        <li v-for="(color,index) in colors" class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}" ><i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i></li>

                                                    </ul>
                                                </div>

                                                <button type="button" class="btn btn-info tags-save-btn pull-right"  v-on:click="add_update(0,'purchase_offers',select_color,name)" ><i class="fa fa-save"></i> Kaydet</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Gider Fişi Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.expenses" >
                                        <span v-bind:style="{'background-color':tag.bg_color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.title}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit" data-toggle="dropdown" data-target=".expenses" v-on:click="update_tag(tag.id,tag.bg_color,tag.title,'expenses')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                <div class="btn-group expenses">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                    </button>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <div class="col-md-12" style="width:324px">
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                    <input type="text" class="form-control" name="title" v-model="name" placeholder="Kategori Adını Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                    <ul class="bg-color-list">

                                                        <li v-for="(color,index) in colors" class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}" ><i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i></li>

                                                    </ul>
                                                </div>

                                                <button type="button" class="btn btn-info tags-save-btn pull-right"  v-on:click="add_update(0,'expenses',select_color,name)"><i class="fa fa-save"></i> Kaydet</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Ürün Kategorileri</h3>
                                <hr>
                                <ul class="category-tags">
                                    <li v-for="(tag,index) in zones.products" >
                                        <span v-bind:style="{'background-color':tag.color}" style="padding: 1px 5px;border-radius: 5px;color: #fff;">@{{tag.name}}</span>
                                        <a href="#" class="btn btn-xs btn-info islem-btn remove-pro" v-on:click="delete_tag(tag.id,index,1)" style="float:right;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-xs btn-info islem-btn edit"data-toggle="dropdown" data-target=".products" v-on:click="update_tag(tag.id,tag.color,tag.name,'product')" data-id="6" style="float:right;"><i class="fa fa-edit"></i></a>
                                    </li>
                                </ul>


                                <div class="btn-group products">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" @click="clear()">YENİ EKLE

                                    </button>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <div class="col-md-12" style="width:324px">
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                    <input type="text" class="form-control" name="title" v-model="name" placeholder="Kategori Adını Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                    <ul class="bg-color-list">

                                                        <li v-for="(color,index) in colors" class="renkler" @click="handleClick(index,color)"  v-bind:style="{'background-color':color,'cursor':'pointer'}" ><i class="" aria-hidden="true" :class="{'fa fa-check': color == activeIndex}"></i></li>

                                                    </ul>

                                                </div>

                                                <button type="button" class="btn btn-info tags-save-btn pull-right"  v-on:click="add_update(0,'product',select_color,name)"><i class="fa fa-save"></i> Kaydet</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push("style")
        <style>
            .content-title{
                font-size: 18px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .category-tags{
                margin: 0;
                padding: 0;
            }
            .category-tags li{
                list-style: none;
                padding: 0 0 5px 0;
            }
            .category-tags li:hover{
                background-color: rgba(82, 104, 94, 0.23);
            }
            .islem-btn {margin-left: 2px;display: none}
            .category-tags li:hover .islem-btn {
                display: inline-block;
            }
            .bg-color-list{
                margin: 0;
                padding: 0;
            }
            .renkler{
                list-style: none;
                width: 23%;
                float: left;
                padding: 5px;
                margin: 2px;
                text-align: center;
                color: #fff;
                height: 20px;
            }
            .renkler:nth-child(1) i{
                display: block;
            }
            .tags-save-btn{
                margin-top: 10px;
            }
        </style>
     @endpush

    @push("scripts")
    <script>

        tags = new Vue({
            el:"#content",
            data:{
                id:0,
                select_color:"#5cbc68",
                activeIndex:"#5cbc68",
                name:"",
                colors:[],
                zones:{}

            },
            mounted:function(){

                $(document).on('click', '.btn-group .dropdown-menu', function (e) {
                    e.stopPropagation();
                });

                this.tags_data();
                this.clear();

                this.colors.push(@foreach(colors() as $color) '{{$color}}', @endforeach())
            },
            methods:{
                update_tag:function(id,bg_color,title,type){
                    this.clear();
                    this.name = title;
                    this.id = id;
                    this.activeIndex = bg_color;
                    this.select_color = bg_color;


                },
                delete_tag:function(id,index,category=0){

                    swal({
                        text: "Silmek istediğiniz etikete ait tüm veriler 'Kategorisiz' olarak değiştirilecektir.!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                axios.post("{{route("category.tags.delete",aid())}}",{id:id,category:category}).then(res=>{
                                    swal("İşlem Başarılı!", {
                                        icon: "success",
                                    });
                                    tags.tags_data();
                                }).catch(err=>{

                                    swal("İşlem Başarısız!", {
                                        icon: "error",
                                    });
                                })

                            }
                        });
                },
                add_update:function(id,type){
                    $color = this.select_color;
                    if(tags.name != ""){
                    axios.post("{{route("category.tags.add.update",aid())}}",{
                            id:tags.id,
                            title:tags.name,
                            type:type,
                            bg_color:$color
                    }).then(res=>{
                        tags.tags_data();
                        $('[data-toggle="dropdown"]').parent().removeClass('open');
                            tags.clear();

                    });
                    }else{
                        $('[data-toggle="dropdown"]').parent().removeClass('open');
                        tags.clear()

                    }
                },
                handleClick:function(index,color){
                    this.activeIndex = color;
                    this.select_color = color;
               },
                tags_data:function(){
                    axios.get("{{route("category.data",aid())}}").then(res=>{
                        tags.zones = res.data;

                    })
                },
                clear:function(){
                    this.name = ""
                    this.select_color = "#5cbc68";
                    this.activeIndex = "#5cbc68";
                    this.id = 0;

                }
            }
        })

    </script>
    @endpush
@endsection