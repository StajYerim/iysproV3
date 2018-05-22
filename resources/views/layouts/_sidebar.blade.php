@auth
@php $menu = \App\Menu::whereNull("parent_id")->orderBy("order","asc")->get();@endphp
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'iys pro') }}
            </a>
        </li>
        @forelse($menu as $item)
            <li data-toggle="collapse" data-target="#{{$item["id"]}}" class="collapsed">
                <a href="{{$item->routes}}"> <span class="arrow">{{$item->name["name"]}}</span></a>
            </li>
            <ul class="sub-menu collapse" id="{{$item->id}}">
                @foreach($item->submenu as $item)
                    <li><a href="{{$item->routes}}">{{$item->name["name"]}}</a></li>
                @endforeach

            </ul>
        @empty
            Don't use menu item
        @endforelse
    </ul>
</div>
    @endauth