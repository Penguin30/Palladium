@extends('layouts.main')
@section('content')
<?php $Carbon = new \Carbon\Carbon(); ?>
<div class="fix-overflow-all">		
	<input type="hidden" class="showtime_id" value="{{ $hall['showtime']['id'] }}">	
	<section class="payment payment-seats">
		<div class="container">
			<a href="{{ Request::server('HTTP_REFERER') }}" class="get-back"><img src="{{ asset('img/arrow-back.png') }}" alt="">Назад</a>
			<div class="payment-details">
				<div class="row">
					<div class="col-xl-6">
						<div class="hall-seats">
							<img src="{{ asset('img/screen-scheme.png') }}" alt="" class="mobile-screen">
							@for($i = 1; $i <= $hall['hall']['rowsCount']; $i++)
								<div class="seats-row @if($i == 1) first @else two @endif" data-row="{{ $i }}">
									<span class="number-of-row">{{ $i }}</span>
									@foreach($hall['scheme']['seat'] as $seat)
										@if($seat['row'] == $i)
											@if($seat['status'] == 1)
												<div class="seat-item-square @if($seat['priceId'] == 0) yellow @elseif($seat['priceId'] == 1) light-brown @elseif($seat['priceId'] == 2) dark-brown @endif seat-place" data-place="{{ $seat['seat'] }}" data-price="{{ $seat['price'] }}"></div>
											@else
												<div class="seat-item-square bought seat-place" style="cursor: initial;" data-place="{{ $seat['seat'] }}" data-price="{{ $seat['price'] }}"></div>
											@endif
										@endif
									@endforeach
								</div>
							@endfor
							</div>
							<div class="seats-cost text-center">
								<?php $i=0; ?>
								@foreach($hall['priceList']['price'] as $price)
									<div class="cost-item">
										@if($i == 0)
											<div class="square__yellow"></div>
										@elseif($i == 1)
											<div class="square__light-brown"></div>
										@elseif($i == 2)
											<div class="square__dark-brown"></div>
										@endif
										<span class="cost">{{ $price }} грн</span>
									</div>
									<?php $i++; ?>
								@endforeach								
							</div>
						</div>
						<div class="col-xl-6">
							<div class="cart-heading ">
								<div class="image clearfix">
									<img src="{{ $show['show']['posterUrl'] }}" alt="">
								</div>
								<div class="head-of-ticket">
									<h3>{{ $show['show']['name'] }}<span class="year-allowed">{{ $show['show']['ageLimit'] }}+</span></h3>
									<span class="when">{{ $Carbon->parse($hall['showtime']['date'])->formatLocalized('%A, %d %B %H:%M') }}   Зал «{{ $hall['hall']['name'] }}»</span>
								</div>
							</div>
							<div class="chosen-seats">
								<h4>Выберите места</h4>
								<div class="buy-price-info d-none">
									<div class="info-wrapper">
										<img src="/img/info.png" alt="">
										<p>Вы можете оплатить бонусами 1 грн = 1 бонус</p>
									</div>
									<span class="price-final"><span class="uan">0</span> грн</span>
									<a class="payment-buy-button" href="javscript:void(0)">Купить</a>
								</div>
							</div>
							@if($hall['showtime']['is3d'] == 'y')
								<div class="wrapper-glasses">
									<div class="glasses-notification">
										<img src="{{ asset('img/glasses.png') }}" alt="">
										<p>Внимание! Купить 3D очки (X-filters) можно в кассе кинотеатра. Стоимость очков от 10 грн.</p>
									</div>	
								</div>	
							@endif
						</div>
					</div>  
				</div>
			</div>
	</section>
@endsection