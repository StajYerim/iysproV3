@extends('layouts.master')
@section('content')
    <!-- widget grid -->
    <section id="show" v-cloak>
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <h1><i class="fa fa-file-text-o"></i> <span class="semi-bold">{{$order->descriptions}}</span></h1>

            </div>
            <div class="col-lg-4 col-sm-4">

                <div class="btn-group btn-group-justified pull-right option-menu">
                    <div class="btn-group ">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-reorder"></span> &nbsp;<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route("sales.orders.form",[aid(),$order->id,"update"])}}"><i
                                            class="fa fa-edit" aria-hidden="true"></i>
                                    {{trans("word.edit")}}</a>
                            </li>
                            <li>
                                <a href="#!" v-if="remaining !='0,00'"  data-toggle="modal" data-target="#transaction"><i
                                            class="fa fa-edit" aria-hidden="true"></i>
                                    {{trans("sentence.add_collection")}}</a>
                            </li>
                            <li>
                                <a href="{{route("sales.orders.form",[aid(),$order->id,"copy"])}}"><i class="fa fa-copy"
                                                                                                      aria-hidden="true"></i>
                                    {{trans("sentence.create_copy")}}</a>
                            </li>

                            <li>
                                <a tabindex="-1" data-toggle="modal" data-target="#transModal" href="#"><i class="fa fa-truck"  aria-hidden="true"></i>
                                   Sevkiyat Bilgisi Gönder</a>
                            </li>
                            <li>
                                <a onclick="$(this).orderReturn()" data-id="0" id="orderReturn" href="#"><i
                                            class="fa fa-reply " aria-hidden="true"></i>
                                    {{trans("sentence.convert_to_order")}}</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"
                                                                                              aria-hidden="true"></i>
                                    {{trans("word.delete")}}</a>
                            </li>

                        </ul>

                    </div>
                    <div class="btn-group">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-print"></span> {{trans("general.print")}} <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">  <i class="fa fa-print" aria-hidden="true"></i> {{trans("sentence.print_order")}}</a>
                                <ul class="dropdown-menu"  style="   right: 158px;top: 5px;">
                                    @foreach($langs as $lang)
                                        <li><a tabindex="-1" target="_blank" href="{{route("sales.orders.pdf",[aid(),$order->id,"url",$lang->lang_code])}}"> <img src="https://dev.iyspro.com/img/blank.gif" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}"> {{$lang->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">   <i class="fa fa-print" aria-hidden="true"></i> {{trans("sentence.download_order")}} </a>
                                <ul class="dropdown-menu"  style="   right: 158px;top: 5px;">
                                    @foreach($langs as $lang)
                                        <li><a tabindex="-1" target="_blank" href="{{route("sales.orders.pdf",[aid(),$order->id,"url",$lang->lang_code])}}" > <img src="https://dev.iyspro.com/img/blank.gif" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}"> {{$lang->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="">
                                <a class="test" tabindex="-1"  data-toggle="modal" data-target="#waybillModal" href="#">   <i class="fa fa-print" aria-hidden="true"></i> {{trans("sentece.print_waybill")}} </a>
                            </li>
                            <li class="">
                                <a class="test" tabindex="-1" data-toggle="modal" data-target="#invoiceModal" href="#">
                                    <i class="fa fa-print" aria-hidden="true"></i> {{trans("sentence.print_invoice")}} </a>
                            </li>
                        </ul>

                    </div>

                    <a href="#" data-toggle="modal" data-target="#shareModal" class="btn btn-default"><i
                                class="fa fa-envelope"></i> {{trans("word.share")}}</a>

                </div>


            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="row">
                    <div class="col-sm-8">

                        <div class="well">

                            <div class="row">
                                <div class="col-sm-5" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-building-o"></i> <a
                                            href="{{route("sales.companies.show",[aid(),$order->company["id"]])}}">{{$order->company["company_name"] == null ? "Belirtilmedi":$order->company["company_name"]}}</a>
                                </div>
                                <div class="col-sm-3" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-calendar"></i> {{$order->date}}</div>
                                <div class="col-sm-3" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-calendar"></i> {{$order->due_date}}</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive ">

                                        <table class="table table-hover table-condensed table-no-padding">

                                            <tbody>
                                            <tr>
                                                <th width="33%">{{trans("word.service")}} / {{trans("word.product")}}</th>
                                                <th width="14%">{{trans("word.quantity")}}</th>
                                                <th width="10%" style="text-align:right">{{trans("word.unit")}} F.</th>
                                                <th width="10%" style="text-align:right">{{trans("word.vat")}}</th>
                                                <th width="10%" style="text-align:right">{{trans("word.total")}}</th>
                                            </tr>

                                            </tbody>
                                            <tbody>

                                            <tr v-for="item in items" v-bind:class="item.waybill">
                                                <td>
                                                    @{{ item.product }}
                                                </td>

                                                <td>@{{ item.quantity }} @{{ item.unit }}</td>
                                                <td style="text-align:right">@{{ item.price }} <i
                                                            class='fa fa-{{$order->currency}}'></i></td>
                                                <td align="right">%@{{item.vat}}</td>
                                                <td style="text-align:right"> @{{ item.total }} <i
                                                            class="fa fa-{{$order->currency}}"></i></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6">

                                            <table class="table table-condensed table-striped" width="100%" border="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("sentence.sub_total")}}</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$order->sub_total}} <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>


                                                <tr v-for="vato in vat_only" class="trow"
                                                    v-if="vato.total!=0">

                                                    <td style="border-top: 0px;">
                                                        <div class="bottom-info" style="font-size: 11px" >{{trans("sentence.total_vat")}} @{{
                                                            vato.name }}
                                                        </div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info" style="font-size: 11px"><span
                                                                    id="total-vat-1">@{{ vato.total }}</span> <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("sentence.total_vat")}}</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$order->vat_total}} <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("sentence.general_total")}}</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info"
                                                             style="color:#2AC!important">{{$order->grand_total}}
                                                            <i class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                @if($order->currency != "try")
                                                    <tr>
                                                        <td>
                                                            <div class="bottom-info">TL KARŞILIĞI</div>
                                                        </td>
                                                        <td style="text-align:right">
                                                            <div class="bottom-info"
                                                                 style="color:#2AC!important">{{$order->tl_convert}}
                                                                <i class="fa fa-try"></i></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="text-align:right">
                                                            <div class="bottom-info" style="color:#2AC!important">1 <i
                                                                        class="fa fa-{{$order->currency}}"></i>
                                                                = {{$order->currency_value}} <i class="fa fa-try"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>

                                            <table class="table">
                                                <tfoot>
                                                <tr>
                                                    <td width="5%"></td>
                                                    <td width="40%"></td>
                                                    <td></td>
                                                    <td>{{trans("word.remaining")}}</td>
                                                    <td><span class="pull-right">@{{ remaining }} <i class="fa fa-{{$order->currency}}"></i></span></td>
                                                </tr>
                                                </tfoot>
                                                <tbody>

                                                    <tr v-for="item in collect_items"   class="success" style="cursor: pointer;" @click="redirect(item.id,item.type)">
                                                        <td>  <i class="fa fa-sign-in fa-rotate-90 "></i></td>
                                                        <td>@{{item.date}} </td>
                                                        <td></td>
                                                        <td>@{{item.bank_account}}</td>
                                                        <td> <span class="pull-right">@{{item.amount}} <i class="fa fa-{{$order->currency}}"></i></span></td>
                                                    </tr>


                                                </tbody>
                                            </table>



                                    </div>


                                </div>



                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div id="order_info" class="well">
                            <div id="short_info" class="col-12">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="bottom-info">{{trans("sentence.order_amount")}}<span class="pull-right"
                                                                                   style="font-size:15px;color:#2AC!important">{{$order->grand_total}}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="bottom-info">{{trans("sentence.remaining_amount")}}<span class="pull-right"
                                                                                     style="font-size:15px;color:#2AC!important">@{{ remaining }}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>


                                </div>
                              <hr>

                                @if($order->invoice)

                                    <div class="row">
                                        <div class="col-sm-12"> <span class="pull-right">

                                        <a href="{{route("sales.invoice.print",[aid(),$order->id])}}" target="_blank"
                                           class="btn btn-primary btn-circle" title="Fatura Yazdır!"><i
                                                    class="glyphicon glyphicon-print"></i></a>
                                        <a href="javascript:void(0);"
                                           @click="deleteInvoice('{{$order->invoice["id"]}}')"
                                           class="btn btn-danger btn-circle" title="Fatura Kaydını Sil!"><i
                                                    class="glyphicon glyphicon-remove"></i></a>
                                    </span>
                                            <strong>Fatura Bilgileri</strong><br>
                                            {{$order->invoice["seri"]}} {{$order->invoice["number"]}}
                                            <b>Tarih: </b>{{$order->invoice["date"]}} {{$order->invoice["clock"]}}

                                        </div>
                                    </div>
                                    <hr>
                                @endif

                                @if($order->offer)
                                    <div class="col-sm-12">
                                        {{trans("word.offer")}}
                                        <br>
                                        <a href="{{route("sales.offers.show",[aid(),$order->offer["id"]])}}"> {{$order->offer["description"] == null ? "SATIŞ TEKLİFİ":$order->offer["description"]}}
                                            (#{{$order->offer["id"]}})</a><br>
                                    </div>
                                    <hr>
                                @endif


                                <div class="row">
                                    @if($order->waybills->count() > 0)
                                        <table class="table table-condensed table-hover">
                                            <thead>
                                            <tr>
                                                <th>{{trans("sentence.waybill_number")}}</th>
                                                <th>{{trans("sentence.edit_date")}}</th>
                                                <th>{{trans("word.dispatch")}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->waybills as $waybill)
                                                <tr onmouseover="this.style.cursor='pointer'" @click="waybill_process('{{$waybill->id}}','{{$waybill->number}}')" style="cursor: pointer;">
                                                    <td>{{$waybill->number}}</td>
                                                    <td>{{$waybill->edit_date}}</td>
                                                    <td>{{$waybill->dispatch_date}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <hr>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </article>
        </div>

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete sales order ?",$id=$order->id])
        {{--İrsaliye Yazdır--}}
        <div class="modal fade" id="waybillModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">{{trans("sentence.print_waybill")}}</h4>
                    </div>
                    <div class="modal-body modal-body-content">
                        @if(count($order->no_waybills))
                            <div class="row">
                                <form id="wizard-1" novalidate="novalidate">
                                    <div id="bootstrap-wizard-1" class="col-sm-12">
                                        <div class="form-bootstrapWizard">
                                            <ul class="bootstrapWizard form-wizard" style="width: 127%;">
                                                <li class="active" data-target="#step1">
                                                    <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span
                                                                class="title">{{trans("sentence.product_selection")}}</span> </a>
                                                </li>
                                                <li data-target="#step2">
                                                    <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span
                                                                class="title">{{trans("sentence.waybill_informations")}}</span> </a>
                                                </li>
                                                <li data-target="#step3">
                                                    <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span
                                                                class="title">{{trans("word.print")}}</span> </a>
                                                </li>

                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <br>
                                                <br>

                                                <div class="row">
                                                    <br><br>
                                                    <div style="background: #fff; margin: -20px -1px 0px 0px;font-size: 13px;font-weight: 600;"
                                                         class="table-responsive">
                                                        <table class="table">

                                                            <tbody>

                                                            <tr v-for="item in waybill.items">
                                                                <td>
                                                                    @{{ item.product }}
                                                                </td>

                                                                <td>@{{ item.quantity }} @{{ item.unit }}</td>

                                                                <td>
                                                                    <div class="checkbox"
                                                                         style="margin-top:0px;margin-bottom:0px;">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                   v-model='item.selected'
                                                                                   class="checkbox style-3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>


                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">
                                                                {{trans("sentence.waybill_number")}}
                                                            </label>
                                                            <div class="col-md-6 ">
                                                                <div class="input-group">
                                                                    <input style="width: 266px;" type="text"
                                                                           v-model="waybill.number"
                                                                           class="form-control"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <hr>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">
                                                                {{trans("sentence.edit_date")}}
                                                            </label>
                                                            <div class="col-md-6 ">
                                                                <div class="input-group">
                                                                    <the-mask @change="setDate(waybill.edit_date)" :mask="['##.##.####']" type="text" name="waybill.edit_date"
                                                                              v-validate="'required'" class="form-control datepicker"
                                                                              v-model="waybill.edit_date"></the-mask>
                                                                    <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                        <hr>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">
                                                                {{trans("sentence.dispatch_date")}}
                                                            </label>
                                                            <div class="col-md-6 ">
                                                                <div class="input-group">
                                                                    <the-mask @change="setDate(waybill.edit_date)" :mask="['##.##.####']" type="text" name="waybill.dispatch_date"
                                                                              v-validate="'required'" class="form-control datepicker"
                                                                              v-model="waybill.dispatch_date"></the-mask>
                                                                    <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                    <hr>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="" class="col-md-4 control-label">
                                                                {{trans("sentence.waybill_note")}}
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <input type="text" style="width: 354px;"
                                                                           v-model="waybill.description"
                                                                           value=""
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <br>
                                                <br>
                                                <br>
                                                <h1 class="text-center"><strong>
                                                        <center>
                                                            <a type="button" class="btn btn-success btn-lg"
                                                               @click="waybill_print"
                                                               data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> İşlem Tamamlandı. Yazdırılıyor..."
                                                               id="WaybillButton"><i class="fa fa-check"></i>
                                                                {{trans("word.print")}}</a>
                                                        </center>
                                                    </strong></h1>
                                                <br>
                                                <br>
                                            </div>


                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <ul class="pager wizard no-margin">
                                                            <!--<li class="previous first disabled">
                                                            <a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
                                                            </li>-->
                                                            <li class="previous disabled">
                                                                <a href="javascript:void(0);"
                                                                   class="btn btn-lg btn-default">
                                                                    {{trans("word.back")}} </a>
                                                            </li>
                                                            <!--<li class="next last">
                                                            <a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
                                                            </li>-->
                                                            <li class="next">
                                                                <a href="javascript:void(0);"
                                                                   class="btn btn-lg txt-color-darken"> {{trans("word.next")}} </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        @else
                            {{trans("sentence.waybills_of_all_products")}}
                        @endif


                    </div>
                </div>
            </div>
        </div>
        {{--İrsaliye Yazdır--}}

        {{--Fatura Yazdır--}}
        <div class="modal fade" id="invoiceModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">{{trans("print.invoice")}}</h4>
                    </div>
                    <div class="modal-body modal-body-content">

                        <div class="row">
                            <form id="wizard-2" novalidate="novalidate">
                                <div id="bootstrap-wizard-2" class="col-sm-12">
                                    <div class="form-bootstrapWizard">
                                        <ul class="bootstrapWizard form-wizard" style="width: 200%;">
                                            <li class="active" data-target="#step6">
                                                <a href="#tab6" data-toggle="tab"> <span class="step">1</span> <span
                                                            class="title">{{trans("sentence.billing_informations")}}</span> </a>
                                            </li>
                                            <li data-target="#step7">
                                                <a href="#tab7" data-toggle="tab"> <span class="step">2</span> <span
                                                            class="title">{{trans("word.print")}}</span> </a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab6">
                                            <br>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label style="top:6px;" class="col-md-3 control-label">
                                                        {{trans("sentence.invoice_number")}}
                                                    </label>
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">{{trans("word.serial")}}</span>
                                                            <input class="form-control" v-model="invoice.seri"
                                                                   value="{{$order->SalesInvoiceSeri}}" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">NO</span>
                                                            <input class="form-control" v-model="invoice.number"
                                                                   value="{{$order->SalesInvoiceNumber}}"
                                                                   type="text">
                                                        </div>

                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <div class="form-group">
                                                    <label style="top:6px;"
                                                           class="col-md-3 control-label">{{trans("word.date")}}/{{trans("word.hour")}}</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <the-mask @change="setDate(invoice.date)"
                                                                      :mask="['##.##.####']" type="text"
                                                                      name="invoice.date"
                                                                      v-validate="'required'"
                                                                      class="form-control datepicker"
                                                                      v-model="invoice.date"></the-mask>
                                                            <span class="input-group-addon"><i
                                                                        class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input class="form-control" id="clockpicker" type="text"
                                                                   v-model="invoice.clock"
                                                                   data-autoclose="true">
                                                            <span class="input-group-addon"><i
                                                                        class="fa fa-clock-o"></i></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <br><BR>

                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">
                                                            {{trans("sentence.expiry_date")}}
                                                        </label>
                                                        <div class="col-md-7 ">
                                                            <div class="input-group">
                                                                <the-mask @change="setDate(invoice.due_date)"
                                                                          :mask="['##.##.####']" type="text"
                                                                          name="invoice.due_date"
                                                                          v-validate="'required'"
                                                                          class="form-control datepicker"
                                                                          v-model="invoice.due_date"></the-mask>
                                                                <div class="btn-group btn-group-justified">

                                                                    <a href="javascript:void(0);" id="day7"
                                                                       class="btn btn-default">7
                                                                        GÜN</a>
                                                                    <a href="javascript:void(0);" id="day14"
                                                                       class="btn btn-default">14 GÜN</a>
                                                                    <a href="javascript:void(0);" id="day30"
                                                                       class="btn btn-default">30 GÜN</a>
                                                                    <a href="javascript:void(0);" id="day60"
                                                                       class="btn btn-default">60 GÜN</a>
                                                                </div>
                                                                <span class="input-group-addon"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>


                                                <fieldset>
                                                    <div class="form-group">
                                                        <label for="" class="col-md-3 control-label">
                                                            {{trans("sentence.invoice_note")}}
                                                        </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <input type="text" style="width: 354px;"
                                                                       v-model="invoice.description"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>


                                                @if($order->waybills->count() > 0)
                                                    <hr>

                                                    <table class="table table-condensed table-hover">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="3"><h4>{{trans("sentence.bound_waybills")}}</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ trans("sentence.waybill_number") }}</th>
                                                            <th>{{ trans("sentence.edit_date") }}</th>
                                                            <th>{{ trans("sentence.dispatch_date") }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order->waybills as $waybill)
                                                            <tr>
                                                                <td>{{$waybill->number}}</td>
                                                                <td>{{$waybill->dispatch_date}}</td>
                                                                <td>{{$waybill->edit_date}}</td>
                                                            </tr>
                                                        @endforeach


                                                        </tbody>
                                                    </table>


                                                @else
                                                    <hr>
                                                    <div class="alert alert-info"><i class="fa fa-info-circle"></i>
                                                        {{ trans("sentence.not_created_waybill") }}
                                                    </div>
                                                @endif

                                            </div>


                                        </div>
                                        <div class="tab-pane" id="tab7">
                                            <br>
                                            <br>
                                            <div class="row">

                                                {{--<div class="alert alert-warning">--}}
                                                {{--<strong>{{$order->company["company_name"]}}</strong>--}}
                                                {{--<br>--}}
                                                {{--{{$order->grand_total}} <i class="fa fa-{{$order->currency}}"></i>--}}
                                                {{--alacak bakiyesi--}}
                                                {{--oluşturulacaktır.--}}
                                                {{--</div>--}}
                                                <center>
                                                    <a type="button" class="btn btn-success btn-lg" @click="invoiceAdd"
                                                       data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> İşlem Onaylandı. Yazdırılıyor..."
                                                       id="InvoiceCheckPrint"><i class="fa fa-check"></i> {{ trans("sentence.confirm_and_print") }}</a></center>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <ul class="pager wizard no-margin">
                                                        <!--<li class="previous first disabled">
                                                        <a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
                                                        </li>-->
                                                        <li class="previous disabled">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-lg btn-default">
                                                                {{ trans("word.back") }} </a>
                                                        </li>
                                                        <!--<li class="next last">
                                                        <a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
                                                        </li>-->
                                                        <li class="next">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-lg txt-color-darken"> {{ trans("word.next") }} </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{--Fatura Yazdır--}}

        {{--Sevkiyat Bilgisi Gönder--}}
        <div class="modal fade" data-focus-on="input:first" id="transModal" role="dialog"
             aria-labelledby="remoteModalLabel1" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="false">
                            Kapat
                        </button>
                        <h4 class="modal-title" id="myModalLabel">SEVKİYAT BİLGİSİ </h4>
                    </div>
                    <form>

                        <div class="modal-body modal-body-content">
                            <form id="transferForm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 f-title">NAKLİYE ŞİRKETİ -</label>
                                            <div class="col-md-8 ">
                                                <input v-model="trans.form.transfer_company" type='text' class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 f-title">TAKİP NO (VARSA)</label>
                                            <div class="col-md-8 ">
                                                <input v-model="trans.form.transfer_no" type='text' class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 f-title">MÜŞTERİ MAİLİ</label>
                                            <div class="col-md-8 ">
                                                <input v-model="trans.form.customer_mail" type='email' class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 f-title"></label>
                                            <div class="col-md-8 ">
                                                <div class="mail-check">
                                                    <input v-model="trans.form.mail_check" type="checkbox"> Müşteriye mail gönderilsin mi?
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 8px;">
                                        <div class="form-group">
                                            <label class="col-md-3 f-title">NOT</label>
                                            <div class="col-md-8 ">
                                                <input v-model="trans.form.not" type='email'  class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                </div><br>
                                <small class="note">Sevkiyatı yapılan ürün/ürünleri seçin</small>

                                <div
                                        class="table-responsive">
                                    <table class="table">
                                        <th>
                                            <th>KOD</th>
                                            <th>ÜRÜN</th>

                                            <th>MİKTAR</th>
                                            <th>BİRİM</th>
                                            <th>#</th>
                                        </th>
                                        <tbody>
                                        <tr v-for="(item,index) in trans.form.products">
                                            <td>@{{item.code}}</td>
                                            <td>@{{item.name}}</td>
                                            <td>@{{item.qty}} </td>
                                            <td>@{{item.unit}} </td>
                                            <td>
                                                <div class="checkbox"
                                                     style="margin-top:0px;margin-bottom:0px;">
                                                    <label>
                                                        <input  type="checkbox"
                                                                :key="index" @click="item.selected = !item.selected"
                                                                checked="checked"
                                                                class="checkbox style-3">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="pull-right" >
                                    <button type="button" id="transferButton"  @click="transferAdd" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Ekleniyor..." class="btn btn-success">EKLE</button>
                                </div>
                            </form>
                            <div style="background: #fff; margin: 33px -1px 0px 0px;font-size: 13px;font-weight: 600;"
                                 class="table-responsive">
                                <table class="table table-hover">

                                    <tbody>
                                    <tr v-for="(transfer,index) in trans.transfer_list">
                                        <td>@{{ transfer.transfer_company }}</td>
                                        <td>@{{ transfer.transfer_number }}</td>
                                        <td>
                                            <button type="button" @click="transferDelete(transfer.id,index)"
                                                    class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>
                                            </button>
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>

                            </div>

                        </div>

                        <div class="modal-footer">

                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Sevkiyat Bilgisi Gönder--}}
    </section>

    @include("components.external.transaction",[$type="collect",$local="sales_orders",$detail = $order,$abble="App\\\Model\\\Sales\\\SalesOrders"])

    @include("components.external.share",[
    $title="Sipariş",
    $thread="Satış Siparişi : ".$order->company["company_name"],
    $message="Merhaba,<br>Satış Siparişi detaylarınız ektedir indirerek inceleyebilirsiniz.<br>İyi çalışmalar.<br><br><b>".account()["name"]."</b>",
    $type="share.order",
    $data = $order])

@push("style")
    <style>
        .popover {
            z-index: 1055;
        }
        .row_dark{
            background:#e2e2e2
        }

        hr {
            margin-top: 6px;
            margin-bottom: 6px;
        }
    </style>

    @endpush

    @push('scripts')
        <script src="{{asset("js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js")}}"></script>
        <script src="{{asset("js/plugin/clockpicker/clockpicker.min.js")}}"></script>
        <script>
            window.addEventListener("load", () => {
                Vue.use(VueTheMask);
                VueName = new Vue({
                    el: "#show",
                    data: {
                        remaining:"{{$order->remaining}}",
                        company_balance:"{{$order->company->balance}}",
                        collect_items:[
                                @foreach($order->payments as $pay)
                            {
                                type:"collect",
                                id:"{{$pay->id}}",
                                date:"{{$pay->date}}",
                                bank_account:'{{$pay->bank_account["name"]}}',
                                amount:"{{get_money($pay->pivot->amount)}}"
                            },
                            @endforeach()
                                @foreach($order->cheques as $che)
                            {
                                type:"cheq",
                                id:"{{$che->id}}",
                                date:"{{$che->date}}",
                                bank_account:'ALINAN ÇEK',
                                amount:"{{get_money($che->pivot->amount)}}"
                            },
                            @endforeach()
                        ],
                        items: [@foreach($order->items as $item)
                        {
                            waybill: "{{$item->waybill_item ? 'row_dark':false}}",
                            product: "{{$item->product->named["name"]}}",
                            quantity: "{{$item->quantity}}",
                            unit: "{{$item->unit["short_name"]}}",
                            price: "{{$item->price}} ",
                            vat: "{{$item->vat}}",
                            total: "{{$item->total}}"
                        },
                            @endforeach ],
                        vat_only: [
                            {name: "%1", total: 0},
                            {name: "%8", total: 0},
                            {name: "%18", total: 0},
                        ],
                        waybill: {
                            id: "{{$order->id}}",
                            number: "",
                            edit_date: "{{date_tr()}}",
                            dispatch_date: "{{date_tr()}}",
                            description: "",
                            items: [@foreach($order->no_waybills as $item)
                            {
                                id: "{{$item->id}}",
                                product: "{{$item->product->named["name"]}}",
                                quantity: "{{$item->quantity}}",
                                unit: "{{$item->unit["short_name"]}}",
                                selected: true,
                            },
                                @endforeach ],

                        },
                        invoice: {
                            id:"{{$order->invoice ? $order->invoice['id']:0}}",
                            seri: "{{$order->invoice ? $order->invoice['seri']:""}}",
                            number: "{{$order->invoice ? $order->invoice['number']:""}}",
                            date: "{{$order->invoice ? $order->invoice['date']:date_tr()}}",
                            due_date: "{{$order->invoice ? $order->invoice['due_date']:date_tr()}}",
                            clock: "{{$order->invoice ? $order->invoice['clock']:\Carbon\Carbon::now()->format("H:i")}}",
                            description: "{{$order->invoice ? $order->invoice['description']:""}}"
                        },
                        trans:{
                            form: {
                                transfer_company: "",
                                transfer_no: "",
                                mail_check: true,
                                customer_mail: "{{$order->company->address["email"]}}",
                                not:"",
                                products: [],
                            },
                            transfer_list: []
                        }
                    },
                    methods: {
                        transferAdd: function () {
                            $("#transferButton").button("loading");
                            $form = this.trans.form;
                            $this = this;
                            if (this.trans.form.transfer_company != "") {


                                if (this.trans.form.mail_check == true && this.trans.form.customer_mail == "") {
                                    $("#transferButton").button("reset");
                                    notification("Hata","Kargo bilgisini mail göndermek istiyorsanız lütfen mail adresini boş bırakmayın.","danger")
                                } else {
                                    axios.post("{{route("sales.transfer.add",[aid(),$order->id])}}", $form).then(res => {
                                        if (res.data != "error") {

                                         resdata=res.data;
                                            VueName.trans.form.transfer_company = "";
                                            VueName.trans.form.transfer_no = "";
                                            VueName.trans.form.not = "";
                                            $("#transModal").modal("hide");
                                            notification("Başarılı", "İşleminiz başarıyla tamamlandı.","success")
                                            $("#transferButton").button("reset");
                                        }

                                        this.trans.transfer_list.push(res.data)
                                    })
                                }
                            } else {
                                $("#transferButton").button("reset");
                                notification("Hata", "Lütfen Sevkiyat bilgisini eksiksiz giriniz.","danger")
                            }
                        },
                        transferList: function () {

                            axios.get("{{route("sales.transfer.list",[aid(),$order->id])}}").then(res => {
                                VueName.trans.transfer_list = res.data;

                            })


                        },
                        transferDelete: function ($id, $index) {

                            console.log($id, $index)
                            axios.post("{{route("sales.transfer.delete",aid())}}", {id: $id}).then(res => {
                                if (res.data != "error") {
                                    VueName.trans.transfer_list.splice($index, 1);
                                }
                            })
                        },
                        deleteInvoice: function ($id) {
                            swal({
                                title: "Fatura Silme İşlemini Onayla!",
                                text: "Faturayı silmek istediğinizden eminmisiniz ? " +
                                "Bu siparişten faturayı silmek üzeresiniz.",
                                buttons: {
                                    catch: {
                                        text: "SİL!",
                                        value: "delete",
                                    },
                                    defeat: false,
                                    cancel: "Vazgeç"
                                },
                                dangerMode: true
                            })
                                .then((willDelete) => {
                                        if (willDelete) {
                                            $.post("{{route("sales.invoice.delete",[aid(),$order->id])}}", function (data) {
                                                if (data == "delete") {
                                                    swal("Fatura başarıyla silindi.", {
                                                        icon: "success",
                                                    });
                                                    location.reload();
                                                } else {
                                                    swal("Fatura silinemedi lütfen sistem yöneticinizle görüşün.", {
                                                        icon: "error",
                                                    });
                                                }
                                            });
                                        }
                                    }
                                );
                        },
                        invoiceAdd: function () {
                            $("#InvoiceCheckPrint").button("loading");
                            axios.post("{{route("sales.invoice.add",[aid(),$order->id])}}", this.invoice).then(res => {
                                window.open("/{{aid()}}/sales/orders/invoice-print/" + res.data);
                                $("#invoiceModal").modal("hide");
                                location.reload();

                            })
                        },
                        waybill_print: function ($id) {
                            $("#WaybillButton").button("loading");
                            axios.post("{{route("sales.waybill.add",aid())}}", this.waybill).then(res => {

                                window.open("/{{aid()}}/sales/orders/waybill-print/" + res.data);
                                $("#waybillModal").modal("hide");
                                location.reload();
                            })
                        },
                        waybill_process: function ($id,$number) {

                            if($number === null){
                                $number = "Seçtiğiniz"
                            }else{
                                $number = $number;
                            }
                            swal(+$number + " irsaliye için ne yapmak istiyorsunuz ?", {
                                buttons: {

                                    print: {
                                        text: "Yazdır",
                                        value: "print"
                                    },
                                    catch: {
                                        text: "SİL!",
                                        value: "delete",
                                    },
                                    defeat: false,
                                    cancel: "Vazgeç"
                                },
                            })
                                .then((value) => {
                                        switch (value) {

                                            case"delete"
                                            :
                                                $.post("/{{aid()}}/sales/orders/waybill-delete/" + $id, function (data) {

                                                });
                                                swal("Başarılı", "Seçilen irsaliye kaldırıldı!", "success");
                                                location.reload();
                                                break;
                                            case "print":
                                                window.open("/{{aid()}}/sales/orders/waybill-print/" + $id);
                                                break;
                                        }
                                    }
                                );
                        },
                        redirect:function($id,$type){
                            if($type=="collect"){
                                return window.location.href='/{{aid()}}/finance/accounts/'+$id+'/receipt';
                            }else{
                                return window.location.href='/{{aid()}}/finance/cheques/'+$id+'/show';
                            }

                        },
                        delete_data: function ($id) {
                            fullLoading();
                            axios.delete('{{route("sales.orders.destroy",[aid(),$order->id])}}')
                                .then(function (response) {
                                    if (response.data.message == "success") {
                                        window.location.href = '{{route("sales.orders.index",aid())}}';
                                    }
                                }).catch(function (error) {
                                notification("Error", error.response.data.message, "danger");

                            });
                        },


                    },
                    computed:{

                        vat_check() {
                            vat1 = 0;
                            vat8 = 0;
                            vat18 = 0;

                            this.items.reduce((total, item) => {

                                if (item.vat == 1) {

                                    t = money_clear(item.total);
                                    a = money_clear(item.price);
                                    q = money_clear(item.quantity);

                                    st = q * a;
                                    sr = t - st;

                                    vat1 += sr;


                                } else if (item.vat == 8) {

                                    t = money_clear(item.total);
                                    a = money_clear(item.price);
                                    q = money_clear(item.quantity);

                                    st = q * a;
                                    sr = t - st;

                                    vat8 += sr;
                                } else if (item.vat == 18) {

                                    t = money_clear(item.total);
                                    a = money_clear(item.price);
                                    q = money_clear(item.quantity);

                                    st = q * a;
                                    sr = t - st;

                                    vat18 += sr;
                                }

                            }, 0);

                            if(vat1!=0){
                                this.vat_only[0].name = "%1";
                                this.vat_only[0].total = vat1.toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }else{
                                this.vat_only[0].total = 0;
                            }
                            if(vat8!=0){
                                this.vat_only[1].name = "%8";
                                this.vat_only[1].total = vat8.toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }else{
                                this.vat_only[1].total = 0;
                            }
                            if(vat18!=0){
                                this.vat_only[2].name = "%18";
                                this.vat_only[2].total = vat18.toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }else{
                                this.vat_only[2].total = 0;
                            }


                        },
                    },
                    mounted: function () {
                        datePicker();

                        this.transferList();

                        @foreach($order->items as $item)
                            this.trans.form.products.push({
                            id: "{{$item->id}}",
                            code: '{{$item->product["code"]}}',
                            name: '{{$item->product->named["name"]}}',
                            qty: '{{$item->quantity}}',
                            unit: '{{$item->unit["shorname"]}}',
                            selected:true,
                        });
                        @endforeach


                        $('#clockpicker').clockpicker({
                            placement: 'top',
                            donetext: 'Done'
                        });

                        $('#clockpicker').change(function (e) {
                            // Have to stop propagation here
                            VueName.invoice.clock = $("#clockpicker").val();
                        });
                        this.vat_check


                        let $validator1 = $("#wizard-1").validate({

                            rules: {
                                email: {
                                    required: true,
                                    email: "Your email address must be in the format of name@domain.com"
                                },
                            },

                            messages: {
                                fname: "Please specify your First name",
                                lname: "Please specify your Last name",
                                email: {
                                    required: "We need your email address to contact you",
                                    email: "Your email address must be in the format of name@domain.com"
                                }
                            },

                            highlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                            },
                            unhighlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                            },
                            errorElement: 'span',
                            errorClass: 'help-block',
                            errorPlacement: function (error, element) {
                                if (element.parent('.input-group').length) {
                                    error.insertAfter(element.parent());
                                } else {
                                    error.insertAfter(element);
                                }
                            }
                        });

                        let $validator2 = $("#wizard-2").validate({

                            rules: {
                                email: {
                                    required: true,
                                    email: "Your email address must be in the format of name@domain.com"
                                },
                            },

                            messages: {
                                fname: "Please specify your First name",
                                lname: "Please specify your Last name",
                                email: {
                                    required: "We need your email address to contact you",
                                    email: "Your email address must be in the format of name@domain.com"
                                }
                            },

                            highlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                            },
                            unhighlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                            },
                            errorElement: 'span',
                            errorClass: 'help-block',
                            errorPlacement: function (error, element) {
                                if (element.parent('.input-group').length) {
                                    error.insertAfter(element.parent());
                                } else {
                                    error.insertAfter(element);
                                }
                            }
                        });

                        $('#bootstrap-wizard-1').bootstrapWizard({
                            'tabClass': 'form-wizard',
                            'onNext': function (tab, navigation, index) {
                                var $valid = $("#wizard-1").valid();
                                if (!$valid) {
                                    $validator1.focusInvalid();
                                    return false;
                                } else {

                                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
                                        'complete');
                                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
                                        .html('<i class="fa fa-check"></i>');
                                }
                            }
                        });

                        $('#bootstrap-wizard-2').bootstrapWizard({
                            'tabClass': 'form-wizard',
                            'onNext': function (tab, navigation, index) {
                                var $valid = $("#wizard-2").valid();
                                if (!$valid) {
                                    $validator2.focusInvalid();
                                    return false;
                                } else {

                                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
                                        'complete');
                                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
                                        .html('<i class="fa fa-check"></i>');
                                }
                            }
                        });


                        // Vade tarihi için gün eklemeleri
                        $("#day7").click(function () {
                            VueName.invoice.due_date = tariheGunEkle(VueName.invoice.date, 7);
                        });

                        $("#day14").click(function () {
                            VueName.invoice.due_date = tariheGunEkle(VueName.invoice.date, 14);
                        });

                        $("#day30").click(function () {
                            VueName.invoice.due_date = tariheGunEkle(VueName.invoice.date, 30);
                        });

                        $("#day60").click(function () {
                            VueName.invoice.due_date = tariheGunEkle(VueName.invoice.date, 60);
                        });

                        $("#today").click(function () {
                            VueName.invoice.due_date = VueName.invoice.date;
                        });

                    }
                });
            });
        </script>

    @endpush
@endsection