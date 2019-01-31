@extends('layouts.main')
@section('content')
<div class="fix-overflow-all">	
	<section class="payment account autorization-section">
		<div class="container">
			<div class="payment-details bonus-payment autorization-section-details text-center">
				<div class="autorization">
					<div class="heading">
						<h3>Авторизация</h3>
					</div>
					<div class="mail">
						<h4>С помощью почты</h4>
						<p>На почту придет одноразовый пароль</p>
						<form method="POST" action="/account/login">
							@csrf('hidden_field')
							<input type="email" name="email" placeholder="Ваш Email">
							<button type="submit" id="send"><img src="{{ asset('img/sendmail.png') }}" alt=""></button>
						</form>
					</div>
					<div class="or">
						<span>Или</span>
					</div>
					<div class="social-auth">
						<a href="/account/login/facebook" class="fb-a"><img src="{{ asset('img/facebook-aut.png') }}" alt="">Facebook</a>
						<a href="/account/login/google" class="g-plus"><img src="{{ asset('img/g-plus-aut.png') }}" alt="">Google</a>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection