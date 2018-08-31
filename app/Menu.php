<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function submenu() {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->orderBy("order","asc");
    }

    public function desc(){
        return $this->hasOne(MenuDescriptions::class,"menu_id","id");
    }

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("show", '=', 1);
    }

    public function getLangAttribute(){

     $data =  MenuDescriptions::where("menu_id",$this->id)->where("lang_code",session("lang"))->count();


     if($data==0){
    $lang =  MenuDescriptions::where("menu_id",$this->id)->where("lang_code","en")->get();
         return $lang[0]->name;
}else{
         $lang =  MenuDescriptions::where("menu_id",$this->id)->where("lang_code",session("lang"))->get();
         return $lang[0]->name;
     }

    }

    public function getRoutesAttribute()
    {
         if($this->route){
            return  route($this->route);
         }else{
             return "#";
         }
    }
}
