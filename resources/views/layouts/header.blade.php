<!-- HEADER -->
<header id="header">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo"> <img src="{{asset("img/logo.png")}}" alt="SmartAdmin"> </span>
        <!-- END LOGO PLACEHOLDER -->

        <!-- Note: The activity badge color changes when clicked and resets the number to 0
        Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
        <span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

        <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
        <div class="ajax-dropdown">

            <!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
            <div class="btn-group btn-group-justified" data-toggle="buttons">
                <label class="btn btn-default">
                    <input type="radio" name="activity" id="ajax/notify/mail.html">
                    Msgs (14) </label>
                <label class="btn btn-default">
                    <input type="radio" name="activity" id="ajax/notify/notifications.html">
                    notify (3) </label>
                <label class="btn btn-default">
                    <input type="radio" name="activity" id="ajax/notify/tasks.html">
                    Tasks (4) </label>
            </div>

            <!-- notification content -->
            <div class="ajax-notifications custom-scroll">

                <div class="alert alert-transparent">
                    <h4>Click a button to show messages here</h4>
                    This blank page message helps protect your privacy, or you can show the first message here
                    automatically.
                </div>

                <i class="fa fa-lock fa-4x fa-border"></i>

            </div>
            <!-- end notification content -->

            <!-- footer: refresh area -->
            <span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..."
                                class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button>
					</span>
            <!-- end footer -->

        </div>
        <!-- END AJAX-DROPDOWN -->
    </div>

    <!-- projects dropdown -->
    <div class="project-context hidden-xs">

        <span class="label"></span>
        <span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent project </head>
            <i
                    class="fa fa-angle-down"></i></span>
        <!-- Suggestion: populate this list with fetch and push technique -->
        <ul class="dropdown-menu">
            <li>
                <a href="javascript:void(0);">Online e-merchant management system - attaching integration with the
                    iOS</a>
            </li>
            <li>
                <a href="javascript:void(0);">Notes on pipeline upgradee</a>
            </li>
            <li>
                <a href="javascript:void(0);">Assesment Report for merchant account</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
            </li>
        </ul>
        <!-- end dropdown-menu-->
    </div>
    <!-- end projects dropdown -->

    <!-- pulled right: nav area -->
    <div class="pull-right">
        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i
                            class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- #MOBILE -->
        <!-- Top menu profile link : this shows only when top menu is active -->
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                    <img src="{{asset("img/avatars/sunny.png")}}" alt="John Doe" class="online"/>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i
                                    class="fa fa-cog"></i> Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i
                                    class="fa fa-user"></i> <u>P</u>rofile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/logout" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i
                                    class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span> <a href="/logout" title="Sign Out" data-action="userLogout"
                      data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i
                            class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i
                            class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->

        <!-- start settings button "only visible for account owner" -->
        @if(auth()->user()->role->id == 2)
        <ul class="header-dropdown-list hidden-xs">

            <li class="pull-right">

                <div class="btn-header transparent pull-right hidden-sm hidden-xs " data-toggle="dropdown">
                    <div>
                        <a href="javascript:void(0)" title="Settings" ><i
                                    class="fa fa-cogs"></i></a>
                    </div>
                </div>

                <ul class="dropdown-menu pull-left">
         <!-- only owner can see this menu item -->

                  <li  class="">
                        <a href="{{route("settings.accounts.profile",aid())}}"><i class="fa fa-suitcase"></i> Company Profile</a>
                    </li>
         <!-- only owner can see this menu item -->

                  <li  class="">
                        <a href="{{route("settings.users.profile",[aid(),auth()->user()->id])}}"><i class="fa fa-user"></i> User Profile</a>
                    </li>
                    <li  class="">
                        <a href=""><i class="fa fa-cogs"></i> General Settings</a>
                    </li>

                    <li  class="">
                        <a href=""><i class="fa fa-cubes"></i> Applications</a>
                    </li>
                    <li  class="">
                        <a href="{{route("users.index",aid())}}"><i class="fa fa-users"></i> Users</a>
                    </li>
                    <li  class="">
                        <a href="{{route("settings.api.index",aid())}}"><i class="fa fa-retweet"></i> Api Info</a>
                    </li>

                </ul>
            </li>
        </ul>
    @endif
              <!-- end settings button "only visible for account owner" -->

        <!-- multiple lang dropdown : find all flags in the flags page -->
        <ul class="header-dropdown-list hidden-xs">
            @php $locale = \App\Language::where("lang_code",app()->getLocale())->first(); @endphp
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{asset("img/blank.gif")}}"
                                                                                 class="flag flag-{{$locale->lang_code == "en" ? "us":$locale->lang_code}}"
                                                                                >
                    <span> {{$locale->name}}</span> <i class="fa fa-angle-down"></i> </a>
                <ul class="dropdown-menu pull-right">
                    @php
                        $langs = \App\Language::All();
                    @endphp

                    @foreach($langs as $lang)
                        <li  @if($lang->lang_code == app()->getLocale()) class="active" @endif >
                            <a href="{{route("lang",$lang->lang_code)}}"><img src="{{asset("img/blank.gif")}}" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}"> {{$lang->name}}</a>
                        </li>
                    @endforeach

                </ul>
            </li>
        </ul>
        <!-- end multiple lang -->


    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->