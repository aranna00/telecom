<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu" data-keep="false" data-auto-scroll="true" data-slide-speed="100">
            <li class="start @if(Request::path()==='admin') active @endif">
                <a href="{{ action('Admin\HomeController@index') }}">
                    {!! FA::icon('home') !!}
                    <span class="title">Dashboard</span>
                    @if(Request::path()==='admin') <span class="selected"></span> @endif
                </a>
            </li>
            <li @if(strpos(Request::path(),'admin/phones')!==false) class="active open" @endif>
                <a href="javascript:;">
                    {!! FA::icon('mobile-phone') !!}
                    <span class="title">Phones</span>
                    @if(Request::path()==='admin/phones') <span class="selected"></span> @endif
                    <span class="arrow @if(Request::path()==='admin/phones')open @endif"></span>
                </a>
                <ul class="sub-menu">
                    <li @if(Request::path()==='admin/phones') class="active" @endif>
                        <a href="{{ action('Admin\PhoneController@index') }}">
                            {!! FA::icon('home') !!}
                            Dashboard
                        </a>
                    </li>
                    <li @if(Request::path()==='admin/phones/list') class="active" @endif>
                        <a href="{{ action('Admin\PhoneController@all') }}">
                            {!! FA::icon('list-ul') !!}
                            List View
                        </a>
                    </li>
                    <li @if(Request::path()==='admin/phones/create') class="active" @endif>
                        <a href="{{ action('Admin\PhoneController@create') }}">
                            {!! FA::icon('plus') !!}
                            Add Phone
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>