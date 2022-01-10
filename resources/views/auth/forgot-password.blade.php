@extends('web.layout')

@section('title')
| Forgot-Password
@endsection

@section('main')


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
                <h4>@lang('messages.Forgot Password')</h4>
                @include('web.inc.message')
                <form method="POST" action="{{ url('forgot-password') }}">
                    @csrf
                    <input class="input" type="email" name="email" placeholder="@lang('messages.Email')">

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
