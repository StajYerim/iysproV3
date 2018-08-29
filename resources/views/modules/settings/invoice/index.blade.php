@extends('layouts.master')
@section('content')
    <style>
        .draggable_area {
            padding-left: 10px!important;
            background-color:#eddfe0;
            border:1px solid black;
        }
        .selector1{
            width:200px;
            height:50px;
            background-color: orange;
            cursor: move;
            /*margin-left: 30px!important;*/
        }
        .selector2{
            width:200px;
            height:50px;
            background-color: pink;
            cursor: move;
            /*margin-left: 30px!important;*/
        }
        .duzenlenmeTarihi{
            width: 100px;
            height:30px;
            background-color: green;
            color: white;
            cursor: move;
            /*margin-left: 550px!important;*/
        }
        .brut_toplam{
            width: 100px;
            height:30px;
            background-color: red;
            color: white;
            cursor: move;
            /*margin-left: 550px!important;*/
        }
        .kdv{
            width: 100px;
            height:30px;
            background-color: red;
            color: white;
            cursor: move;
            /*margin-left: 550px!important;*/
        }
        .toplam{
            width: 100px;
            height:30px;
            background-color: red;
            color: white;
            cursor: move;
            /*margin-left: 550px!important;*/
        }
        .invoiceTable table{
            border-collapse: collapse;
        }
        .invoiceTable table, th,td{
            border: 1px solid black;
        }
    </style>
    <div class="container" style="margin-bottom: 25px; margin-top: 15px;">
        <div>
            <button class="btn btn-success">Tasarımı Kaydet</button>
            <button class="btn btn-info">Test Sayfası Hazırla</button>
            <button class="btn btn-danger">Şablonu Sil</button>
            <button class="btn btn-warning">Geriye Dön</button>
        </div>
    </div>
    <div class="">
        <div style="width:793px; height: 1122px;">
            <div class="draggable_area">


                <div class="duzenlenmeTarihi">20.07.2018</div>
                <div class="selector1">
                    ÖRNEK SANAYİ ŞİRKETİ SELECTOR 1
                </div>
                <div class="selector2">
                    ÖRNEK SANAYİ FİRMASI SELECTOR 2
                </div>
                <div class="koparan_kisi">
                    FİŞİ KOPARAN KİŞİ : ÜMİT UZ
                </div>
                <div class="para">
                    sekiyüzdoksanaltıliraseksenkuruş
                </div>



                <div class="brut_toplam">
                    BRUT TOPLAM
                </div>
                <div class="kdv">
                    KDV
                </div>
                <div class="toplam">
                    TOPLAM
                </div>

                <div class="invoiceTable">
                    <table border="1" style="width: 660px; height: 530px; cursor: move;">
                        <tr>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                        </tr>
                        <tr>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset("js/touch-punch.min.js") }}"></script>
    <script>
        $(function() {
            var x1Position = 233;
            var y1Position = 126;
            var x1Width    = 793.7007874;
            var y1Width    = 1122.519685;
             $('.selector1').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });
            $('.selector2').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.duzenlenmeTarihi').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.para').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.brut_toplam').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.toplam').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.koparan_kisi').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.kdv').draggable({
                containment:[x1Position,y1Position,x1Width,y1Width],
                drag: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left - x1Position;
                    var yPos = offset.top - y1Position;
                    $(this).text('x: ' + xPos + 'y: ' + yPos);

                },

            });

            $('.invoiceTable').draggable({
               containment:[x1Position,y1Position,367,382]
                // containment:[x1Position,y1Position,x1Width,y1Width],
            });




        });

    </script>
@endsection