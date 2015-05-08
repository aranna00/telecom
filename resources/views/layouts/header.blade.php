<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ action('PhoneController@index') }}">Phones</a></li>
            </ul>
        </div>

        <div class="col-xs-12 col-md-6 no-margin">
            <ul class="right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} {!! FA::icon('user') !!}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<header>
    <div class="container no-padding">

        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <div class="logo">
                <a href="index.html">
                    <img alt="logo" src="{{asset('images/logo.svg')}}" width="233" height="54"/>
                </a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
            <div class="contact-row">
                <div class="phone inline">
                    <i class="fa fa-phone"></i> (+31) 625 192 672
                </div>
                <div class="contact inline">
                    <i class="fa fa-envelope"></i> contact@<span class="le-color">tele4.nl</span>
                </div>
            </div>
            <div class="search-area">
                <form>
                    <div class="control-group">
                        <input class="search-field" placeholder="Search for item" />

                        <ul class="categories-filter animate-dropdown">
                            <li class="dropdown">

                                <a class="dropdown-toggle"  data-toggle="dropdown" href="category-grid.html">All brands</a>

                                <ul class="dropdown-menu" role="menu" >
                                    @foreach(Cache::get('brands') as $brand => $model)
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ $brand }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                        <a class="search-button" href="#" ></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
