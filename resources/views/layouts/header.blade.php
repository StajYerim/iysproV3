<!-- HEADER -->
<header id="header" class="no-print">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        {{--<span id="logo"> <img src="{{asset("img/logo.png")}}" alt="SmartAdmin"> </span>--}}
        <!-- END LOGO PLACEHOLDER -->

    </div>



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
                                    class="fa fa-cog"></i> {{ trans("word.settings") }}</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i
                                    class="fa fa-user"></i> {{ trans("word.profile") }}</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> {{ trans("word.shortcuts") }}</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> {{ trans("sentence.full_screen") }}</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/logout" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i
                                    class="fa fa-sign-out fa-lg"></i> <strong>{{ trans("word.logout") }}</strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span>
                <a href="/logout" title="Sign Out" data-action="userLogout"
                      data-logout-msg="{{ trans("sentence.security_further_after_logging_out") }}"><i
                            class="fa fa-sign-out"></i>
                </a>
            </span>
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
                        <a href="{{ route("company_profile", aid()) }}"><i class="fa fa-suitcase"></i> {{ trans("sentence.company_profile") }}</a>
                    </li>
         <!-- only owner can see this menu item -->

                    <li  class="">
                        <a href="{{route("settings.users.profile",[aid(),auth()->user()->id])}}"><i class="fa fa-user"></i> {{ trans("sentence.user_profile") }}</a>
                    </li>

                    {{--<li  class="">--}}
                        {{--<a href=""><i class="fa fa-cogs"></i> {{ trans("sentence.general_settings") }}</a>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href=""><i class="fa fa-cubes"></i> {{ trans("word.applications") }}</a>--}}
                    {{--</li>--}}
                    <li  class="">
                        <a href="{{ route('settings.home',aid()) }}"><i class="fa fa-cubes"></i> {{ trans("sentence.application_settings") }}</a>
                    </li>
                    <li  class="">
                        <a href="{{route("settings.users.index",aid())}}"><i class="fa fa-users"></i> {{ trans("word.users") }}</a>
                    </li>
                    <li  class="">
                        <a href="{{route("settings.api.index",aid())}}"><i class="fa fa-retweet"></i> {{ trans("sentence.api_informations") }}</a>
                    </li>

                </ul>
            </li>
        </ul>
    @endif
              <!-- end settings button "only visible for account owner" -->
        <!-- multiple lang dropdown : find all flags in the flags page -->
        <ul class="header-dropdown-list hidden-xs">
            @php $locale = \App\Language::where("lang_id",auth()->user()->lang_id)->first();  @endphp
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
                        <li  @if($lang->lang_id == auth()->user()->lang_id) class="active" @endif >
                            <a href="{{route("lang",$lang->lang_code)}}"><img src="{{asset("img/blank.gif")}}" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}"> {{$lang->name}}</a>
                        </li>
                    @endforeach

                </ul>
            </li>
        </ul>
        <!-- end multiple lang -->


    </div>
    <!-- end pulled right: nav area -->
    <!-- breadcrumb -->
    <div>

    </div>
    <!-- end breadcrumb -->
</header>
<!-- END HEADER -->