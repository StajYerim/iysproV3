@extends('layouts.master')
@section('content')
<section id="profile_update" class="">
  <div class="row">
    <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
        <div>
          <div class="widget-body ">
            <fieldset>
              <legend>
                {{trans("word.profile")}}
              </legend>
            </fieldset>
            <fieldset>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">
                      {{trans("word.name")}}
                    </label>
                    <input type="text" class="form-control" v-model="profile_form.name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">
                      {{trans("word.email")}}
                    </label>
                    <input type="text" class="form-control" v-model="profile_form.email">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">
                      {{trans("word.mobile")}}
                    </label>
                    <input type="text" class="form-control" v-model="profile_form.mobile">
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-actions">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success" @click="profile_form_send" type="button">
                    <i class="fa fa-send"></i>
                    {{trans("word.save")}}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
    <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
        <div>
          <div class="widget-body ">
            <fieldset>
              <legend>
                {{trans("sentence.update_password")}}
              </legend>
            </fieldset>
            <fieldset>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">
                      {{trans("sentence.old_password")}}
                    </label>
                    <input type="password" class="form-control" v-model="password_form.old_password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">
                      {{trans("sentence.new_password")}}
                    </label>
                    <input type="password" class="form-control" v-model="password_form.new_password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">
                      {{trans("sentence.new_password_confirmation")}}
                    </label>
                    <input type="password" class="form-control" v-model="password_form.new_password_confirmation">
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-actions">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success" @click="password_form_send" type="button">
                    <i class="fa fa-send"></i>
                    {{trans("word.save")}}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>
@push('scripts')
<script>
  window.addEventListener("load", () => {
    let profileUpdate = new Vue({
      el: "#profile_update",
      data: () => ({
        profile_form: {
          name: "{{$user->name}}",
          email: "{{$user->email}}",
          mobile: "{{$user->mobile}}",
        },
        password_form: {
          old_password: "",
          new_password: "",
          new_password_confirmation: "",
        }
      }),
      methods: {
        profile_form_send: function() {
          fullLoading("Loading..");
          axios.post("{{ route( "settings.users.profile.save", aid() ) }}", this.profile_form) .then(function (response) {
            $('body').loadingModal('destroy');
            notification(response.data.title,response.data.message,response.data.type);
          });
        },
        password_form_send: function() {
          fullLoading("Loading..");
          axios.post("{{ route( "settings.users.profile.password.save", aid() ) }}", this.password_form)
              .then(function (response) {
                  $('body').loadingModal('destroy');
                  notification(response.data.title,response.data.message,response.data.type);
              })
              .catch(function(error){
                  $('body').loadingModal('destroy');

                  Object.keys(error.response.data.errors).forEach((key) => {
                      notification(error.response.data.title,error.response.data.errors[key][0],error.response.data.type);
                  })
              });
        },
        is_empty: function(str) {
          return (!str || 0 === str.length);
        }
      }
    })
  });
</script>
@endpush
@endsection