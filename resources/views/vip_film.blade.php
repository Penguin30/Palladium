@extends('layouts.main')
@section('content')
<?php $Carbon = new Carbon\Carbon(); ?>
<div class="fix-overflow-all"> 
	<section class="about-movie vip-movie">
		<div class="container">
			<div class="row wow fadeInDownBig">
				<div class="col-12 col-sm-12 col-md-8">
					<h1>Темные времена</h1>
				</div>
				<div class="col-6 col-sm-6 col-md-4 text-right">
					<a href="/vip-hall" class="see-shedule resp-hidden">Вернуться в каталог<img src="{{ asset('img/footer-arrow.png') }}" alt=""></a>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 wow fadeInLeftBig tp-vip-film">
					<div class="video">
						<?php $trailer = json_decode($film->trailer); ?>
						<?php $link = $trailer[0]->download_link; ?>
						<video>
							<source src="{{ Voyager::image($link) }}" type="video/mp4">
						</video>
						<a class="play-button current-film"><span><img class="play-sprite" src="{{ asset('img/play-sprite.png') }}" alt=""><img class="play-sprite-retina" src="{{ asset('img/play-sprite-retina.png') }}" alt=""></span></a>
						<div id="video-controls">
							<div class="row">
								<div class="col-10">
								</div>
								<div class="col-1">
										<img src="{{ asset('img/volume-mute-solid.svg') }}" class="muted">
										<img src="{{ asset('img/volume-up-solid.svg') }}" class="mute">
								</div>
								<div class="col-1">
									<img src="{{ asset('img/arrows-alt-solid.svg') }}" class="full-screen">
								</div>
							</div>
							<div class="row row_range">
								<div class="col">
									<input type="range" class="seek-bar" value="0">
								</div>
							</div>
						</div>
					</div>
					{!! $film->plot !!}				
					<ul class="vip-screens">
						@foreach($film->images as $img)
							<li><a href="{{ Voyager::image($img) }}" class="film-popup"><img src="{{ Voyager::image($img) }}" alt=""></a></li>
						@endforeach
					</ul>
				</div>
				<div class="tp-vip-film col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 wow fadeInRightBig">
					<div class="row mt-sm-5 mt-md-0 mt-lg-0">
						<div class="col-12 col-sm-12 col-md-5 col-lg-12 col-xl-12">
							<div class="poster">
								<img class="img-responsive" src="{{ Voyager::image($film->poster) }}" alt="">
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-7 col-lg-12 col-xl-12">
							<div class="detail-info">
								<span><b>Старт проката: </b>{{ $Carbon->parse($film->start)->format('d.m.Y') }}</span>
								{{-- <span><b>Период проката: </b>до 07.05.2018</span> --}}
								<span><b>Год: </b>{{ $Carbon->parse($film->start)->format('Y') }}</span>
								<span><b>Страна: </b>{{ $film->country }}</span>
								<span><b>Жанр: </b>{{ $film->genre }}</span>
								<span><b>В главных ролях: </b>{{ $film->roles }}</span>
								<span><b>Режиссер: </b>{{ $film->producer }}</span>
								<span><b>Продолжительность: </b>{{ $film->runtime }} мин.</span>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a href="/vip-hall" class="see-shedule responsive-shedule button-empty">Вернуться в каталог<span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt=""></span></a>
				</div>
			</div>
		</div>
	</section>
@endsection