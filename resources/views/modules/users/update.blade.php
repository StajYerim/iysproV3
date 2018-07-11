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
                Profile
              </legend>
            </fieldset>
            <fieldset>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">Name</label>
                    <input type="text" class="form-control" v-model="profile_form.name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">E-Mail</label>
                    <input type="text" class="form-control" v-model="profile_form.email">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">Mobile</label>
                    <input type="text" class="form-control" v-model="profile_form.mobile">
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-actions">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success" @click="profile_form_send" type="button">
                    <i class="fa fa-send"></i> Save
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
                Password Update
              </legend>
            </fieldset>
            <fieldset>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">Old Password</label>
                    <input type="password" class="form-control" v-model="password_form.old_password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">New Password</label>
                    <input type="password" class="form-control" v-model="password_form.new_password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label class="control-label">New Password Confirmation</label>
                    <input type="password" class="form-control" v-model="password_form.new_password_confirmation">
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-actions">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success" @click="password_form_send" type="button">
                    <i class="fa fa-send"></i> Save
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
            notification("Success",response.data.message,"success");
          });
        },
        password_form_send: function() {
          if(this.password_form.new_password === this.password_form.new_password_confirmation && !this.is_empty(this.password_form.new_password) && !this.is_empty(this.password_form.new_password_confirmation)) {
            fullLoading("Loading..");
            axios.post("{{ route( "settings.users.profile.password.save", aid() ) }}", this.password_form) .then(function (response) {
              $('body').loadingModal('destroy');
              if(response.data.status === 200) {
                notification("Success",response.data.message,"success");                
              }
              else if(response.data.status === 403) {
                notification("Warning",response.data.message,"warning");                
              }
            });
          } else {
            notification("Warning","Passwords does not match!","warning");
          }
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