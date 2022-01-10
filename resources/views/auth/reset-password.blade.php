@extends('web.layout')

@section('title')
| Reset-Password
@endsection

@section('main')

<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <h4>@lang('messages.Reset Password')</h4>
                    @include('web.inc.message')
                    <form method="POST" action="{{ url('reset-password') }}">
                        @csrf
                        <input class="input" type="email" name="email" placeholder="@lang('messages.Email')">
                        <input class="input" type="password" name="password" placeholder="@lang('messages.Password')">
                        <input class="input" type="password" name="password_confirmation" placeholder="@lang('messages.Confirm Password')">
                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        <button type="submit" class="main-button icon-button pull-right">@lang('messages.Submit')</button>
                    </form>
                </div>
            </div>
            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    </div>

@endsection
