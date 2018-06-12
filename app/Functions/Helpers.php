<?php

// Aid -> Accounts Id;
use Illuminate\Support\Facades\Auth;

function aid(){

    if (Auth::check()) {

        if(isset(Auth::user()->memberOfAccount->id)){
        return Auth::user()->memberOfAccount->id;
        }
        }


}


function account()
{
    $info = [];
    if (Auth::check()) {
        if (auth()->user()->memberOfAccount["company_name"] != null ){
            $info["name"] = auth()->user()->memberOfAccount["company_name"];
            $info["tax_id"] = auth()->user()->memberOfAccount["tax_id"];
            $info["tax_office"] = auth()->user()->memberOfAccount["tax_office"];
            $info["phone"] = auth()->user()->memberOfAccount["phone"];
            $info["fax"] = auth()->user()->memberOfAccount["fax"];
            $info["email"] = auth()->user()->memberOfAccount["email"];
            $info["city"] = auth()->user()->memberOfAccount["city"];
            $info["town"] = auth()->user()->memberOfAccount["town"];
            $info["address"] = auth()->user()->memberOfAccount["address"];
        }


    }

    return $info;
}



function routers($route, $data = array())
{
    return route($route, [aid(), $data]);
}


function shorten($text, $str = 10)
{
    if (strlen($text) > $str) {
        if (function_exists("mb_substr")) $text = mb_substr($text, 0, $str, "UTF-8");
        else $text = substr($text, 0, $str);
    }
    return $text;
}


function vat_list()
{
    return array(
        [
            "id" => 0,
            "name" => "%0 KDV"
        ], [
            "id" => 1,
            "name" => "%1 KDV"
        ], [
            "id" => 8,
            "name" => "%8 KDV"
        ], [
            "id" => 18,
            "name" => "%18 KDV"
        ]
    );
}


function product_type_list()
{

    return array(
        [
            "id" => 1,
            "name" => "İLK MADDE VE MALZEME",
            "type" => array(1),
            "hscode" => 150
        ], [
            "id" => 2,
            "name" => "MAMÜLLER (NİHAİ ÜRÜN)",
            "type" => array(2, 3),
            "hscode" => 152
        ], [
            "id" => 3,
            "name" => "TİCARİ MALLAR",
            "type" => array(1, 2, 3),
            "hscode" => 153
        ], [
            "id" => 4,
            "name" => "İLK MADDE VE MALZEME GİDERLERİ",
            "type" => array(1),
            "hscode" => 790
        ]

    );
}


function colors()
{

    return array(
        '#5cbc68',
        '#f26650',
        '#00ade0',
        '#fdb813',
        '#4b893a',
        '#f58356',
        '#0071bc',
        '#fbbd9f',
        '#d5d226',
        '#f386a1',
        '#524fa1',
        '#7f3f98',
        '#a4daab',
        '#f8a89b',
        '#7ae0ff',
        '#fee09a',
        '#b3f1a2',
        '#f0d2c6',
        '#adc9dc',
        '#dbc7bd',
        '#dcdbad',
        '#fecdd9',
        '#bbb9e4',
        '#d1a6e2');

}


function rand_color()
{
    $colors = colors();
    $random = array_rand($colors, 1);
    return $colors[$random];

}

function money_db_format($value, $currency = null)
{

    $sonuc = str_replace(".", "", $value);
    $sonuc = str_replace(",", ".", $sonuc);
    return $sonuc;
}


function get_money($value, $currency = 2)
{
    return number_format($value, $currency, ",", ".");
}

function product_img_url($img)
{
    return "/images/account/" . aid() . "/product/" . $img;
}

function movements_type($action = 7)
{
    if ($action == 1) {
        return array(
            [
                "id" => 0,
                "name" => "ÜRETİMDEN GİRİŞ FİŞİ"
            ],
            [
                "id" => 1,
                "name" => "SAYIM FAZLASI FİŞİ"
            ],
            [
                "id" => 2,
                "name" => "GİRİŞ İRSALİYESİ FİŞİ"
            ]
        );

    } elseif($action == 0){
        return array(
            [
                "id" => 3,
                "name" => "ÇIKIŞ İRSALİYESİ"
            ],
            [
                "id" => 4,
                "name" => "PERAKENDE SATIŞ İRSALİYESİ"
            ],
            [
                "id" => 5,
                "name" => "ALIM İADE İRSALİYESİ"
            ],
            [
                "id" => 6,
                "name" => "SAYIM EKSİĞİ FİŞİ"
            ],
            [
                "id" => 7,
                "name" => "FİRE FİŞİ"
            ],
            [
                "id" => 8,
                "name" => "SARF FİŞİ"
            ],
            [
                "id" => 9,
                "name" => "NUMUNE ÇIKIŞ FİŞİ"
            ],
            [
                "id" => 10,
                "name" => "ÜRETİME ÇIKIŞ FİŞİ"
            ]
        );
    }else{
        return array(
            [
                "id" => 0,
                "name" => "ÜRETİMDEN GİRİŞ FİŞİ"
            ],
            [
                "id" => 1,
                "name" => "SAYIM FAZLASI FİŞİ"
            ],
            [
                "id" => 2,
                "name" => "GİRİŞ İRSALİYESİ FİŞİ"
            ],
            [
                "id" => 3,
                "name" => "ÇIKIŞ İRSALİYESİ"
            ],
            [
                "id" => 4,
                "name" => "PERAKENDE SATIŞ İRSALİYESİ"
            ],
            [
                "id" => 5,
                "name" => "ALIM İADE İRSALİYESİ"
            ],
            [
                "id" => 6,
                "name" => "SAYIM EKSİĞİ FİŞİ"
            ],
            [
                "id" => 7,
                "name" => "FİRE FİŞİ"
            ],
            [
                "id" => 8,
                "name" => "SARF FİŞİ"
            ],
            [
                "id" => 9,
                "name" => "NUMUNE ÇIKIŞ FİŞİ"
            ],
            [
                "id" => 10,
                "name" => "ÜRETİME ÇIKIŞ FİŞİ"
            ]
        );
    }
}

// TR Tarih Formatı
function date_tr(){
    return \Carbon\Carbon::now()->format("d.m.Y");
}
//Global Tarih Formatı
function date_local(){
    return \Carbon\Carbon::now()->format("Y-m-d");
}

//Türkiye için olan tarih formatını datetime formatına getir
function date_convert($tarih)
{

    if(strstr($tarih,"-")){

        if($tarih == "Bilinmiyor")
        {
            return null;
        }elseif($tarih == ""){
            return null;
        }else{

            $datetime = $tarih;
            return $datetime;
        }

    } else {
        if($tarih == "Bilinmiyor")
        {
            return null;
        }elseif($tarih == ""){
            return null;
        }else{

            $date = explode(".", $tarih);
            $datetime = $date[2]."-".$date[1]."-".$date[0];
            return $datetime;
        }

    }


}

//KDVnin oranına göre hesaplama
if (! function_exists('KdvTotal')) {

    function KdvTotal($array = [], $kdvorani = 0) {
        global $kdvTutari;
        $kdvTutari = 0;
        foreach ($array as $arr) {

            if ($arr->vat == $kdvorani) {


                        $toplamTutar = (money_db_format($arr->quantity) * money_db_format($arr->price)) * (1+($kdvorani/100));
                        $kdvsizTutar = money_db_format($arr->quantity) * money_db_format($arr->price);
                        $sonuc = $toplamTutar - $kdvsizTutar;

                $kdvTutari += $sonuc;

            }
        }

        return get_money($kdvTutari);
    }

}


//Yazı ile
function yazi_ile($sayi, $kurusbasamak, $parabirimi, $parakurus, $diyez, $bb1, $bb2, $bb3)
{

    $sayi = money_db_format($sayi);
// kurusbasamak virgülden sonra gösterilecek basamak sayısı
// parabirimi = TL gibi , parakurus = Kuruş gibi
// diyez başa ve sona kapatma işareti atar # gibi

    $b1 = array("", "BİR", "İKİ", "ÜÇ", "DÖRT", "BEŞ", "ALTI", "YEDİ", "SEKİZ", "DOKUZ");
    $b2 = array("", "ON", "YİRMİ", "OTUZ", "KIRK", "ELLİ", "ALTMIŞ", "YETMİŞ", "SEKSEN", "DOKSAN");
    $b3 = array("", "YÜZ", "BİN", "MİLYON", "MİLYAR", "TRİLYON", "KATRİLYON");

    if ($bb1 != null) { // farklı dil kullanımı yada farklı yazım biçimi için
        $b1 = $bb1;
    }
    if ($bb2 != null) { // farklı dil kullanımı
        $b2 = $bb2;
    }
    if ($bb3 != null) { // farklı dil kullanımı
        $b3 = $bb3;
    }

    $say1 = "";
    $say2 = ""; // say1 virgül öncesi, say2 kuruş bölümü
    $sonuc = "";

    $sayi = str_replace(",", ".", $sayi); //virgül noktaya çevrilir

    $nokta = strpos($sayi, "."); // nokta indeksi

    if ($nokta > 0) { // nokta varsa (kuruş)

        $say1 = substr($sayi, 0, $nokta); // virgül öncesi
        $say2 = substr($sayi, $nokta, strlen($sayi)); // virgül sonrası, kuruş

    } else {
        $say1 = $sayi; // kuruş yoksa
    }

    $son;
    $w = 1; // işlenen basamak
    $sonaekle = 0; // binler on binler yüzbinler vs. için sona bin (milyon,trilyon...) eklenecek mi?
    $kac = strlen($say1); // kaç rakam var?
    $sonint; // işlenen basamağın rakamsal değeri
    $uclubasamak = 0; // hangi basamakta (birler onlar yüzler gibi)
    $artan = 0; // binler milyonlar milyarlar gibi artışları yapar
    $gecici;

    if ($kac > 0) { // virgül öncesinde rakam var mı?

        for ($i = 0; $i < $kac; $i++) {

            $son = $say1[$kac - 1 - $i]; // son karakterden başlayarak çözümleme yapılır.
            $sonint = $son; // işlenen rakam Integer.parseInt(

            if ($w == 1) { // birinci basamak bulunuyor

                $sonuc = $b1[$sonint] . $sonuc;

            } else if ($w == 2) { // ikinci basamak
                $sonuc = $b2[$sonint] . $sonuc;
            } else if ($w == 3) { // 3. basamak
                if ($sonint == 1) {
                    $sonuc = $b3[1] . $sonuc;
                } else if ($sonint > 1) {
                    $sonuc = $b1[$sonint] . $b3[1] . $sonuc;
                }
                $uclubasamak++;
            }
            if ($w > 3) { // 3. basamaktan sonraki işlemler
                if ($uclubasamak == 1) {
                    if ($sonint > 0) {
                        $sonuc = $b1[$sonint] . $b3[2 + $artan] . $sonuc;
                        if ($artan == 0) { // birbin yazmasını engelle
                            $sonuc = str_replace($b1[1] . $b3[2], $b3[2], $sonuc);
                        }
                        $sonaekle = 1; // sona bin eklendi
                    } else {
                        $sonaekle = 0;
                    }
                    $uclubasamak++;
                } else if ($uclubasamak == 2) {

                    if ($sonint > 0) {
                        if ($sonaekle > 0) {
                            $sonuc = $b2[$sonint] . $sonuc;
                            $sonaekle++;
                        } else {
                            $sonuc = $b2[$sonint] . $b3[2 + $artan] . $sonuc;
                            $sonaekle++;
                        }
                    }
                    $uclubasamak++;
                } else if ($uclubasamak == 3) {

                    if ($sonint > 0) {
                        if ($sonint == 1) {
                            $gecici = $b3[1];
                        } else {
                            $gecici = $b1[$sonint] . $b3[1];
                        }
                        if ($sonaekle == 0) {
                            $gecici = $gecici . $b3[2 + $artan];
                        }
                        $sonuc = $gecici . $sonuc;
                    }
                    $uclubasamak = 1;
                    $artan++;
                }
            }
            $w++; // işlenen basamak
        }
    } // if(kac>0)
    if ($sonuc == "") { // virgül öncesi sayı yoksa para birimi yazma
        $parabirimi = "";
    }

    $say2 = str_replace(".", "", $say2);
    $kurus = "";

    if ($say2 != "") { // kuruş hanesi varsa

        if ($kurusbasamak > 3) { // 3 basamakla sınırlı
            $kurusbasamak = 3;
        }
        $kacc = strlen($say2);
        if ($kacc == 1) { // 2 en az
            $say2 = $say2 . "0"; // kuruşta tek basamak varsa sona sıfır ekler.
            $kurusbasamak = 2;
        }
        if (strlen($say2) > $kurusbasamak) { // belirlenen basamak kadar rakam yazılır
            $say2 = substr($say2, 0, $kurusbasamak);
        }

        $kac = strlen($say2); // kaç rakam var?
        $w = 1;

        for ($i = 0; $i < $kac; $i++) { // kuruş hesabı

            $son = $say2[$kac - 1 - $i]; // son karakterden başlayarak çözümleme yapılır.
            $sonint = $son; // işlenen rakam Integer.parseInt(

            if ($w == 1) { // birinci basamak

                if ($kurusbasamak > 0) {
                    $kurus = $b1[$sonint] . $kurus;
                }

            } else if ($w == 2) { // ikinci basamak
                if ($kurusbasamak > 1) {
                    $kurus = $b2[$sonint] . $kurus;
                }

            } else if ($w == 3) { // 3. basamak
                if ($kurusbasamak > 2) {
                    if ($sonint == 1) { // 'biryüz' ü engeller
                        $kurus = $b3[1] . $kurus;
                    } else if ($sonint > 1) {
                        $kurus = $b1[$sonint] . $b3[1] . $kurus;
                    }
                }
            }
            $w++;
        }
        if ($kurus == "") { // virgül öncesi sayı yoksa para birimi yazma
            $parakurus = "";
        } else {
            $kurus = $kurus . " ";
        }
        $kurus = $kurus . $parakurus; // kuruş hanesine 'kuruş' kelimesi ekler
    }

    $sonuc = $diyez . $sonuc . " " . $parabirimi . " " . $kurus . $diyez;
    return $sonuc;
}
