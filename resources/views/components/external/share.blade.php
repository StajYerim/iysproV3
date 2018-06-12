<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content"><div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">{{$title}} Paylaş</h4>
            </div>
            <div class="modal-body">

                <form id="share-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 ">ALICI *</label>
                                <div class="col-md-9 ">
                                    <input id='ms-emails' name="shareEmail" type='text' class='tags'>

                                </div>
                            </div>
                        </div><br><br><br>
                        <HR>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 ">KONU *</label>
                                <div class="col-md-9 ">
                                    <input name="shareThread" class="form-control " value="{{$thread}}" placeholder="Konu">

                                </div>
                            </div>
                        </div><BR><HR><br>

                        <div class="form-group">
                            <textarea name="shareMessage" class="form-control editor" placeholder="Mesajınız" rows="6" required="">
                                <p>{{$message}}</p></textarea>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Vazgeç
                </button>
                <button type="button" id="shareSendButton" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Gönderiliyor" class="btn btn-primary">
                    Gönder
                </button>
            </div></div>
    </div>
</div>
@push("style")
    <link href="/js/magicsuggest/magicsuggest.css" rel="stylesheet">
@endpush
@push("scripts")
    <script src="/js/magicsuggest/magicsuggest.js"></script>
<script>
    window.addEventListener("load", () => {
        Vue.component('v-select', VueSelect.VueSelect);
ShareForm = new Vue({
    el:"#share-form",
    data:{

    },
    methods:{

    },
    mounted:function(){
        let ms = $('#ms-emails').magicSuggest({
            vtype: 'email',
            noSuggestionText: 'Girilen değerde kayıt bulunamadı',
            placeholder: 'Eposta',
            data: [{
                    name: 'yakup',
                    email: 'yakupguvenc@yandex.com'
                },


            ],
            valueField: 'email',
            renderer: function(data){
                return  data.email;
            },
            resultAsString: false
        });

        $(ms).on(
            'selectionchange', function(e, cb, s){

                if(this.isValid() == false){
                    this.remove();
                }
            }
        );
    }
})
    });
</script>
@endpush()
