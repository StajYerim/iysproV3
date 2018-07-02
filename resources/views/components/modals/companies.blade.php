<div class="modal fade" id="{{$type}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" id="companies_form">
            <form @submit.prevent="formCompanySend" class="form-horizontal">
                <div class="modal-body">

                    <fieldset>
                        <div class="form-group" :class="{'has-error': errors.has('form.company_name') }">
                            <label class="col-md-3 control-label"> <span
                                >{{trans('general.customer')}} {{trans("general.name") }}</span></label>
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
                            <label class="col-md-3 control-label">{{trans("general.short")}} {{trans("general.name")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.company_short_name"/>
                            </div>

                            <label class="col-md-3 control-label">Cari Kodu</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.char_code"/>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("Email")}}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="form.email"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("PhoneNumber")}}</label>
                            <div class="col-md-3">
                                <phone class="form-control" v-model="form.phone_number"></phone>
                            </div>


                            <label class="col-md-3 control-label">{{trans("FaxNumber")}}</label>
                            <div class="col-md-3">
                                <phone class="form-control" v-model="form.fax_number"></phone>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("AddressAbroad")}}</label>
                            <div class="col-md-3">

                                <label class="radio radio-inline no-margin">
                                    <input type="radio" v-model="form.address_abroad" value="1"
                                           class="radiobox "
                                           v-bind:checked="form.address_abroad == 1"
                                    />
                                    <span>{{trans("yes")}}</span> </label>

                                <label class="radio radio-inline">
                                    <input type="radio" v-model="form.address_abroad" value="0"
                                           checked="checked"
                                           class="radiobox"
                                           v-bind:checked="form.address_abroad == 0"
                                    />
                                    <span>{{trans("no")}}</span> </label>
                            </div>
                            <label class="col-md-3 control-label">{{trans("EbillingTaxpayer")}}</label>
                            <div class=" col-md-3">

                                <label class="radio radio-inline no-margin">
                                    <input type="radio" v-model="form.e_invoice_registered" value="1"
                                           class="radiobox "
                                           v-bind:checked="form.e_invoice_registered == 1">
                                    <span>{{trans("yes")}}</span> </label>

                                <label class="radio radio-inline">
                                    <input type="radio" v-model="form.e_invoice_registered" value="0"
                                           v-bind:checked="form.e_invoice_registered == 0"
                                           class="radiobox "/>
                                    <span>{{trans("no")}}</span> </label>


                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("Town")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.town" id="county"/>
                            </div>
                            <label class="col-md-3 control-label">{{trans("City")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.city" id="city"/>
                            </div>

                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("ContactAddress")}}</label>
                            <div class="col-md-9">
                                <textarea class="form-control" v-model="form.address" rows="2"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("VKN_TCKN")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.tax_id"/>
                            </div>

                            <label class="col-md-3 control-label">{{trans("TaxOffice")}}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" v-model="form.tax_office"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{trans("IbanNo")}}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" v-model="form.iban">
                            </div>
                        </div>
                    </fieldset>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" data-dismiss="modal" v-on:click="formCompanySend">
                        Save
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
                    option: '{{isset($option)== true ? $option:$act == "in" ? "supplier":"customer"}}',
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
                    this.$validator.validate().then((result) => {
                        if (result) {
                            axios.post('{{route("company.quick.store",[aid(),0])}}', this.form, {tags: []})
                                .then(function (response) {
                                    VueName.form.company_id = {id: response.data.id, text: response.data.text};

                                }).catch(function (error) {

                            });

                        } else {
                            notification("Error", "Please required field", "danger");

                        }
                    });
                    event.target.reset();
                }
            }
        });
    </script>
@endpush
