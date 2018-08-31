<div class="col-md-7">
    <div class="dropdown col-md-1 pull-left">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
            <i class="fa fa-filter"></i> <span id="filtrele_span">Filtrele</span>
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#" id="tahsilat_durumu">TAHSİLAT DURUMU</a></li>
            <li><a href="#" id="duzenlenme_tarihi">DÜZENLENME TARİHİ</a></li>
            <li><a href="#" id="vade_tarihi">VADE TARİHİ</a></li>
            <li><a href="#" id="etiket">ETİKET</a></li>
            <li><a href="#" id="hepsini_kaldir">HEPSİNİ KALDIR</a></li>
        </ul>
    </div>
    <div id="tahsilat_durumu_id" class="dropdown tahsilat_durumu_filter col-md-1 pull-left" style="display: none;">
        <button class="btn btn-default dropdown-toggle" type="button" id="tahsilat_durumu_button" data-toggle="dropdown">Tahsilat
            <span class="caret"></span>
            <span id="tahsilat_durumu_close" aria-hidden="true">&times;</span>
        </button>
        <ul class="dropdown-menu active" role="menu" aria-labelledby="menu1">
            <div style="padding: 5px!important;">
                <table >
                    <tr>
                        <td>
                            <input id="tahsil_edilmis_checkbox" type="checkbox" name="tahsil_durumu_checkbox" value="1">
                        </td>
                        <td style="padding: 5px;">
                            <a href="javascript:void(0)" id="tahsil_edilmis">Tahsil Edilmiş</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input id="tahsil_edilmemis_checkbox" type="checkbox" name="tahsil_durumu_checkbox" value="0">
                        </td>
                        <td style="padding: 5px;">
                            <a href="javascript:void(0)" id="tahsil_edilmemis">Tahsil Edilmemiş</a>
                        </td>
                    </tr>
                    <hr class="divider">
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-success">Uygula</button>
                        </td>
                    </tr>
                </table>
            </div>
        </ul>
    </div>
    <div id="duzenlenme_tarihi_id" class="dropdown duzenlenme_tarihi_filter col-md-2 pull-left" style="display: none; margin-right:10px;">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Düzenlenme<span class="caret"></span>
            <span id="duzenlenme_tarihi_close" aria-hidden="true">&times;</span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <div style="padding: 10px!important;">
                <ul>
                    <li>AĞUSTOS</li>
                    <li>TEMMUZ</li>
                    <li>HAZİRAN</li>
                    <li>MAYIS</li>
                    <li>NİSAN</li>
                    <li>MART</li>
                    <li>ŞUBAT</li>
                    <li>OCAK</li>
                </ul>
            </div>
        </ul>
    </div>
    <div id="vade_tarihi_id" class="dropdown vade_tarihi_filter col-md-2 pull-left" style="display: none;margin-right:10px;">
        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
            Vade Tarihi<span class="caret"></span> <span id="vade_tarihi_close" aria-hidden="true">&times;</span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <div style="padding: 10px!important;">
                <ul>
                    <li>AĞUSTOS</li>
                    <li>TEMMUZ</li>
                    <li>HAZİRAN</li>
                    <li>MAYIS</li>
                    <li>NİSAN</li>
                    <li>MART</li>
                    <li>ŞUBAT</li>
                    <li>OCAK</li>
                </ul>
            </div>
        </ul>
    </div>
    <div id="etiket_id" class="dropdown etiket_filter col-md-1 pull-left" style="display: none;">
        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Etiket
            <span class="caret"></span> <span id="etiket_close" aria-hidden="true">&times;</span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <div style="padding: 10px!important;">
                <input type="text" name="etiket_filter">
                <hr class="divider">
                Tüm Etiketler Gelecek
            </div>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#hepsini_kaldir").hide();

        // TAHSİL EDİLMİŞ LİNKİNE TIKLANDIĞINDA CHECKBOX CHECKED YA DA UNCHECKED OLACAK
        $("#tahsil_edilmis").on("click",function(event){
            event.preventDefault();
            $('#tahsil_edilmis_checkbox').each(function () { this.checked = !this.checked; });
        });

        // TAHSİL EDİLMEMİŞ LİNKİNE TIKLANDIĞINDA CHECKBOX CHECKED YA DA UNCHECKED OLACAK
        $("#tahsil_edilmemis").on("click",function(event){
            event.preventDefault();
            $('#tahsil_edilmemis_checkbox').each(function () { this.checked = !this.checked; });
        });

        var countButton = [];

        $("#tahsilat_durumu").on("click",function(){
            countButton[0] = "tahsilat_durumu";
            $(".tahsilat_durumu_filter").show();
            $('#filtrele_span').text("");
            setTimeout(function() {
                $('.tahsilat_durumu_filter').addClass('open');
            });
            $("#tahsilat_durumu").hide();
            $("#hepsini_kaldir").show();
        });
        $("#tahsilat_durumu_close").on("click",function(){
            delete countButton[0]
            if(jQuery.isEmptyObject(countButton)){
                $("#hepsini_kaldir").hide();
                $('#filtrele_span').text("FİLTRELE");
            }
            $("#tahsilat_durumu").show();
            $(".tahsilat_durumu_filter").hide();
        });
        $('.tahsilat_durumu_filter .dropdown-menu').on({
            "click":function(e){
                e.stopPropagation();
            }
        });

        $("#duzenlenme_tarihi").on("click",function(){
            countButton[1] = "düzenlenme tarihi";
            $(".duzenlenme_tarihi_filter").show();
            $('#filtrele_span').text("");
            setTimeout(function() {
                $('.duzenlenme_tarihi_filter').addClass('open');
            });
            $("#duzenlenme_tarihi").hide();
            $("#hepsini_kaldir").show();
        });
        $("#duzenlenme_tarihi_close").on("click",function(){
            delete countButton[1]
            if(jQuery.isEmptyObject(countButton)){
                $("#hepsini_kaldir").hide();
                $('#filtrele_span').text("FİLTRELE");
            }
            $("#duzenlenme_tarihi").show();
            $(".duzenlenme_tarihi_filter").hide();
        });
        $('.duzenlenme_tarihi_filter .dropdown-menu').on({
            "click":function(e){
                e.stopPropagation();
            }
        });

        $("#vade_tarihi").on("click",function(){
            countButton[2] = "vade tarihi";
            $(".vade_tarihi_filter").show();
            $('#filtrele_span').text("");
            setTimeout(function() {
                $('.vade_tarihi_filter').addClass('open');
            });
            $("#vade_tarihi").hide();
            $("#hepsini_kaldir").show();
        });
        $("#vade_tarihi_close").on("click",function(){
            delete countButton[2]
            if(jQuery.isEmptyObject(countButton)){
                $("#hepsini_kaldir").hide();
                $('#filtrele_span').text("FİLTRELE");
            }
            $("#vade_tarihi").show();
            $(".vade_tarihi_filter").hide();
        });
        $('.vade_tarihi_filter .dropdown-menu').on({
            "click":function(e){
                e.stopPropagation();
            }
        });

        $("#etiket").on("click",function(){
            countButton[3] = "etiket";
            $(".etiket_filter").show();
            $('#filtrele_span').text("");
            setTimeout(function() {
                $('.etiket_filter').addClass('open');
            });
            $("#etiket").hide();
            $("#hepsini_kaldir").show();
        });
        $("#etiket_close").on("click",function(){
            delete countButton[3]
            if(jQuery.isEmptyObject(countButton)){
                $("#hepsini_kaldir").hide();
                $('#filtrele_span').text("FİLTRELE");
            }
            $("#etiket").show();
            $(".etiket_filter").hide();
        });
        $('.etiket_filter .dropdown-menu').on({
            "click":function(e){
                e.stopPropagation();
            }
        });

        $("#hepsini_kaldir").on("click",function(){
            $(".tahsilat_durumu_filter").hide();
            $("#tahsilat_durumu").show();
            $(".duzenlenme_tarihi_filter").hide();
            $("#duzenlenme_tarihi").show();
            $(".vade_tarihi_filter").hide();
            $("#vade_tarihi").show();
            $(".etiket_filter").hide();
            $("#etiket").show();
            $("#hepsini_kaldir").hide();
        });

    });
</script>