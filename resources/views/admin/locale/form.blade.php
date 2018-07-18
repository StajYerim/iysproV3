<fieldset>
    <form action="{{route("admin.locale.store",$type!=0 ? $line->id:0)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="group" class="col-form-label">Grup</label>
            <input type="text" name="group" class="form-control" value="{{$type != 0 ? $line->group:""}}" id="group">
        </div>
        <div class="form-group">
            <label for="key" class="col-form-label">Key</label>
            <input type="text" name="key" class="form-control" value="{{$type != 0 ? $line->key:""}}" id="key" >
        </div>
        <hr>
        @php
        if($type != 0){
            $dizi = json_decode($line->text);
        }
        @endphp
        @foreach($langs as $lang)
            @php $d = $lang->lang_code; @endphp
            <div class="form-group">
                <label for="{{$lang["lang_code"]}}"  class="col-form-label">{{$lang["name"]}}</label>

                @if(isset($dizi->$d))
                    <input type="text" name="lang_name[{{$lang["lang_code"]}}]" class="form-control" value="{{$type != 0 ? $dizi->$d:""}}" id="{{$lang["code"]}}">

                @else
                    <input type="text" name="lang_name[{{$lang["lang_code"]}}]" class="form-control" value="" id="{{$lang["code"]}}">
                @endif

            </div>
        @endforeach
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            <button type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</fieldset>