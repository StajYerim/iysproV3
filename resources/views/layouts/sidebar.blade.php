<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="{{asset("img/avatars/sunny.png")}}" alt="me" class="online" />
						<span>
							{{auth()->user()->name}}
						</span>
						<i class="fa fa-angle-down"></i>
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
    <nav>
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
                    <a href="#">Don't use menu item</a>
                </li>
            @endforelse

            <li class="chat-users top-menu-invisible">
                <a href="#"><i class="fa fa-lg fa-fw fa-comment-o"><em class="bg-color-pink flash animated">!</em></i> <span class="menu-item-parent">Smart Chat API <sup>beta</sup></span></a>
                <ul>
                    <li>
                        <!-- DISPLAY USERS -->
                        <div class="display-users">
                            <input class="form-control chat-user-filter" placeholder="Filter" type="text">
                            <a href="#" class="usr"
                               data-chat-id="cha1"
                               data-chat-fname="Sadi"
                               data-chat-lname="Orlaf"
                               data-chat-status="busy"
                               data-chat-alertmsg="Sadi Orlaf is in a meeting. Please do not disturb!"
                               data-chat-alertshow="true"
                               data-rel="popover-hover"
                               data-placement="right"
                               data-html="true"
                               data-content="
											<div class='usr-card'>
												<img src='img/avatars/5.png' alt='Sadi Orlaf'>
												<div class='usr-card-content'>
													<h3>Sadi Orlaf</h3>
													<p>Marketing Executive</p>
												</div>
											</div>
										">
                                <i></i>Sadi Orlaf
                            </a>

                            <a href="#" class="usr"
                               data-chat-id="cha2"
                               data-chat-fname="Jessica"
                               data-chat-lname="Dolof"
                               data-chat-status="online"
                               data-chat-alertmsg=""
                               data-chat-alertshow="false"
                               data-rel="popover-hover"
                               data-placement="right"
                               data-html="true"
                               data-content="
											<div class='usr-card'>
												<img src='img/avatars/1.png' alt='Jessica Dolof'>
												<div class='usr-card-content'>
													<h3>Jessica Dolof</h3>
													<p>Sales Administrator</p>
												</div>
											</div>
										">
                                <i></i>Jessica Dolof
                            </a>

                            <a href="#" class="usr"
                               data-chat-id="cha3"
                               data-chat-fname="Zekarburg"
                               data-chat-lname="Almandalie"
                               data-chat-status="online"
                               data-rel="popover-hover"
                               data-placement="right"
                               data-html="true"
                               data-content="
											<div class='usr-card'>
												<img src='img/avatars/3.png' alt='Zekarburg Almandalie'>
												<div class='usr-card-content'>
													<h3>Zekarburg Almandalie</h3>
													<p>Sales Admin</p>
												</div>
											</div>
										">
                                <i></i>Zekarburg Almandalie
                            </a>

                            <a href="#" class="usr"
                               data-chat-id="cha4"
                               data-chat-fname="Barley"
                               data-chat-lname="Krazurkth"
                               data-chat-status="away"
                               data-rel="popover-hover"
                               data-placement="right"
                               data-html="true"
                               data-content="
											<div class='usr-card'>
												<img src='img/avatars/4.png' alt='Barley Krazurkth'>
												<div class='usr-card-content'>
													<h3>Barley Krazurkth</h3>
													<p>Sales Director</p>
												</div>
											</div>
										">
                                <i></i>Barley Krazurkth
                            </a>

                            <a href="#" class="usr offline"
                               data-chat-id="cha5"
                               data-chat-fname="Farhana"
                               data-chat-lname="Amrin"
                               data-chat-status="incognito"
                               data-rel="popover-hover"
                               data-placement="right"
                               data-html="true"
                               data-content="
											<div class='usr-card'>
												<img src='img/avatars/female.png' alt='Farhana Amrin'>
												<div class='usr-card-content'>
													<h3>Farhana Amrin</h3>
													<p>Support Admin <small><i class='fa fa-music'></i> Playing Beethoven Classics</small></p>
												</div>
											</div>
										">
                                <i></i>Farhana Amrin (offline)
                            </a>

                            <a href="#" class="usr offline"
                               data-chat-id="cha6"
                               data-chat-fname="Lezley"
                               data-chat-lname="Jacob"
                               data-chat-status="incognito"
                               data-rel="popover-hover"
                               data-placement="right"
                               data-html="true"
                               data-content="
											<div class='usr-card'>
												<img src='img/avatars/male.png' alt='Lezley Jacob'>
												<div class='usr-card-content'>
													<h3>Lezley Jacob</h3>
													<p>Sales Director</p>
												</div>
											</div>
										">
                                <i></i>Lezley Jacob (offline)
                            </a>

                            <a href="ajax/chat.html" class="btn btn-xs btn-default btn-block sa-chat-learnmore-btn">About the API</a>

                        </div>
                        <!-- END DISPLAY USERS -->
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>
<!-- END NAVIGATION -->