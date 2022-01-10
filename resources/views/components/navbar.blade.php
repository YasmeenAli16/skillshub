<nav id="nav">
    <form id=logout-form action="{{ url('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
       <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ url("/") }}">@lang('messages.Home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('messages.Categories')<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($categories as $category)
                <li><a href="{{ url("categories/show/{$category->id}") }}">{{ $category->name() }}</a></li>
                @endforeach
                <li><a href="{{ url("categories/show/{$category->id}") }}">Programming</a></li>


            </ul>
        </li>
        <li><a href="{{ url("/contact") }}">@lang('messages.Contact')</a></li>
        @guest
        <li><a href="{{ url('login') }}">@lang('messages.Sign In')</a></li>
        <li><a href="{{ url('register') }}">@lang('messages.Sign Up')</a></li>
        @endguest

        @auth
        @if(Auth::user()->role->name == 'student')
        <li><a href="{{ url('profile') }}">@lang('messages.Profile')</a></li>
        @else
        <li><a href="{{ url('dashboard') }}">@lang('messages.Dashboard')</a></li>
        @endif
        <li><a id="logout-link" href="{{ url('logout') }}">@lang('messages.Logout')</a></li>
        @endauth
        @if (App::getLocale() == 'ar')
        <li><a href="{{url('lang/en')}}">English</a></li>
        @else
        <li> <a href="{{url('lang/ar')}}">اللغة العربية</a></li>
        @endif


    </ul>
</nav>
