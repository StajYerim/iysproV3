@extends('layouts.master')
@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12">
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body ">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('company_profile.update',aid()) }}" id="companyProfileForm" enctype="multipart/form-data">
                                @csrf

                                <fieldset>
                                    <legend>Firma Bilgilerinizi Bu Bölümden Güncelleyebilirsiniz.</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">FİRMA ADI</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="company_name"  placeholder="FİRMA ADINIZI GİRİNİZ" value="{{ $account->company_name }}" type="text">
                                        </div>
                                    </div>
                                </fieldset>

                                <legend></legend>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">FİRMA LOGOSU</label>
                                        <div class="col-md-10">
                                            @if($account->logo == null)
                                                <img width="50" id="logo" src="/img/noimage.gif" alt="Firma Logosu" style="display: inline-block; width: 10%">
                                            @else
                                                <img width="50" id="logo" src="{{ asset('images/account/'.aid().'/logo/'.$account->logo) }}" alt="Firma Logosu" style="display: inline-block; width: 10%">
                                            @endif
                                            <input id="file-upload" type="file" name="logo">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">VERGİ BİLGİLERİ</label>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">V.D</span>
                                                <input class="form-control" type="text" name="tax_office" value="{{ $account->tax_office }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">V.NO.</span>
                                                <input class="form-control" type="text" name="tax_id" value="{{ $account->tax_id }}">
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>

                                <legend></legend>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">AÇIK ADRES</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="address" placeholder="FİRMA ADRESİNİZİ GİRİNİZ" rows="4">{{ $account->address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">İL, İLÇE</label>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">İL</span>
                                                <input class="form-control" type="text" name="city" value="{{ $account->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">İLÇE</span>
                                                <input class="form-control" type="text" name="town" value="{{ $account->town }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">TELEFON, FAX</label>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">TEL</span>
                                                <input class="form-control" type="text" name="phone" value="{{ $account->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">FAX</span>
                                                <input class="form-control" type="text" name="fax" value="{{ $account->fax }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">WEB, EMAİL</label>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">WEB</span>
                                                <input class="form-control" type="text" name="web" value="{{ $account->web }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 custom-col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">EMAİL</span>
                                                <input class="form-control" type="email" name="email" value="{{ $account->email }}">
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="https://starnut.iyspro.com/settingsmanager" class="btn btn-default btn-lg ">
                                                <i class="fa fa-times" aria-hidden="true"></i> VAZGEÇ
                                            </a>
                                            <div id="btnChanges" style="display: inline-block">
                                                <button type="submit" id="companyProfileBtn" class="btn btn-success btn-lg save">
                                                    <i class="fa fa-save"></i> KAYDET
                                                </button>
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

    </section>
@endsection