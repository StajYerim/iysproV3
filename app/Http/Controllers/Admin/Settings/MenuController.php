<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Menu;
use App\MenuDescriptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    //Menu setting list
    public function index()
    {
        $menus_owner = Menu::whereNull("parent_id")->where("permission", 2)->orderBy("order", "asc")->get();
        $menus_admin = Menu::whereNull("parent_id")->where("permission", 1)->orderBy("order", "asc")->get();
        return view("admin.settings.menus.index")->with(compact('menus_owner', "menus_admin"));
    }

    //Create and Update Menu
    public function store_update(Request $request, $id)
    {

        // validate user's input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $menu = Menu::firstOrCreate(
            ['id' => $id], [
                'parent_id' => $request->top_menu,
                'order' => $request->order,
                'permission' => $request->permission,
                'icon' => $request->icon,
                'route' => $request->url
            ]
        );

        MenuDescriptions::firstOrCreate([
            "menu_id" => $menu->id], [
                'name'=>$request->name,
                'lang_code'=>'en'
        ]);
    }

    //Order post data $request->list
    public function order_post(Request $request)
    {

        MenuController::saveList($request->list);

    }

    //List detail save
    public static function saveList($list, $parent_id = null, &$order = 0)
    {
        foreach ($list as $item) {

            $order++;

            Menu::find($item["id"])
                ->update([
                    "order" => $order,
                    "parent_id" => $parent_id
                ]);


            if (array_key_exists("children", $item)) {
                MenuController::saveList($item["children"], $item["id"], $order);
            }

        }
    }
}
