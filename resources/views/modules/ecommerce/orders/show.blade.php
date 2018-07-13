@extends('layouts.master') 

@section('content')
<!-- widget grid -->
<section id="widget-grid" class="">
  <!-- row -->
  <div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
      <div class="jarviswidget" id="wid-id-0">
        <header>
          <span class="widget-icon">
            <i class="fa fa-info"></i>
          </span>
          <h2>{{trans("general.order")}} # {{ $order->id }} </h2>
        </header>
        <!-- widget div-->
        <div>
          <!-- widget content -->
          <div class="widget-body no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>{{trans("general.product")}}</th>
                  <th>{{trans("general.quantitu")}}</th>
                  <th></th>
                  <th class="text-center">{{trans("general.price")}}</th>
                  <th class="text-center">{{trans("general.total")}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order->itemList as $item)
                <tr>
                  <td class="col-sm-8 col-md-6">
                    <div class="media">
                      <a class="thumbnail pull-left" href="#" style="margin-right:10px;"> 
                        <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{ $item->productName }}</a></h4>
                        <h5 class="media-heading"><a href="#">{{ $item->productSellerCode }}</a></h5>
                      </div>
                    </div>
                  </td>
                  <td class="col-sm-1 col-md-1" style="text-align: center"><strong>{{ $item->quantity }}</strong></td>
                  <td class="col-sm-1 col-md-1"></td>
                  <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price }} ₺</strong></td>
                  <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->dueAmount }} ₺</strong></td>
                </tr>
                @endforeach
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td>
                    <h3>Total</h3>
                  </td>
                  <td class="text-right">
                    <h3><strong>{{ $order->billingTemplate->dueAmount }} ₺</strong></h3>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- end widget content -->
        </div>
        <!-- end widget div -->
      </div>
      <!-- end widget -->
    </article>
    <!-- WIDGET END -->
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <div class="jarviswidget" id="wid-id-0">
        <header>
          <span class="widget-icon">
            <i class="fa fa-user"></i>
          </span>
          <h2>{{trans("general.customer")}} {{trans("general.information")}}</h2>
        </header>
        <!-- widget div-->
        <div>
          <!-- widget content -->
          <div class="widget-body text-center">
            <h3 style="margin:0">{{ $order->buyer->fullName }}</h3>
            <h4>{{ $order->buyer->tcId }}</h4>
            <span>{{ $order->buyer->email }}</span>
          </div>
          <!-- end widget content -->
        </div>
        <!-- end widget div -->
      </div>
      <div class="jarviswidget" id="wid-id-0">
        <header>
          <span class="widget-icon">
            <i class="fa fa-tag"></i>
          </span>
          <h2>Billing address</h2>
        </header>
        <!-- widget div-->
        <div>
          <!-- widget content -->
          <div class="widget-body">
            <h4 style="font-weight:bold">{{ $order->billingAddress->fullName }}</h4>
            <p>{{ $order->billingAddress->address }}</p>
            <p>{{ $order->billingAddress->city }}, {{ $order->billingAddress->district }}</p>
            <p>{{ $order->billingAddress->gsm }}</p>
          </div>
          <!-- end widget content -->
        </div>
        <!-- end widget div -->
      </div>
      <div class="jarviswidget" id="wid-id-0">
        <header>
          <span class="widget-icon">
            <i class="fa fa-truck"></i>
          </span>
          <h2>{{trans("general.shipping")}} {{trans("general.address")}}</h2>
        </header>
        <!-- widget div-->
        <div>
          <!-- widget content -->
          <div class="widget-body">
            <h4 style="font-weight:bold">{{ $order->shippingAddress->fullName }}</h4>
            <p>{{ $order->shippingAddress->address }}</p>
            <p>{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->district }}</p>
            <p>{{ $order->shippingAddress->gsm }}</p>
          </div>
          <!-- end widget content -->
        </div>
        <!-- end widget div -->
      </div>
    </article>
    <!-- WIDGET END -->
  </div>
  <!-- end row -->
</section>
<!-- end widget grid -->
@push('scripts')
<script>
</script>
@endpush 
@endsection