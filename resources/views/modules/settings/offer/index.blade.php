@extends('layouts.master')
@section('content')

    <section>
        <div class="row">
            <div class="col-sm-12">
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body ">

                            <form class="form-horizontal" method="POST" action="..." id="offerSettingsForm">


                                <ul id="myTab1" class="nav nav-tabs bordered">
                                    <li class="active">
                                        <a href="#s1" data-toggle="tab" aria-expanded="true"><i class="fa fa-fw fa-lg fa-gear"></i> TEKLİF AYARLARI </a>
                                    </li>
                                    <li class="">
                                        <a href="#s2" data-toggle="tab" aria-expanded="false"><i class="fa fa-fw fa-lg fa-file-text-o"></i> KAPAK SAYFASI</a>
                                    </li>

                                </ul>

                                <div id="myTabContent1" class="tab-content padding-10">
                                    <div class="tab-pane fade active in" id="s1">

                                        <fieldset>
                                            <legend></legend>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Logoyu Göster</label>
                                                <div style="float:left" class="col-md-9">
                                                    <label class="radioStyle">
                                                        <input type="radio" class="radiobox style-0" value="0" name="showLogo">
                                                        <span>Hayır</span>
                                                    </label>
                                                    <label class="radioStyle ">
                                                        <input type="radio" class="radiobox style-0" checked="&quot;true&quot;" value="1" name="showLogo">
                                                        <span>Evet</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <legend></legend>
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Varsayılan Geçerlilik Tarihi</label>
                                                <div class="col-md-2">
                                                    <label class="radioStyle pull-right">
                                                        <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="number" class="spinner ui-spinner-input" value="10" name="expireDay" aria-valuenow="10" autocomplete="off" role="spinbutton"><a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-n">▲</span></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-s">▼</span></a></span>
                                                    </label>

                                                </div>
                                            </div>
                                        </fieldset>
                                        <legend></legend>
                                        <fieldset>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Giriş Metni</label>
                                                    <textarea name="startText" id="startText" style="visibility: hidden; display: none;"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <legend></legend>
                                        <fieldset>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Alt Not</label>
                                                    <textarea name="endText" id="endText" style="visibility: hidden; display: none;">
                                                        &lt;div&gt;&lt;strong&gt;Ödeme:&nbsp;&lt;/strong&gt;Peşin şekilde yapılacaktır.&lt;/div&gt;

&lt;div&gt;Kredi Kartı ödemeleri iyzico sanal POS&nbsp;aracılığı ile tahsil edilmektedir %2.8 işlem ücreti eklenir.&nbsp;&lt;br /&gt;
Euro, USD veya Ödeme Günü TCMB döviz kuru karşılığı TL olarak yapılmalıdır.&nbsp;&lt;br /&gt;
&lt;strong&gt;Banka:&lt;/strong&gt; T.Garanti Bankası&lt;br /&gt;
&lt;strong&gt;Hesap Adı:&lt;/strong&gt; ase Yazılım ve Bilişim Çözümleri San. ve Tic. Ltd. Şti.&lt;br /&gt;
&lt;strong&gt;Şube:&lt;/strong&gt; Binevler TL&nbsp;- &lt;strong&gt;IBAN:&lt;/strong&gt; TR950006200112600006297217&lt;/div&gt;</textarea>
                                                </div>
                                            </div>
                                        </fieldset>



                                    </div>
                                    <div class="tab-pane fade" id="s2">
                                        <small class="note alert-warning">KAPAK SAYFASINI KULLANMAK İSTEMİYORSANIZ BOŞ BIRAKINIZ.</small>
                                        <textarea name="startPage" style="visibility: hidden; display: none;">&lt;p style="text-align:center"&gt;&lt;img alt="ase Yazılım ve Bilişim Çözümleri" src="https://www.asebilisim.com/img/logo.png" style="height:39px; width:168px" /&gt;&lt;/p&gt;

&lt;p style="text-align:center"&gt;&lt;span style="background-color:transparent; color:rgb(0, 0, 0); font-size:9pt"&gt;ofis@asebilisim.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;www.asebilisim.com&lt;/span&gt;&lt;/p&gt;

&lt;p style="text-align:center"&gt;&nbsp;&lt;/p&gt;

&lt;p style="text-align:center"&gt;&nbsp;&lt;/p&gt;

&lt;p style="text-align:center"&gt;&nbsp;&lt;/p&gt;

&lt;p style="text-align:center"&gt;&nbsp;&lt;/p&gt;

&lt;p style="text-align:center"&gt;&lt;img alt="" src="https://app.iyspro.com/img/apt.png" style="height:343px; width:980px" /&gt;&lt;/p&gt;

&lt;h2 style="text-align:center"&gt;&nbsp;&lt;/h2&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;p&gt;&nbsp;&lt;/p&gt;

&lt;hr /&gt;
&lt;h3 style="text-align:center"&gt;ase Yazılım ve Bilişim Çözümleri San. Tic Ltd. Şti.&lt;/h3&gt;

&lt;p style="text-align:center"&gt;&lt;span style="font-size:9px"&gt;Gaziantep Üniversitesi Teknopark 4/A Blok No.114 Şahinbey / GAZİANTEP&lt;br /&gt;
Şahinbey V.D No.0860574498&nbsp;Mersis No: 0086057449800023 Ticaret Sicil No: 49888&nbsp;&lt;br /&gt;
Tel. 0850 532 9 273 &nbsp;&nbsp;Fax. 0342 360 19 35&lt;/span&gt;&lt;/p&gt;</textarea>
                                    </div>

                                </div>
                                <fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="https://starnut.iyspro.com/settingsmanager" class="btn btn-default btn-lg ">
                                                    <i class="fa fa-times" aria-hidden="true"></i> VAZGEÇ
                                                </a>
                                                <div id="btnChanges" style="display: inline-block">
                                                    <button type="button" id="salesSettingsBtn" class="btn btn-success btn-lg save">
                                                        <i class="fa fa-save"></i> KAYDET
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>


                        </div>

                    </div>

                </div>
            </div>
        </div>

        @include("components.modals.companies",[$option="customer",$title="New Company",$type = "new_company",$message="Company Form",$id=0])

    </section>

    @push('scripts')
        <script src="/js/plugin/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'startText');
            CKEDITOR.replace( 'endText');
            CKEDITOR.replace( 'startPage');
        </script>
    @endpush

@endsection