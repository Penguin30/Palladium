@extends('layouts.main')
@section('content')
	<div class="fix-overflow-all">	
		<section class="payment account autorization-section">
			<div class="container">
				<div class="payment-details bonus-payment autorization-section-details text-center">
					<div class="autorization">
						<div class="heading heading-password">
							<h3>Авторизация</h3>
						</div>
						<div class="mail">
							<p class="mail-password">Одноразовый пароль отправлен<br/>
								на адрес <span>{{ session('email') }}</span>
							</p>
							<form id="auth_code_form" method="POST" action="javascript:void(0)">
								@csrf('hidden_field')
								<input type="text" name="code" placeholder="Ваш код">
								<button type="submit" id="send"><img src="{{ asset('img/sendmail.png') }}" alt=""></button>
							</form>
						</div>
						<div class="forgout">
							<a href="#" class="forgout-mail">Не пришло письмо?</a>
						</div>
						<div class="or">
							<span>Или</span>
						</div>
						<div class="social-auth">
							<a href="#" class="fb-a"><img src="{{ asset('img/facebook-aut.png') }}" alt="">Facebook</a>
							<a href="#" class="g-plus"><img src="{{ asset('img/g-plus-aut.png') }}" alt="">Google</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection