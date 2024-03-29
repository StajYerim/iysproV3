<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" id="share-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">{{$title}} {{ trans("word.share") }}</h4>
            </div>
            <div class="modal-body">

                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 ">{{ trans("word.receiver") }} *</label>
                                <div class="col-md-9">
                                    <vue-tags-input
                                            :max-tags="10"
                                            :maxlength="30"
                                            v-model="form.tag"
                                            :tags="form.tagsd"
                                            @tags-changed="newTags => form.tagsd = newTags"
                                            :autocomplete-items="filteredItems"
                                            :validation="validation"
                                            :placeholder="'Mail adresi ekle'"

                                    />
                                    {{--<input id='magicsuggest' name="shareEmail" type='text' v-model="form.receivers">--}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 ">{{ trans("word.subject") }} *</label>
                                <div class="col-md-9 ">
                                    <input name="shareThread" class="form-control " v-model="form.thread"
                                           placeholder="{{ trans("word.subject") }} ">

                                </div>
                            </div>
                        </div>
                        <BR>
                        <HR>
                        <br>

                        <div class="form-group">
                            <textarea name="shareMessage" class="form-control editor" placeholder="Mesajınız" rows="6"
                                      v-model="form.message"
                                      required="">
                               </textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label class="col-md-3 ">{{ trans("sentence.share_language") }}</label>
                                <div class="col-md-4"><select v-model="form.lang" class="form-control">
                                        @foreach($langs as $lang)
                                            <option value="{{$lang->lang_code}}">{{$lang->name}}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    {{ trans("word.cancel") }}
                </button>
                <button type="button" v-on:click="formSend" :disabled="btnDisable == true"
                        data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Gönderiliyor"
                        class="btn btn-primary">
                    Gönder
                </button>
            </div>
        </div>
    </div>
</div>

@push("style")
    <link href="{{asset("/js/magicsuggest/magicsuggest.css")}}" rel="stylesheet">
@endpush

@push("scripts")
    <script src="{{asset("/js/magicsuggest/magicsuggest.js")}}"></script>

    <script src="{{asset("js/plugin/summernote/summernote.min.js")}}"></script>
    <script>


        ShareForm = new Vue({
            el: "#share-form",
            data: {
                autocompleteItems: [ @if($email){
                    text: '{{$email}}',
                }, @endif],
                validation: [
                    {
                    type: 'no-numbers',
                    rule: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                }],
                btnDisable: false,
                form: {
                    thread: "{{$thread}}",
                    message: "{!! $message !!}",
                    lang: "{{app()->getLocale()}}",
                    tag: '',
                    tagsd: [@if($email) {'text':"{{$email}}"}, @endif],
                }

            },
            computed: {
                filteredItems() {
                    return this.autocompleteItems.filter(i => new RegExp(this.tag, 'i').test(i.text));
                },
            },
            methods: {
                formSend: function () {
                    fullLoading()
                    this.btnDisable = true;
                    ShareForm.form.message = $('.editor').summernote('code');

                    setTimeout(function(){
                    if(ShareForm.form.tagsd.length > 0) {


                        axios.post("{{route($type,[aid(),$data->id])}}", ShareForm.form)
                            .then(function (res) {

                                fullLoadingClose();
                                ShareForm.btnDisable = false;
                                notification("Başarılı", "Mail başarıyla gönderildi.", 'success')
                                $("#shareModal").modal("toggle");

                            })
                            .catch(function () {
                                fullLoadingClose();
                                notification("Hatalı", "Mail gönderilemedi", "danger")
                                ShareForm.btnDisable = false;
                            });

                    }else{
                        fullLoadingClose();
                        notification("Hatalı", "Lütfen mail adresini boş bırakmayın.", "danger")
                        ShareForm.btnDisable = false;
                    }
                    }, 500);

                },
                formReset: function () {
                    this.form = {
                        thread: "{{$thread}}",
                        receivers: [{}],
                        message: "{!! $message !!}"
                    }
                }
            }
        });

        //Text area summerfields

        $('.editor').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            focus: true,
            height: 150
        });


    </script>
@endpush



