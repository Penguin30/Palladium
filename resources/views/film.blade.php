@extends('layouts.main')
@section('content')
<?php $Carbon=new Carbon\Carbon; ?>
<div class="fix-overflow-all">
	<section class="about-movie">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-8 col-sm-8 col-8 wow fadeInDownBig">
					<h1>{{ $film['name'] }} <span class="year-allowed">{{ $film['ageLimit'] }}+</span></h1>
					<h2>{{ $film['nameOriginal'] }}</h2>
				</div>
				<div class="ccol-sm-4 col-md-4 col-sm-4 col-4 wow fadeInDownBig text-right">
					<a href="/shedule" class="see-shedule film-page-btn-top">Расписание <span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt=""></span></a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9 col-md-12 col-sm-12 wow fadeInLeftBig">	
					<div class="video">
						<div id="film-video-frame" title="{{ $film['youtubeVideoId'] }}"></div>
						<div class="overlay"></div>
						<a class="play-button current-film"><img class="film-playing" src="{{ asset('img/play-sprite.png') }}" alt=""><img class="film-playing-retina" src="{{ asset('img/play-sprite-retina.png') }}" alt=""></a>
					</div>
					@if(isset($showtimes) && !empty($showtimes))
						<?php $i=0; ?>
						<div class="dates-silder clearfix d-block">
							@foreach($showtimes as $showtime)
								<div>
									<div class="date">
										<a href="#">
											@if($Carbon->now()->format('m') == $Carbon->parse($showtime['']['date'])->format('m') && $i == 0 )
												<?php $i++; ?>
												<span class="month">{{ $Carbon->parse($showtime['']['date'])->formatlocalized('%B') }}</span>
											@endif
											<span class="number-day">{{ $Carbon->parse($showtime['']['date'])->formatlocalized('%d') }}</span>
											@if($showtime['']['date'] == $Carbon->now()->format('Y-m-d'))
												<span class="day">Сегодня</span>
											@else
												<div class="day">{{ $Carbon->parse($showtime['']['date'])->formatlocalized('%a') }}</div>
											@endif
										</a>
									</div>
								</div>
							@endforeach
						</div>
						<?php $i=0; $is3d = 0; ?>
						@foreach($showtimes as $showtime)
							<ul class="sessions-time @if($i == 0) active @endif">
								@foreach($showtime['showtimes']['showtime'] as $time)
									@if($time['']['is3d'] == 'n')
										<li><a href="#">{{ $Carbon->parse($time['']['date'])->format('H:i') }}</a></li>
									@else
										<?php $is3d = 1; ?>
										<li><a href="#">{{ $Carbon->parse($time['']['date'])->format('H:i') }} <img class="three-d-svg" src="{{ asset('img/3d.svg') }}"></img></a></li>
									@endif
								@endforeach
							</ul>		
							<?php $i++; ?>			
						@endforeach
					@endif					
					<p>{{ $film['plot'] }}</p>
					@if(isset($showtimes) && !empty($showtimes))
						@if( $is3d == 1 )
							<div class="glasses">
								<div class="row">
									<div class="col-md-2 col-3">
										<div class="text-center">
											<img class="glasses-main-img" src="{{ asset('img/glasses.png') }}" alt="">
											<img class="glasses-table-visibility" src="{{ asset('img/glasses-2x.png') }}" alt="">
										</div>
									</div>
									<div class="col-md-10 col-9">
										<h3>Фильм показывается в 3D формате.</h3>
										<p>У нас Вы сможете приобрести практически невесомые 3D очки или фирменные американские Polaroid 3D. Стоимость очков от 10 грн. Также есть 3D пенсне, для тех кто носит очки с диоптриями.</p>
									</div>
								</div>
							</div>
						@endif
					@endif
				</div>
				<div class="col-lg-3 col-md-12 col-12 wow fadeInRightBig ">
					<div class="hide-sm">
							<div class="row">
								<div class="col-sm-4 col-md-5 col-lg-12">
									<div class="poster">
										<img class="img-responsive" src="{{ $film['posterUrl'] }}" alt="">
									</div>
								</div>
								<div class="col-sm-8 col-md-7 col-lg-12">
									<div class="detail-info">
										<span><b>Старт проката: </b>{{ $Carbon->parse($film['releaseDate'])->format('d.m.Y') }}</span>
										{{-- <span><b>Период проката: </b>до 07.05.2018</span> --}}
										<span><b>Год: </b>{{ $film['year'] }}</span>
										<span><b>Страна: </b>{{ $film['country'] }}</span>
										<span><b>Жанр: </b>{{ $film['genre'] }}</span>
										<span><b>В главных ролях: </b>{{ $film['starring'] }} </span>
										<span><b>Режиссер: </b>{{ $film['writer'] }}</span>
										<span><b>Продолжительность: </b>{{ $film['runningTime'] }} мин.</span>
									</div>
								</div>
								<a href="shedule.html" class="see-shedule film-page-btn">Расписание <span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt=""></span></a>
							</div>
					</div>
					<div class="descr-hidden-desctop">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="poster">
									<img src="{{ asset('img/avengers-detail-poster.png') }}" alt="">
								</div>
							</div>
							<div class="col-md-8 col-sm-12">
								<div class="detail-info">
									<span><b>Старт проката: </b>{{ $Carbon->parse($film['releaseDate'])->format('d.m.Y') }}</span>
									<span><b>Период проката: </b>до 07.05.2018</span>
									<span><b>Год: </b>{{ $film['year'] }}</span>
									<span><b>Страна: </b>{{ $film['country'] }}</span>
									<span><b>Жанр: </b>{{ $film['genre'] }}</span>
									<span><b>В главных ролях: </b>{{ $film['starring'] }}</span>
									<span><b>Режиссер: </b>{{ $film['writer'] }}</span>
									<span><b>Продолжительность: </b>{{ $film['runningTime'] }} мин.</span>
									<a href="shedule.html" class="see-shedule film-page-btn film-btn-adaptive">Расписание <span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt=""></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection