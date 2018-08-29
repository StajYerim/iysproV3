@extends('layouts.master')
@section('content')
    <section id="customer" v-cloak>
        <div class="row">
            <div class="col-sm-12">
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body ">
                            <form @submit.prevent="formSend" class="form-horizontal">
                                <fieldset class="fixed-title">
                                    <div class="form-group" :class="{'has-error': errors.has('form.company_name') }">
                                        <label class="col-md-3 control-label">
                                            <span style="vertical-align: -9px;">
                                                {{$company_type == "customer" ?  trans("word.customer"):trans("word.supplier")}} {{trans("word.name") }}
                                            </span>
                                        </label>
                                        <div class="col-md-3 pull-right">
                                            <a href="{{$form_type == "new" ? route($company_type=="customer"?"sales.companies.customer":"purchases.companies.supplier",aid()): URL::previous() }}"
                                               class="btn btn-default btn-lg ">
                                                {{trans("word.back")}}
                                            </a>
                                            <button type="submit" href="#" class="btn btn-success btn-lg ">
                                                {{trans("word.save")}}
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <input v-validate="'required'"
                                                   v-model="form.company_name"
                                                   name="form.company_name" type="text" class="form-control"
                                                   AUTOCOMPLETE="OFF"
                                                   style="padding: 22px 12px">
                                        </div>
                                    </div>
                                    <hr>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            {{trans("sentence.short_name")}}
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" v-model="form.company_short_name"/>
                                        </div>

                                        <label class="col-md-1 control-label">
                                            {{trans("sentence.current_code")}}
                                        </label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" v-model="form.char_code"/>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group"  :class="{'has-error': errors.has('form.email') }">
                                        <label class="col-md-3 control-label">
                                            {{trans("word.email")}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" v-model="form.email" name="form.email" v-validate="'email'"/>
                                            @{{ errors.first('form.email') }}
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">
                                            {{trans("word.phone")}}
                                        </label>
                                        <div class="col-md-2">
                                            <phone class="form-control" v-model="form.phone_number"></phone>
                                        </div>


                                        <label class="col-md-2 control-label">
                                            {{trans("word.fax")}}
                                        </label>
                                        <div class="col-md-2">
                                            <phone class="form-control" v-model="form.fax_number"></phone>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">

                                        <label class="col-md-3 control-label">
                                            {{trans("sentence.abroad_address")}}
                                        </label>
                                        <div class=" col-md-2">

                                            <label class="radio radio-inline no-margin">
                                                <input type="radio" v-model="form.address_abroad" value="1"
                                                       class="radiobox "
                                                       v-bind:checked="form.address_abroad == 1"
                                                />
                                                <span>{{trans("word.yes")}}</span>
                                            </label>

                                            <label class="radio radio-inline">
                                                <input type="radio" v-model="form.address_abroad" value="0"
                                                       checked="checked"
                                                       class="radiobox"
                                                       v-bind:checked="form.address_abroad == 0"
                                                />
                                                <span>{{trans("word.no")}}</span>
                                            </label>
                                        </div>
                                        <label class="col-md-2 control-label">
                                            {{trans("sentence.ebilling_taxpayer")}}
                                        </label>
                                        <div class=" col-md-3">

                                            <label class="radio radio-inline no-margin">
                                                <input type="radio" v-model="form.e_invoice_registered" value="1"
                                                       class="radiobox "
                                                       v-bind:checked="form.e_invoice_registered == 1">
                                                <span>{{trans("word.yes")}}</span> </label>

                                            <label class="radio radio-inline">
                                                <input type="radio" v-model="form.e_invoice_registered" value="0"
                                                       v-bind:checked="form.e_invoice_registered == 0"
                                                       class="radiobox "/>
                                                <span>{{trans("word.no")}}</span> </label>


                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("word.district")}}</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" v-model="form.town" id="county"/>
                                        </div>
                                        <label class="col-md-1 control-label">{{trans("word.province")}}</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" v-model="form.city" id="city"/>
                                        </div>

                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("word.contact")}}</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" v-model="form.address" rows="3"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.tax_office_id")}}</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" v-model="form.tax_id"/>
                                        </div>

                                        <label class="col-md-1 control-label">{{trans("sentence.tax_office")}}</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" v-model="form.tax_office"/>
                                        </div>
                                    </div>
                                </fieldset>
                                @includeIf('components.external.tags', [$type="companies"])
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

    @push("scripts")
        <script type="text/x-template" id="phone">
            <input type="text" class="phone" v-model="internalValue" v-on:input="updateValue($event.target.value)"/>
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

        <script>
            window.addEventListener("load", () => {
                const dictionary = {
                    en: {
                        messages: {
                            email: function () {
                                return "Lütfen geçerli bir mail adresi giriniz."
                            }
                        }
                    }
                };
                VeeValidate.Validator.updateDictionary(dictionary);
                Vue.use(VeeValidate);
                Vue.config.debug = true;
                Vue.component('phone', {
                    template: '#phone',
                    props: {
                        value: {
                            type: String,
                            default: ''
                        },
                        mask: {
                            type: String,
                            default: '(999) 999-9999'
                        }
                    },
                    data: function () {
                        return {
                            internalValue: ''
                        };
                    },

                    created: function () {
                        this.internalValue = $.trim(this.value);
                    },

                    mounted: function () {
                        let self = this;
                        $(this.$el).mask('(999) 999-9999').on('keydown change', function () {
                            self.$emit('input', $(this).val());
                        })
                    },
                    methods: {
                        updateValue: function (value) {
                            this.$emit('input', value);
                        }
                    }
                });

             Companies =    new Vue({
                    el: "#customer",
                    data: () => ({
                        autocompleteItems: [@foreach($tags as $tag) {
                            text: '{{$tag->title}}',
                            style: 'background-color:{{$tag->bg_color}}',
                        }, @endforeach],
                        form: {
                            company_name: "{{$form_type == "Update" ? $company->company_name:""}}",
                            company_short_name: "{{$form_type == "Update" ? $company->company_short_name:""}}",
                            char_code: "{{$form_type == "Update" ? $company->char_code:""}}",
                            email: "{{$form_type == "Update" ? $company->address["email"]:""}}",
                            option: '{{$company_type}}',
                            tax_office: "{{$form_type == "Update" ? $company->tax_office:""}}",
                            tax_id: "{{$form_type == "Update" ? $company->tax_id:""}}",
                            e_invoice_registered: "{{$form_type == "Update" ? $company->e_invoice_registered:0}}",
                            address: "{{$form_type == "Update" ? $company->address["address"]:""}}",
                            address_abroad: '{{$form_type == "Update" ? $company->address["address_abroad"]:0}}',
                            town: "{{$form_type == "Update" ? $company->address["town"]:""}}",
                            city: "{{$form_type == "Update" ? $company->address["city"]:""}}",
                            phone_number: "{{$form_type == "Update" ? $company->address["phone_number"]:""}}",
                            fax_number: "{{$form_type == "Update" ? $company->address["fax_number"]:""}}",
                            iban: "{{$form_type == "Update" ? $company->iban:""}}",
                            tag: '',
                            tagsd: [],
                        },
                    }),
                 computed: {
                     filteredItems() {
                         return this.autocompleteItems.filter(i => new RegExp(this.tag, 'i').test(i.text));
                     },
                 },
                    mounted: function () {
                        @if($form_type == "Update")
                            this.form.tagsd.push(@foreach($company->tags as $tag)
                            {
                                style: "background-color:{{$tag->bg_color}}", text: "{{$tag->title}}"
                            },
                                @endforeach());
                        @endif
                        city_and_county();
                    },
                    methods: {
                        formSend: function () {

                            this.$validator.validate().then((result) => {
                                if (result) {
                                    fullLoading();
                                    axios.post('{{route("sales.companies.store",[aid(),$form_type == "Update" ? $company->id:0])}}', this.form,{ tags:[] })
                                        .then(function (response) {
                                            if(response.data.message){
                                            if(response.data.message == "success"){
                                               window.location.href = '/{{aid()}}/{{$company_type=="customer" ? "sales":"purchases"}}/{{$company_type}}/'+response.data.id+'/show';
                                           }else{
                                                fullLoadingClose();
                                                notification("Error", response.data, "danger");
                                            }

                                            }else{
                                               fullLoadingClose();
                                               notification("Error", response.data, "danger");

                                           }
                                        }).catch(function (error) {
                                        fullLoadingClose();
                                        notification("Error", error.response.data.message, "danger");

                                    });

                                } else {
                                    notification("Error", "Lütfen gerekli alanları doldurunuz", "danger");

                                }
                            })


                        }
                    }
                });
            });


        </script>
    @endpush


@endsection