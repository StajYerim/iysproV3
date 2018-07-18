@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">

            <ol class="dd-list">
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("general",aid()) }}">
                            <i class="fa fa-cogs"></i> Genel Ayarlar
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("offer",aid()) }}">
                            <i class="fa fa-list-alt"></i> Teklif Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("sales",aid()) }}">
                            <i class="fa fa-money"></i> Satış Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("purchase",aid()) }}">
                            <i class="fa fa-money"></i> Satın Alma Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("product", aid()) }}">
                            <i class="fa fa-shopping-cart"></i> Ürün Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("account", aid()) }}">
                            <i class="fa fa-suitcase"></i> Cari Hesap Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("user", aid()) }}">
                            <i class="fa fa-user"></i> Kullanıcı Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("print", aid()) }}">
                            <i class="fa fa-print"></i> Yazdırma Şablonları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("planning", aid()) }}">
                            <i class="fa fa-bar-chart-o"></i> Üretim Planlama Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("store", aid()) }}">
                            <i class="fa fa-archive"></i> Depo Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("email", aid()) }}">
                            <i class="fa fa-send-o"></i> Eposta Ayarları
                        </a>
                    </h3>
                </li>
                <li class="col-md-4">
                    <h3 class="h3 settings-title">
                        <a href="{{ route("categoryandtags", aid()) }}">
                            <i class="fa fa-tag"></i> Kategori ve Etiketler
                        </a>
                    </h3>
                </li>
            </ol>

        </div>
    </div>
@endsection