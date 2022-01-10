@extends('web.layout')

@section('title')
| Contact
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
							<li><a href="{{ url('/') }}">@lang('messages.Home')</a></li>
							<li>@lang('messages.Contact')</li>
						</ul>
						<h1 class="white-text">@lang('messages.Keep in touch with us')</h1>

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

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>@lang('messages.Send A Message')</h4>
                            @include('web.inc.message')
							<form method="POST" action="{{ url('contact/message/send') }}">
                                @csrf
								<input class="input" value="{{old('name')}}" type="text" name="name" placeholder="@lang('messages.Name')">
								<input class="input" type="email" name="email" placeholder="@lang('messages.Email')">
								<input class="input" type="text" name="subject" placeholder="@lang('messages.Subject')">
								<textarea class="input" name="body" placeholder="@lang('messages.Enter your Message')"></textarea>
								<button type="submit" class="main-button icon-button pull-right">@lang('messages.Send')</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>@lang('messages.Contact Information')</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>{{ $setting->email }}</li>
							<li><i class="fa fa-phone"></i>{{ $setting->phone }}</li>
						</ul>

					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->

@endsection
