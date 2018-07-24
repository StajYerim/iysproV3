<div class="modal fade" id="{{$type}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" id="companies_form">
            <form @submit.prevent="formCompanySend" class="form-horizontal">
                <div class="modal-body">

                    <fieldset>
                        <div class="form-group" :class="{'has-error': errors.has('form.company_name') }">
                            <label class="col-md-3 control-label">
                                <span>
                                    {{trans('sentence.customer_name')}}
                                </span>
                            </label>
                            <div class="col-md-9">
                                <input v-validate="'required'"
                                       v-model="form.company_name"
                                       name="form.company_name" type="text" class="form-control"
                                       AUTOCOMPLETE="OFF"
                                >
                            </div>
                        </div>
                        <hr>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("sentence.short_name")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.company_short_name"/>
                            </div>

                            <label class="col-md-3 control-label">
                                {{trans('sentence.current_code')}}
                            </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.char_code"/>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("word.email")}}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="form.email"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("word.phone")}}</label>
                            <div class="col-md-3">
                                <phone class="form-control" v-model="form.phone_number"></phone>
                            </div>


                            <label class="col-md-3 control-label">{{trans("word.fax")}}</label>
                            <div class="col-md-3">
                                <phone class="form-control" v-model="form.fax_number"></phone>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("sentence.abroad_address")}}</label>
                            <div class="col-md-3">

                                <label class="radio radio-inline no-margin">
                                    <input type="radio" v-model="form.address_abroad" value="1"
                                           class="radiobox "
                                           v-bind:checked="form.address_abroad == 1"
                                    />
                                    <span>{{trans("word.yes")}}</span> </label>

                                <label class="radio radio-inline">
                                    <input type="radio" v-model="form.address_abroad" value="0"
                                           checked="checked"
                                           class="radiobox"
                                           v-bind:checked="form.address_abroad == 0"
                                    />
                                    <span>{{trans("word.no")}}</span> </label>
                            </div>
                            <label class="col-md-3 control-label">{{trans("sentence.ebilling_taxpayer")}}</label>
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
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.town" id="county"/>
                            </div>
                            <label class="col-md-3 control-label">{{trans("word.province")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.city" id="city"/>
                            </div>

                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("sentence.contact_address")}}</label>
                            <div class="col-md-9">
                                <textarea class="form-control" v-model="form.address" rows="2"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("sentence.tax_office_id")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.tax_id"/>
                            </div>

                            <label class="col-md-3 control-label">{{trans("sentence.tax_office")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.tax_office"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("word.cancel") }}</button>
                    <button type="submit" class="btn btn-success" data-dismiss="modal" v-on:click="formCompanySend">
                        {{ trans("word.save") }}
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

@push("scripts")
    <script type="text/x-template" id="phone">
        <input type="text" class="phone" v-model="internalValue" v-on:input="updateValue($event.target.value)"/>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script>
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

        Companies = new Vue({
            el: '#companies_form',
            data: () => ({

                form: {
                    company_name: "",
                    company_short_name: "",
                    char_code: "",
                    email: "",
                    option: '{{$option}}',
                    tax_office: "",
                    tax_id: "",
                    e_invoice_registered: 0,
                    address: "",
                    address_abroad: 0,
                    town: "",
                    city: "",
                    phone_number: "",
                    fax_number: "",
                    iban: "",
                },

            }),
            mounted: function () {
                city_and_county();
            },
            methods: {

                formCompanySend: function (event) {
                    eventing = event
                    this.$validator.validate().then((result) => {
                        if (result) {
                            axios.post('{{route("company.quick.store",[aid(),0])}}', this.form, {tags: []})
                                .then(function (response) {

                                    if(response.data.id){
                                        VueName.form.company_id = {id: response.data.id, text: response.data.text};
                                    }else{

                                        notification("Error",response.data,"danger");

                                    }
                                }).catch(function (error) {

                            });

                        } else {
                            notification("Error", "Please required field", "danger");

                        }
                    });

                }
            }
        });
    </script>
@endpush
