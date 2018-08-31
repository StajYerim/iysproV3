@extends('layouts.master')
@section('content')
    <div id="content">
        <section id="widget-grid" class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="well" style="padding-top: 0px">
                                <h3 class="content-title"><i class="fa fa-folder fa-15x c-textLight"></i> Satış Etiketleri</h3>
                                <hr>
                                <ul class="category-tags">

                                </ul>


                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">YENİ EKLE

                                        </button>
                                        <ul class="dropdown-menu" role="menu" >
                                            <li>
                                                <div class="col-md-12" style="width:324px">
                                                    <div class="form-group">
                                                        <label label-default="" for="exampleInputEmail1">Kategori Adı</label>
                                                        <input type="text" class="form-control" name="title" placeholder="Kategori Adını Giriniz">
                                                    </div>
                                                    <div class="form-group">
                                                        <label label-default="" for="exampleInputPassword1">Zemin Rengi</label>
                                                        <ul class="bg-color-list">

                                                            <li v-for="color in colors" class="renkler"  v-bind:style="{'background-color':color,'cursor':'pointer'}" v-on:click="color_select"><i class="fa fa-check" aria-hidden="true"></i></li>

                                                     </ul>
                                                        <input type="hidden" name="bg_color" class="bg_color" value="#5cbc68">
                                                        <input type="hidden" name="type" class="type" value="1">
                                                    </div>

                                                    <button type="button" class="btn btn-info tags-save-btn pull-right"><i class="fa fa-save"></i> Kaydet</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">



                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-4">


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">



                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">


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
            .renkler i {
                display: none;
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
                colors:[],
                sales_offer:{
                    isActive,
                }
            },
            mounted:function(){
                $(document).on('click', '.btn-group .dropdown-menu', function (e) {
                    e.stopPropagation();
                });

                $('.renkler').click(function () {
                let renk = $(this).data('color');
                $(this).parent().find('.fa.fa-check').hide();
                $(this).find('.fa.fa-check').css('display','block');
                $(this).parent().parent().find('.bg_color').val(renk);
            });

                this.colors.push(@foreach(colors() as $color) '{{$color}}', @endforeach())
            },
            methods:{
                color_select:function(){

                }
            }
        })











//        function TagsOptions() {
//            $('.renkler').click(function () {
//                var renk = $(this).data('color');
//                $(this).parent().find('.fa.fa-check').hide();
//                $(this).find('.fa.fa-check').css('display','block');
//                $(this).parent().parent().find('.bg_color').val(renk);
//            });
//
//            $('.tags-save-btn').click(function () {
//                var form = $(this).parent().parent().parent().parent().parent();
//
//                $.ajax({
//                    method: "POST",
//                    url: "",
//                    data: form.serialize(),
//                    success: function (res) {
//                        if (res.update == false) {
//                            form.parent().find('ul.category-tags').append('<li><span style="background-color: '+res.request.bg_color+';padding: 1px 5px;border-radius: 5px;color:#fff">'+res.request.title+'</span>' +
//                                '<a href="#" class="btn btn-xs btn-info islem-btn remove-pro" data-id="'+res.request.id+'" onclick="$(this).removeRow();" style="float:right;"><i class="fa fa-trash-o"></i></a>' +
//                                '<a href="#" class="btn btn-xs btn-info islem-btn edit" onclick="TagsOptions();" data-id="'+res.request.id+'" style="float: right;"><i class="fa fa-edit"></i></a> ' +
//                                '</li>');
//                            $('[data-toggle="dropdown"]').parent().removeClass('open');
//                            $('.bg_color').val('#5cbc68');
//                            $('.renkler i').hide();
//                            $('.renkler:nth-child(1) i').show();
//                        } else {
//                            form.parent().find('ul.category-tags li a[data-id='+res.request.id+']').parent().find('span').html(res.request.title).css('background-color',res.request.bg_color);
//                            $('[data-toggle="dropdown"]').parent().removeClass('open');
//                            $('.bg_color').val('#5cbc68');
//                            $('.renkler i').hide();
//                            $('.renkler:nth-child(1) i').show();
//                        }
//                    }
//                });
//            });
//
//            $('.remove').click(function () {
//                var id = $(this).data('id');
//                var el = $(this).parent();
//                $.ajax({
//                    method: "POST",
//                    data: {id: id},
//                    dataType: "JSON",
//                    url: "",
//                    success:function () {
//                        el.remove();
//                    }
//                });
//            })
//
//            $('.edit').click(function (e) {
//                var id = $(this).data('id');
//                e.stopImmediatePropagation();
//                $(this).parent().parent().parent().find('form .btn-group .dropdown-toggle').dropdown('toggle');
//                $(this).parent().parent().parent().find('form .update').remove();
//                var editName = $(this).parent().find('span').html();
//                $(this).parent().parent().parent().find('form .btn-group ul.dropdown-menu li div .form-group .form-control').val(editName);
//                $(this).parent().parent().parent().find('form').append('<input type="hidden" class="update" name="update" value="'+id+'">');
//
//            })
//        }
//
//        function dropdownStatus() {
//            $('.dropdown-toggle').click(function (eventObject) {
//                console.log("det")
//                $(this).parent().parent().find('.update').remove('input.update');
//                $(this).parent().find('.form-control').val('');
//                $(this).parent().find('.bg_color').val('#5cbc68');
//            })
//        }
//
//        (function ($) {
//            $.fn.removeRow = function () {
//                var id = $(this).data('id');
//                var domRemove = $(this).parent();
//                $.SmartMessageBox({
//                    title : "Uyarı!",
//                    content : "Sildiğiniz kategoriye ait veriler kategorisiz olarak değiştirilecektir",
//                    buttons : '[Vazgeç][Sil]'
//                }, function(ButtonPressed) {
//                    if (ButtonPressed === "Sil") {
//                        $.ajax({
//                            method: "POST",
//                            data: {id:id},
//                            dataType: "json",
//                            url: "",
//                            success: function () {
//                                domRemove.remove();
//                                $.smallBox({
//                                    title : "Başarılı",
//                                    content : "<i class='fa fa-clock-o'></i> <i>Etiket silinmiştir.</i>",
//                                    color : "#659265",
//                                    iconSmall : "fa fa-check fa-2x fadeInRight animated",
//                                    timeout : 4000
//                                });
//                            }
//                        })
//
//                    }
//
//                });
//            };
//        })(jQuery);
//
//        TagsOptions();
//        dropdownStatus();
    </script>
    @endpush
@endsection