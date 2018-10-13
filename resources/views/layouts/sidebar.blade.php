<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel" >

    <!-- User info -->
    <div class="login-info no-print">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						{{--<img src="{{asset("img/avatars/sunny.png")}}" alt="me" class="online" />--}}
						<span>
							{{auth()->user()->name}}
						</span>
						{{--<i class="fa fa-angle-down"></i>--}}
					</a>
				</span>
    </div>
    <!-- end user info -->

@php

    if(auth()->user()->role_id == 1)    {
        $menu = \App\Menu::whereNull("parent_id")->where("permission",1)->orderBy("order","asc")->get();
    }else{

        if(auth()->user()->role_id == 3){
       $menu = \App\Menu::whereNull("parent_id")->whereIn("id",json_decode(auth()->user()->memberOfAccount["modules"]))->whereIn("id",json_decode(auth()->user()->permissions))->orderBy("order","asc")->get();
    }elseif((auth()->user()->role_id == 2)){

        $menu = \App\Menu::whereNull("parent_id")->whereIn("id",json_decode(auth()->user()->memberOfAccount["modules"]))->orderBy("order","asc")->get();

    }
    }
@endphp
    <nav class="no-print">
        <ul>
            @forelse($menu as $item)

                <li class="{{ Ekko::isActiveRoute($item->route,$output = "active")}}" >
                    <a href="{{$item->is_route == 0 ? $item->route == null ? "#":$item->route:route($item->route,aid())}}"><i class="fa fa-lg fa-fw fa-{{$item->icon}}"></i> <span class="menu-item-parent">{{$item->lang}} </span></a>

                    @if($item->submenu->count())
                    <ul  style="{{ Ekko::areActiveRoutes([$item->group.'.*'],$output = "display:block") }}">
                        @foreach($item->submenu as $item)
                        <li  class="{{ Ekko::isActiveRoute($item->route,$output = "active")}}">
                            <a href="{{$item->is_route == 0 ? $item->route == null ? "#":$item->route:route($item->route,aid())}}" >  {{$item->lang}} </a>
                        </li>
                        @endforeach
                    </ul>
                        @endif
                </li>

            @empty
                <li>
                    <a href="#">{{ trans("sentence.do_not_use_menu_item") }}</a>
                </li>
            @endforelse


        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>
<!-- END NAVIGATION -->
