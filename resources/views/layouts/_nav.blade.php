<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endguest

                @auth
                    {{-- Admin and User has same profile, for now--}}
                    <li><a class="nav-link" href="{{ \App\User::getMyProfileRoute() }}">Profile</a></li>
                    {{-- We have either admin or other users (owner or user roles) --}}
                    @admin
                        <li><a class="nav-link" href="{{ route('companies.create') }}">Create Company</a></li>
                        <li><a class="nav-link" href="{{ route('companies.index') }}">Company list</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.index') }}">User list</a></li>
                    @else
                        {{-- Checks whether user has perrmission to view 'Company Profile'. Pls refer to CompanyProfilePolicy class. --}}
                        @can('view', \App\Account::class)
                            <li><a class="nav-link" href="{{ \App\Account::getProfileRoute() }}">Company Profile</a></li>
                        @endcan

                        @owner
                        <li><a class="nav-link" href="{{ \App\User::getSettingsRoute() }}">App Settings</a></li>
                        <li><a class="nav-link" href="{{ \App\User::getIndexRoute() }}">User List</a></li>
                        <li><a class="nav-link" href="{{ \App\User::getCreateRoute() }}">Invite User</a></li>
                        @endowner
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>