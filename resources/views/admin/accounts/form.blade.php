@extends('layouts.master')

@section('content')
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle"> <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>    {{ isset($company) ? 'Update Company' : 'Create Company' }}</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">

                    <form method="POST" class="bv-form" action="{{ isset($company) ? route('companies.update', ['company' => $company]) : route('companies.store') }}">
                        @csrf

                        {{-- Add patch hidden input if this is update --}}
                        @if(isset($company))
                            @method('PATCH')
                        @endif

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">Commercial title</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ $company->company_name or old('company_name') }}" required autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">Sector</label>

                            <div class="col-md-6">
                                <select name="sector" id="sector" class="form-control{{ $errors->has('sector') ? ' is-invalid' : '' }}" required>
                                    <option>Sector</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->id }}"{{ $sector->id == old('sector') || isset($company) && $company->sector_id == $sector->id ? 'selected=selected' : '' }}>
                                            {{ $sector->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('sector'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sector') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $company->owner->name or old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $company->owner->email or old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $company->owner->mobile or old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-right">Expiry Date</label>

                            <div class="col-md-6">
                                <input id="expiry_date"
                                       type="date"
                                       class="form-control{{ $errors->has('expiry_date') ? ' is-invalid' : '' }}"
                                       name="expiry_date"
                                       value="{{ isset($company) && $company->expiry_date ? $company->expiry_date->format('Y-m-d') : old('expiry_date') }}">

                                @if ($errors->has('expiry_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('expiry_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <footer>
                            <button type="submit" class="btn btn-primary">
                                {{ isset($company) ? 'UPDATE' : 'CREATE' }}
                            </button>
                            <button href="{{ route('companies.index') }}" type="button" class="btn btn-default" onclick="window.history.back();">
                            Cancel
                            </button>
                        </footer>
                    </form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->


    </article>

@endsection