@extends('web.layout')
@section('title')
| Login
@endsection
@section('main')

<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/page-background.jpg)')}}"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url("/") }}">@lang('messages.Home')</a></li>
                    <li>@lang('messages.Sign In')</li>
                </ul>
                <h1 class="white-text">@lang('messages.Sign In to start exam')</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <h4>@lang('messages.Sign In')</h4>
                    @include('web.inc.message')
                    <form method="POST" action="{{ url('login') }}">
                        @csrf
                        <input class="input" type="email" name="email" placeholder="@lang('messages.Email')">
                        <input class="input" type="password" name="password" placeholder="@lang('messages.Password')">
                        <input type="checkbox" name="remember" id=""> @lang('messages.Remember Me')

                        <button type="submit" class="main-button icon-button pull-right">@lang('messages.Sign In')</button>
                    </form>

                </div>
                <a href="{{ url('forgot-password') }}">@lang('messages.Forgot Password')</a>
            </div>
            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->
@endsection

