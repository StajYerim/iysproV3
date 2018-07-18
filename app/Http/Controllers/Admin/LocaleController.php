<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Language_lines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LocaleController extends Controller
{
    public function index()
    {
        $langs = Language::All();
        $language_lines = Language_lines::All()->sortByDesc("updated_at");
        return view("admin.locale.index", compact("langs", "language_lines"));
    }

    public function post_modal_form($type)
    {
        $langs = Language::all();
        $type == 0 ? "" : $line = Language_lines::find($type);

        return view("admin.locale.form", compact("type", "langs", "line"));
    }

    public function post_modal_form_store($id, Request $request)
    {

        $this->validate($request,[
            'group' => 'required',
            'key' => 'required'
        ],
            ["group.required"=>"Group name required"]);

        Language_lines::UpdateOrCreate(
            ["id" => $id],
            [
                "group" => request("group"),
                "key" => request("key"),
                "text" => json_encode(request("lang_name"))
            ]);
        return redirect()->route("admin.locale.index");
    }

    public function destroy($id)
    {
        Language_lines::where("id",$id)->delete();

        return redirect()->back();
    }
}
