@php
    $datas = \App\Tags::where('type', $type)->get()->toArray();
@endphp


<div style="position: absolute;top: 119px;right: 33px; width: 20%;z-index: 1" id="tag-widget">
    <input type="text" name="form.tags" id="magicsuggest" style="width: 100%">

    <div id="custom-ctn" style="width: 100%"></div>
</div>

@push('scripts')
    <script src="{{ asset('js/magicsuggest/magicsuggest-min.js') }}"></script>
    <script>
       function selena(){
        $(function() {
            $('#magicsuggest').magicSuggest({
                renderer: function (data) {
                    let dataBg = '';
                    if (data.bg_color == null) {
                        dataBg = '#908e8c'
                    }
                    else {
                        dataBg = data.bg_color;
                    }
                    return '<span data-color="'+dataBg+'" style="background:'+dataBg+'; display: block;color: #fff;padding: 4px">'+data.name+'</span>';
                },
                selectionRenderer: function (data) {
                    var dataBg = '';
                    if (data.bg_color == null) {
                        dataBg = '#908e8c'
                    }
                    else {
                        dataBg = data.bg_color;
                    }
                    return '<span  style="background:'+dataBg+'!important; display: block;color: #fff;padding: 4px">'+data.name+'</span>';
                },
                allowFreeEntries: true,
                selectionStacked: true,
                maxSelection: 5,
                typeDelay: 2,
                selectionPosition: 'bottom',
                @if(isset($val))
                value: [
                    @foreach($val as $v)
                        '{{$v->tag_id}}',
                    @endforeach
                ],
                @endif
                placeholder: "Etiket Seçiniz",
                data: '{{ route('tags.give', ['type'=>$type]) }}'
            });
        });
       }
    </script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('js/magicsuggest/magicsuggest-min.css') }}">
    <style>
        .ms-sel-item{
            background: none!important;
            padding: 0px!important;
            position: relative!important;
        }
        .ms-close-btn{
            position: absolute;
            top: 4px;
            right: 5px;
        }
    </style>
@endpush