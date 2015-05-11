<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner container">
        <div class="page-logo">
            <a href="{{ action('Admin\HomeController@index') }}">
                <img src="{{ asset('/images/logo-default.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>

        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            {!! FA::x2('user') !!}
                            <span class="username username-hide-on-mobile">
                                {{ Auth::user()->name }}
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="extra_profile.html">
                                    {!! FA::icon('user') !!} My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('auth/logout') }}">
                                    {!! FA::icon('key') !!} Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
