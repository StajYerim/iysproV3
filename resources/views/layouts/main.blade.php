<!-- MAIN PANEL -->
<div id="main" role="main" style="margin-top:25px;">
    @include("layouts.ribbon")
    <!-- MAIN CONTENT -->
        <div id="content" >
            @include('flash::message')
@yield("content")
        </div>
</div>