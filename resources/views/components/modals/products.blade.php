<div class="modal fade" id="{{$type}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" id="products_form">
            <form @submit.prevent="formSend" class="form-horizontal">
                <fieldset style="top: 10px;">
                    <div class="form-group" :class="{'has-error': errors.has('form.name') }">
                        <label class="col-md-3 col-sm-3 control-label"> <span
                                   >{{trans('sentence.product_name')}} </span></label>

                        <div class="col-md-9 col-sm-6">
                            <div class="input-group">

                                <input v-validate="'required'"
                                       v-model="form.name"
                                       type="text" class="form-control"
                                       AUTOCOMPLETE="OFF"
                                       name="form.name"
                                     >
                                <div style="display:none" class="input-group-btn">
                                    <div id="selectpicker" data-selected-country="tr"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{trans("word.barcode")}}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" v-model="form.barcode"/>
                        </div>

                        <label class="col-md-1 control-label">{{trans("word.code")}}</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" v-model="form.code"/>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{trans("word.category")}}</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="dropdown" style="margin-top: 9px;"><a
                                            data-toggle="dropdown" class="dropdown-toggle category"
                                            href="#"
                                            aria-expanded="true">
                                                        <span class="badge "
                                                              style="background-color:{{$form_type == "update" ?  $product->category["color"] == null ? "#999":$product->category["color"]:"#999"}} "> {{$form_type == "update" ? $product->category["name"] == null ? "NOT CATEGORY":$product->category["name"]:"NOT CATEGORY"}} </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-caret category-ul"
                                        style="  min-width: 219px;padding: 7px 9px;margin: 2px 0 0;">
                                        <li>
                                            <div class="input-group">
                                                <input class="form-control" id="new_cat" type="text">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-default new_cat_send"
                                                            type="button">
                                                        New
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        @php    $categories = \App\Model\Stock\Product\Category::where("account_id", aid())->get(); @endphp
                                        @foreach($categories as $cat)
                                            <li style="font-size: 17px;cursor:pointer"
                                                data-id="{{$cat->id}}" class="category-li">
                                                                <span class="badge"
                                                                      style="background:{{$cat->color}}"> {{$cat->name}} </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <label class="col-md-1 control-label">{{trans("word.unit")}}</label>
                        <div class="col-md-3">
                            @php $units = \App\Account::find(aid())->units;@endphp
                            <select v-model="form.unit_id" style="width:100%" class="form-control">
                                <optgroup>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->short_name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </fieldset>


                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" style="margin-top: 34px;">Ürün
                            Resmi </label>
                        <div class="col-md-3">
                            <div class="upload-preview">
                                <img width="156px" height="117px"
                                     src="{{$form_type == "update" ? $product->images()->first()["name"] != null ? "/images/account/".aid()."/product/".$product->images->last()["name"]:"/img/noimage.gif":"/img/noimage.gif"}}">
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 34px;">
                            <input type="file" ref="image" @change="onFileUpload"
                                   class="btn btn-default" id="image-upload"
                                   accept="image/x-png,image/gif,image/jpeg">
                            <button type="button" ref="delete" id="removeImg"
                                    @if($form_type == "update") @if($product->images == "[]") style='display:none'
                                    @endif @else style="display:none" @endif
                                    @click="onFileDelete"
                                    class="btn btn-xs btn-danger"><span class="fa fa-trash"></span>
                                Resmi Sil
                            </button>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            {{ trans("sentence.stock_follow_up") }}
                        </label>
                        <div class="col-md-9">
                            <label class="radio radio-inline">
                                <input type="radio" class="radiobox" value="1"
                                       v-model="form.inventory_tracking">
                                <span>
                                    {{ trans("sentence.it_can_be_done") }}
                                </span>
                            </label>
                            <label class="radio radio-inline">
                                <input type="radio" class="radiobox style-3" value="0" checked="checked"
                                       v-model="form.inventory_tracking">
                                <span>
                                    {{ trans("sentence.it_can_not_be_done") }}
                                </span>
                            </label>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">

                        <label class="col-md-3 control-label">
                            {{ trans("sentence.stock_type") }}
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" v-model="form.type_id">
                                @foreach(product_type_list() as $type)
                                    <option value="{{$type["id"]}}">{{$type["name"]}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"
                             v-show="form.type_id === '3' || form.type_id === '1' || form.type_id ==='4'">
                            <label> Alış Fiyatı</label>
                            <div class="input-group">
                                <input type="text" class="form-control money2" value="0,00"
                                       autocomplete="OFF" v-model.lazy="form.buying_price">
                                <div class="input-group-btn">
                                    @php $currency = \App\Currency::all();@endphp
                                    <select v-model="form.buying_currency" class="buying_currency">
                                        @foreach($currency as $cur)
                                            <option value="{{$cur->id}}">{{$cur->icon}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4"
                             v-show="form.type_id === '3' || form.type_id === '2'">
                            <label> Satış Fiyatı</label>
                            <div class="input-group">
                                <input type="text" class="form-control money1" value="0,00"
                                       autocomplete="OFF" v-model.lazy="form.list_price">
                                <div class="input-group-btn">
                                    <select v-model="form.currency" class="price_currency">
                                        @foreach($currency as $cur)
                                            <option value="{{$cur->id}}">{{$cur->icon}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>


                        <div class="col-md-2">
                            <div class="form-group"
                                 :class="{'has-error': errors.has('form.vat_rate') }">
                                <label> {{ trans("word.tax") }}</label>
                                <select type="text" v-validate="'required'" name="form.vat_rate"
                                        class="form-control" v-model="form.vat_rate">
                                    <option disabled value="">Vat Select</option>
                                    @foreach(vat_list() as $vat)
                                        <option value="{{$vat["id"]}}">{{$vat["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("word.cancel") }}</button>
                    <button type="submit" class="btn btn-success"  v-on:click="formSend">
                        {{ trans("word.save") }}
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
@push("scripts")
    <script src="{{asset("/js/flager/js/jquery.flagstrap.min.js")}}"></script>
    <script src="{{asset("/js/boost-select/js/bootstrap-select.js")}}"></script>
    <script>
        window.addEventListener("load", () => {
            let stock = new Vue({
                el: "#products_form",
                data: () => ({
                    color: false,
                    image_name: "{{$form_type == "update" ? $product->images->last()["name"] != null ? $product->images->last()["name"]:"":""}}",
                    form: {
                        name: "{{$form_type == "update" ? $product->lang($product->id,"tr"):""}}",
                        name_lang: "tr",
                        barcode: '{{$form_type == "update" ? $product->barcode:""}}',
                        category_id: '{{$form_type == "update" ? $product->category["id"]:null}}',
                        code: '{{$form_type == "update" ? $product->code:""}}',
                        vat_rate: '{{$form_type == "update" ? $product->vat_rate:""}}',
                        unit_id: '{{$form_type == "update" ? $product->unit_id:"1"}}',
                        image_id: '',
                        type_id: '{{$form_type == "update" ? $product->type_id:"3"}}',
                        inventory_tracking: '{{$form_type == "update" ? $product->inventory_tracking:"0"}}',
                        buying_currency: '{{$form_type == "update" ? $product->buying_currency:"1"}}',
                        currency: '{{$form_type == "update" ? $product->currency:"1"}}',
                        buying_price: '{{$form_type == "update" ? $product->buying_price:"0,00"}}',
                        list_price: '{{$form_type == "update" ? $product->list_price:"0,00"}}'
                    }

                }),
                watch: {
                    "form.buying_price": function (yeni, eski) {
                        this.form.buying_price = money(yeni);

                    },
                    "form.list_price": function (yeni, eski) {


                        this.form.list_price = money(yeni);
                    }
                },
                mounted: function () {

                    money_per();


                    @if($form_type == "update")
                    $('.buying_currency').val('{{$product->buying_currency}}');
                    $('.price_currency').val('{{$product->currency}}');
                    @endif
                    $('.price_currency').selectpicker();
                    $('.buying_currency').selectpicker();


                    $('#selectpicker').flagStrap({
                        countries: {
                            "tr": "",
                            "us": "",
                            "sa": ""
                        },
                        placeholder: {value: "", text: ""},
                        onSelect: function (value, element) {
                            @if($form_type== "update")
                            axios.post('{{route("stock.product.language",aid())}}', {
                                code: value,
                                product_id: '{{$product->id}}'
                            })
                                .then(function (response) {
                                    stock.form.name = response.data
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                            @endif
                                stock.form.name_lang = value
                        }
                    });


                    //Select2 work
                    $('.select2').select2({language: "tr"}).on("change", function (e) {
                        stock.form.unit_id = $(this).val();
                    });

                    //Upload Image
                    let preview = $(".upload-preview");

                    $("#image-upload").change(function (event) {
                        let input = $(event.currentTarget);
                        let file = input[0].files[0];
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            image_base64 = e.target.result;

                            preview.html("<img width='156px' height='117px' src='" + image_base64 + "'/>");
                            $("#removeImg").show();
                        };
                        reader.readAsDataURL(file);
                    });

                    //Remove Image
                    $("#removeImg").click(function () {
                        preview.html('<img width="156px" height="117px" src="/img/noimage.gif">');
                        $(this).hide();
                        $("#image-upload").val("");
                    });

                    //Money Mask Function


                    //Category autocomplete

                    $(".new_cat_send").on("click", function () {
                        let cat_name = $("#new_cat");
                        if (cat_name.val() != "")
                            axios.post('{{route("stock.product.new_category",aid())}}', {
                                name: cat_name.val()
                            })
                                .then(function (response) {
                                    cat_name.val("");
                                    span = '<span class="badge"  style="background-color:' + response.data.color + '">' + response.data.name + '</span>';

                                    $(".category").html(span);
                                    if ($('li[data-id="' + response.data.id + '"]').length == 0) {
                                        $(".category-ul").append('<li data-id="' + response.data.id + '" class="category-li" style="font-size: 17px; cursor: pointer;">' + span + '</li>')
                                    }
                                    stock.form.category_id = response.data.id;

                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                    });

                    $(function () {


                        $(".category-li").on("click", function () {
                            $(".category").html($(this).html());
                            data_id = $(this).data("id");

                            stock.form.category_id = data_id;
                        });

                    });

                },
                methods: {
                    onFileUpload() {
                        this.image = this.$refs.image.files[0];

                        let formData = new FormData();
                        formData.append('image', this.image);

                        axios.post('{{route("stock.image.upload",aid())}}', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                            .then(function (response) {
                                stock.image_name = response.data[0]["image"];
                                stock.form.image_id = response.data[0]["id"];
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                        if (this.image_name != null) {
                            // no process
                        }
                    },
                    onFileDelete: function () {

                        axios.post('{{route("stock.image.delete",aid())}}', {
                            id: this.image_name
                        })
                            .then(function (response) {
                                stock.image_name = null;
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    },
                    formSend: function () {


                        this.$validator.validate().then((result) => {
                            if (result) {
                                fullLoading();
                                axios.post('{{route("stock.product.store",[aid(),$form_type == "update" ? $product->id:0])}}', this.form)
                                    .then(function (response) {
                                        if (response.data.message) {
                                            if (response.data.message == "success") {
                                                window.location.href = '/{{aid()}}/stocks/product/' + response.data.id + "/show";
                                                fullLoadingClose();
                                            }

                                        } else {
                                            fullLoadingClose();
                                            notification("Error", response, "danger");

                                        }
                                    }).catch(function (error) {
                                    fullLoadingClose();
                                    notification("Error", error.response.data.message, "danger");

                                });

                            } else {
                                notification("Error", "Please required field", "danger");
                            }
                        })


                    }
                }
            });
        });
    </script>
@endpush


