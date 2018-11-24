@extends('layouts.main')
@section('content')
<?php $Carbon=new Carbon\Carbon; ?>
<div class="fix-overflow-all">
	<section class="slider fix-home wow fadeInRightBig">
		<div class="slider-home">
			@foreach($films_actual as $film)
				@if($Carbon->parse($film['showtime']['']['date'])->format('Y-m-d') == $Carbon->now()->format('Y-m-d'))
					<div>
						<div class="slide">
							<span class="home-slide-gradient"></span>
							<img class="slide-img d-none d-sm-none d-md-none d-lg-none d-xl-block" src="{{ $film['show']['gallery']['posterWide']['url'] }}" alt="">
							<img class="slide-img d-none d-sm-none d-md-none d-lg-block d-xl-none" src="{{ $film['show']['gallery']['posterWide']['url'] }}" alt="">
							<img class="slide-img d-none d-sm-none d-md-block d-lg-none d-xl-none" src="{{ $film['show']['gallery']['posterWide']['url'] }}" alt="">
							<img class="slide-img d-block d-sm-block d-md-none d-lg-none d-xl-none" src="{{ $film['show']['gallery']['posterWide']['url'] }}" alt="">
							<div class="slide__description">
								<div class="container">
									<a href="/films/{{ $film['show']['']['alias'] }}"><h2>{{ $film['show']['name'] }} <span class="availible-year">{{ $film['show']['ageLimit'] }}+</span></h2></a>
									<span class="today">Сегодня, {{ $Carbon::now()->formatLocalized('%d %B') }}</span> <a href="/films/{{ $film['show']['']['alias'] }}" class="other-dates">Другие даты<img class="arrow-others" src="{{ asset('img/arrow-others.png') }}" alt=""><img class="arrow-others-retina" src="{{ asset('img/arrow-others-retina.png') }}" alt=""></a>
									<ul class="availible-sessions">
										@foreach($film['showtimes']['showtime'] as $time)
											@if($Carbon->parse($time['']['date'])->format('Y-m-d') == $Carbon->now()->format('Y-m-d'))
												@if($Carbon->parse($time['']['date'])->format('H:i') < $Carbon->now()->format('H:i'))
													<li><a href="#" class="passed">{{ $Carbon->parse($time['']['date'])->format('H:i') }}</a></li>
												@else
													<li><a href="#">{{ $Carbon->parse($time['']['date'])->format('H:i') }}</a></li>
												@endif
											@endif
										@endforeach
									</ul>
								</div>
							</div>
							<a href="film.html" class="play-button"><img class="play-sprite" src="{{ asset('img/play-sprite.png') }}" alt=""><img class="play-sprite-retina" src="{{ asset('img/play-sprite-retina.png') }}" alt=""></a>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</section>
	@if($post->title)
		<section class="actions actions-mobile wow bounceInUp">
			<div class="container">
				<div class="actions-item">
					<div class="row fix-home-rows">
						<div class="col-sm-12 col-md-6 fix-column-home-mobile">
							<a class="image-action" href="/news/{{ $post->slug }}">
								<img src="{{ Voyager::image($post->image) }}">
							</a>
						</div>
						<div class="col-sm-12 col-md-6 fix-column-home-mobile">
							<a class="home-link-top-block" href="/news/{{ $post->slug }}"><h3 style="bottom: 42px;">{{ $post->title }}</h3></a>
							<p>{{ $post->excerpt }}</p>
							<div class="text-center">
								<a href="/news" class="actions-link">Все акции<span><img class="footer-arrow" src="{{ asset('img/actions-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/arrow-sprite-retina.png') }}" alt=""></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endif
	@if($films_soon['shows-soon']['show'])
		<section class="soon soon-home soon-home-section wow bounceInUp">
			<div class="container soon-home">
				<div class="slider-soon-wrapper">
					<h4>Скоро в прокате <br> PALLADIUM CINEMA</h4>
					<div class="slider-soon">
						@foreach($films_soon['shows-soon']['show'] as $film)
							<div>
								<a href="/films/{{ $film['alias'] }}">
									<div class="soon-item">
										<div class="image">
											<img class="poster-img" src="{{ $film['posterUrl'] }}" alt="">
											<a href="#" class="play-button"><img class="soon-play-image" src="{{ asset('img/play-sprite.png') }}" alt=""><img class="soon-play-image-retina" src="{{ asset('img/play-sprite-retina.png') }}" alt=""></a>
											<span class="movie-name"><a href="/films/{{ $film['alias'] }}">{{ $film['name'] }}</a></span>
										</div>
										<div class="info">
											<div class="row">
												<div class="col">
													<span class="from">c {{ $Carbon::parse($film['releaseDate'])->formatLocalized('%d %b') }}</span>
												</div>
												<div class="col-3">
													<div class="text-right">
														<a href="#" class="buy-ticket">
															<img class="ticket-icon" src="{{ asset('img/ticket-icon.png') }}" alt=""><img class="ticket-icon-retina" src="{{ asset('img/ticket-icon-retina.png') }}" alt="">
															<span>Билеты в продаже</span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	@endif
	<section class="palladium-club palladium-club-home palladium-club-home-section wow fadeInUp" data-wow-delay="0.5s">
		<div class="container">
			<div class="text-center">
				<h2 class="palladium-club-home">Palladium Club</h2>
			</div>
			<div class="cards">
				<div class="row">
					<div class="col-xl col-md-4">
						<div class="card-item gold-card">
							<div class="text-center">
								<img class="gold-card-image" src="img/gold-card.png" alt=""><img class="gold-card-image-retina" src="img/gold-card-retina.png" alt="">
								<h3 class="gold">Gold card</h3>
								<p>Начисляется 15% от приобретения билетов или арены вип-зала Париж. Возможно приобретать билеты онлайн за бонусы.</p>
							</div>
						</div>
					</div>
					<div class="col-xl col-md-4">
						<div class="card-item silver-card">
							<div class="text-center">
								<img class="silver-card-image" src="img/silver-card.png" alt=""><img class="silver-card-image-retina" src="img/silver-card-retina.png" alt="">
								<h3 class="silver">Silver card</h3>
								<p>Начисляется 10% от приобретения билетов или арены вип-зала Париж. Возможно приобретать билеты онлайн за бонусы.</p>
							</div>
						</div>
					</div>
					<div class="col-xl col-md-4">
						<div class="card-item red-card">
							<div class="text-center">
								<img class="red-card-image" src="img/500-card.png" alt=""><img class="red-card-image-retina" src="img/500-card-retina.png" alt="">
								<h3 class="red">Карта 500</h3>
								<p>Приобретая карту на кассе кинотеатра за 420 грн, Вы получаете возможность приобретать билеты или продукцию бара со скидкой -16%. Возможно приобретать билеты онлайн за бонусы.</p>
							</div>
						</div>
					</div>
					<div class="col-xl col-md-6">
						<div class="card-item blue-card-palladium">
							<div class="text-center">
								<img class="blue-card-palladium-image" src="img/vip-card.png" alt=""><img class="blue-card-palladium-image-retina" src="img/vip-card-retina.png" alt="">
								<h3 class="blue">Paris VIP</h3>
								<p>Подарочная карта. Позволяет посетить VIP-зал в любое время.</p>
							</div>
						</div>
					</div>
					<div class="col-xl col-md-6">
						<div class="card-item green-card-palladium">
							<div class="text-center">
								<img class="green-card-palladium-image" src="img/paris-vip-card.png" alt=""><img class="green-card-palladium-image-retina" src="img/paris-vip-card-retina.png" alt="">
								<h3 class="green">Paris VIP 18:00</h3>
								<p>Подарочная карта. Позволяет посетить VIP-зал до 18:00.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-cards">
				<div>
					<div class="card-slide">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12 text-center">
								<img src="img/card-slide.png" alt="">
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="card-description">
									<span class="card-name">Карта 500</span>
									<p>Приобретая карту на кассе кинотеатра за 420 грн, Вы получаете возможность приобретать билеты или продукцию бара со скидкой -16%. Возможно приобретать билеты онлайн за бонусы.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="card-slide">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12 text-center">
								<img src="img/card-slide.png" alt="">
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="card-description">
									<span class="card-name">Карта 500</span>
									<p>Приобретая карту на кассе кинотеатра за 420 грн, Вы получаете возможность приобретать билеты или продукцию бара со скидкой -16%. Возможно приобретать билеты онлайн за бонусы.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="card-slide">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12 text-center">
								<img src="{{ asset('img/card-slide.png') }}" alt="">
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="card-description">
									<span class="card-name">Карта 500</span>
									<p>Приобретая карту на кассе кинотеатра за 420 грн, Вы получаете возможность приобретать билеты или продукцию бара со скидкой -16%. Возможно приобретать билеты онлайн за бонусы.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="about-cinema">
		<div class="row">
			<div class="fix-home-column col-xl-6 col-lg-12 col-md-6 col-12 wow fadeInLeftBig">
				<div class="illustration" style="background-image: url('img/about-image.jpg');">

				</div>
			</div>
			<div class="col-xl-6 col-lg-12 col-md-6 col-12 wow fadeInRightBig">
				<div class="cinema-text">
					<h1>Кинотеатр <br> Palladium Cinema</h1>
					<div class="scrollable-wrapper">
						<div class="scrollable-text">
							<p>Кинотеатр Palladium Cinema в Харькове - это новый взгляд на искусство кино. Это удобство и комфорт в сочетании с демократичными ценами. Это Real D – одна из самых современных технологий проецирования 3D-изображения в мире. Это уникальные экраны с серебряным напылением. Это единственный кинотеатр в Украине, который предоставляет возможность самостоятельно выбирать, что смотреть.</p>
							<p>Кинотеатр Palladium Cinema в Харькове - это новый взгляд на искусство кино. Это удобство и комфорт в сочетании с демократичными ценами. Это Real D – одна из самых современных технологий проецирования 3D-изображения в мире. Это уникальные экраны с серебряным напылением. Это единственный кинотеатр в Украине, который предоставляет возможность самостоятельно выбирать, что смотреть.</p>
							<p>Кинотеатр Palladium Cinema в Харькове - это новый взгляд на искусство кино. Это удобство и комфорт в сочетании с демократичными ценами. Это Real D – одна из самых современных технологий проецирования 3D-изображения в мире. Это уникальные экраны с серебряным напылением. Это единственный кинотеатр в Украине, который предоставляет возможность самостоятельно выбирать, что смотреть.</p>
						</div>						
						<div class="scrollable-text scroll-pane" style="overflow: hidden; padding: 0px; width: 278.938px;">
							
							
							
						<div class="jspContainer" style="width: 278.938px; height: 221.781px;"><div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 278.938px;"><p>Кинотеатр Palladium Cinema в Харькове - это новый взгляд на искусство кино. Это удобство и комфорт в сочетании с демократичными ценами. Это Real D – одна из самых современных технологий проецирования 3D-изображения в мире. Это уникальные экраны с серебряным напылением. Это единственный кинотеатр в Украине, который предоставляет возможность самостоятельно выбирать, что смотреть.</p><p>Кинотеатр Palladium Cinema в Харькове - это новый взгляд на искусство кино. Это удобство и комфорт в сочетании с демократичными ценами. Это Real D – одна из самых современных технологий проецирования 3D-изображения в мире. Это уникальные экраны с серебряным напылением. Это единственный кинотеатр в Украине, который предоставляет возможность самостоятельно выбирать, что смотреть.</p><p>Кинотеатр Palladium Cinema в Харькове - это новый взгляд на искусство кино. Это удобство и комфорт в сочетании с демократичными ценами. Это Real D – одна из самых современных технологий проецирования 3D-изображения в мире. Это уникальные экраны с серебряным напылением. Это единственный кинотеатр в Украине, который предоставляет возможность самостоятельно выбирать, что смотреть.</p></div></div></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection