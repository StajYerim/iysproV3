@extends('layouts.master')
@section('content')
    <section id="show" v-cloak>
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <h1>
                    <i class="fa fa-truck "></i>
                    <span class="semi-bold">
                        {{$stock->description == null ? $stock->status == 0 ? "Stok Girişi":"Stock Çıkışı":$stock->description}}
                    </span>
                </h1>
            </div>
            <div class="col-lg-4 col-sm-4">


                @if($stock->sales_order_id == null && $stock->purchase_order_id == null)
                   <span class="pull-right">
                       <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                {{trans("sentence.other_transactions")}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route("stock.movements.form",[aid(),$stock->id,"update",$stock->status == 0 ? "in":"out"])}}">
                                        <i class="fa fa-edit" aria-hidden="true"> </i>
                                        {{trans("word.edit")}}
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


                        </span>
                     @endif
                    </div>
        </div>
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="row">
                    <div class="col-sm-8">

                        <div class="well">

                            <div class="row">
                                <div class="col-sm-6" style="font-weight: 400;font-size:15px;">
                                    <i class="fa fa-building-o"></i>
                                    <a href="{{$stock->company["id"] == null ? "#!":route("sales.companies.show",[aid(),$stock->company["id"]])}}">
                                        {{$stock->company["company_name"] == null ? "Belirtilmedi":$stock->company["company_name"]}}
                                    </a>
                                </div>
                                <div class="col-sm-4" style="font-weight: 400;font-size:15px;">
                                    <i class="fa fa-calendar"></i>
                                    {{$stock->date}}
                                </div>
                                <div class="col-sm-2" style="font-weight: 400;font-size:15px;"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="table-responsive ">

                                    <table class="table table-hover">

                                        <tbody>
                                        <tr>
                                            <th width="33%">
                                                {{trans("word.service")}} / {{trans("word.product")}}
                                            </th>
                                            <th width="10%">
                                                {{trans("word.quantity")}}
                                            </th>
                                        </tr>

                                        </tbody>
                                        <tbody>

                                        @foreach($stock->items == "[]" ? $stock->order_items:$stock->items as $item)
                                        <tr>
                                            <td>
                                                <a href="{{route("stock.product.show",[aid(),$item->product["id"]])}}">
                                                    {{$item->product["name"]}}
                                                </a>
                                            </td>
                                            <td>{{$item->quantity}} {{$item->unit["short_name"]}}</td>
                                        </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div class="well">
                            <div class="row">
                        <div class="alert alert-warning">
                          {!! $stock->other_receipt !!}
                        </div>
                            </div>

                        </div>

                    </div>
                </div>


            </article>
        </div>

        @include("components.external.delete_modal",[$title=trans('sentence.are_you_sure'),$type = "deleteModal",$message=trans('sentence.are_you_sure_delete_stock_receipt'),$id=$stock->id])

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
                        axios.delete('{{route("stock.movements.destroy",[aid(),$stock->id])}}')
                            .then(function (response) {
                                if (response.data.message == "success") {
                                    window.location.href = '{{route("stock.movements.index",aid())}}';
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