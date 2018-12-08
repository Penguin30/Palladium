@extends('layouts.main')
@section('content')
<?php $Carbon = new Carbon\Carbon; ?>
<div class="fix-overflow-all">			
	<section class="payment payment-seats">
		<div class="container">
			<a href="{{ \Request::server('HTTP_REFERER') }}" class="get-back"><img src="{{ asset('img/arrow-back.png') }}" alt="">Назад</a>
			<div class="payment-details payment-way">
				<div class="row">
					<div class="col-sm-6">
						<div class="info-left">
							<div class="cart-heading ">
								<div class="image clearfix">
									<img src="{{ $showtime['show']['posterUrl'] }}" alt="">
								</div>
								<div class="head-of-ticket">
									<h3>{{ $showtime['show']['name'] }} <span class="year-allowed">{{ $showtime['show']['ageLimit'] }}+</span></h3>
									<span class="when">{{ $Carbon->parse($hall['showtime']['date'])->formatLocalized('%A, %d %B %H:%M') }}   Зал «{{ $hall['hall']['name'] }}»</span>
								</div>
							</div>						
							<div class="seats-filled">
								<?php $total_price = 0; ?>
								@foreach($seats as $seat)
									@foreach($hall['scheme']['seat'] as $hseat)
										@if($seat == $hseat['id'])
											<?php $total_price += $hseat['price']; ?>
											<div class="seat-row-gought">
												<div class="row">
													<div class="col-md-3">
														<span class="chosen-row">Ряд <span class="row-n">{{ $hseat['row'] }}</span></span>
													</div>
													<div class="col-md-4">
														<span class="chosen-row">Место <span class="row-n">{{ $hseat['seat'] }}</span></span>
													</div>
													<div class="col-md-5 text-right">
														<span class="chosen-row"><span class="row-n">{{ $hseat['price'] }}</span><span class="uah"> грн.</span></span>
													</div>
												</div>
											</div>
										@endif
									@endforeach
								@endforeach
							</div>
							<div class="payment-info">
								<div class="row">
									<div class="col-12">
										<div class="text-right" style="cursor: initial;">
											<span class="price-final">
												<span class="opacied">{{ $total_price }} <span class="uah">грн.</span></span>
											</span>
										</div>
									</div>
								</div>
							</div>
							@if($showtime['showtime']['']['is3d'] == 'y')
								<div class="glasses-notification">
									<img src="{{ asset('img/glasses.png') }}" alt="">
									<p>Внимание! Купить 3D очки (X-filters) можно в кассе кинотеатра. Стоимость очков от 10 грн.</p>	
								</div>
							@endif
						</div>
					</div>
					@if(session('token'))
					 	<div class="col-sm-6">
							<div class="authorized-payment text-center">
								<p class="you-entered">Вы вошли как <b>{{ session('email') }}</b></p>
								<div class="wrapper">
							    	<div class="tabs">
							        	<span class="tab">Оплатить картой</span>
							        	<span class="tab">Оплатить бонусами</span>    
							    	</div>
							    	<div class="tab_content">
							        	<div class="tab_item">
											<form action="/showtime/pay/{{ $showtime['showtime']['']['id'] }}" id="pay_card_form" method="POST">
												<input name="p_type" type="hidden" value="card">
												@csrf
												<label for="email">Почта для получения билетов*</label>
												<input id="email" name="email" type="email" value="{{ $user->email }}" class="confirmed">
												<label for="tel">Получить коды билетов в SMS</label>
												<input type="text" placeholder="(0xx) xxx xx xx" id="tel" value="{{ $user->phone }}" name="tel">
												<button type="submit" class="pay" style="cursor: pointer;">Перейти к оплате</button>
												{{-- <a href="#" class="agree-payment">Я соглашаюсь с правилами покупки</a> --}}
												@foreach($seats as $seat)
													<input type="hidden" value="{{ $seat }}" name="seats[]">
												@endforeach
											</form> 			
								        </div>
								        <div class="tab_item">
											<form action="/showtime/pay/{{ $showtime['showtime']['']['id'] }}" method="post">
												@csrf
											  	<input name="p_type" type="hidden" value="bonus">
												<label>Почта для получения билетов*</label>
												<input type="text" value="{{ $user->email }}">
												<label>Получить коды билетов в SMS</label>
												<input type="text" placeholder="0xx xxx xx xx" value="{{ $user->phone }}">
												<button type="submit" class="pay">Перейти к оплате</button>
												{{-- <a href="#" class="agree-payment">Я соглашаюсь с правилами покупки</a> --}}
												@foreach($seats as $seat)
													<input type="hidden" value="{{ $seat }}" name="seats[]">
												@endforeach
											</form>
								        </div>
							    	</div>
								</div>
							</div>
						</div> 
					@else
						<div class="col-md-6">
							<div class="autorization">
								<div class="heading">
									<h3>Авторизация</h3>
								</div>
								<div class="mail">
									<h4>С помощью почты</h4>
									<p>На почту придет одноразовый пароль</p>
									<form>
										<input type="text" placeholder="Ваш Email">
										<button id="send"><img src="img/sendmail.png" alt=""></button>
									</form>
								</div>
								<div class="or">
									<span>Или</span>
								</div>
								<div class="social-auth">
									<a href="#" class="fb-a"><img src="img/facebook-aut.png" alt="">Facebook</a>
									<a href="#" class="g-plus"><img src="img/g-plus-aut.png" alt="">Google</a>
								</div>
							</div>
						</div> 
					@endif
				</div>
			</div>
	</section>
@endsection