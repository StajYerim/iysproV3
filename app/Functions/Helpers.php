<?php

// Aid -> Accounts Id;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

function aid(){
    if (!auth()->user()->isAdmin()) {
        return Auth::user()->memberOfAccount->id;
    }
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