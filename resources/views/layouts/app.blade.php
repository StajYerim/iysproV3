<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts._head')

<body>

    <div  @auth
          @admin
          @else
         id="wrapper"
         class="toggled"
            @endif

            @endauth >

        @auth
       @admin
        @else

        @include('layouts._sidebar')
        @endif

        @endauth

        @include('flash::message')

        @include('layouts._nav')

        <main class="py-4">
            @yield('login')
        </main>
    </div>

    @include('layouts._scripts')
</body>
</html>
