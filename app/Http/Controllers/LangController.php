<?php

namespace App\Http\Controllers;

use App\Language;
use App\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function index(Request $request, $lang)
    {
        // Standart dil değişkenleri
        $langs = Language::pluck("lang_code")->toArray();


        // Bu değişkenler içerisinde belirtilen dil seçimi var ise
        if (in_array($lang, $langs)) {
            $lang_id = Language::where("lang_code", $lang)->first();
            // Bu dili kullanıcının "lang" alanına kaydet
            $user = User::find(auth()->user()->id);
            $user->lang_id = $lang_id->lang_id;
            $user->save();


            // Daha sonra session oturumuna belirt.
            $request->session()->put('lang', $lang);

            // Geldiği sayfaya dön
            return redirect()->back();
        }
    }
}
