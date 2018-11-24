@extends('layouts.main')
@section('content')

<?php 
$Carbon=new Carbon\Carbon; 
$Carbon::setLocale('ru');
?>
<div class="fix-overflow-all">	
	<section class="shedule-wrapper wow fadeInLeftBig">
		<div class="container">
			<div class="dates-silder clearfix">
				@foreach($films as $film)
					<div>
						<div class="date">
							<a href="#">
								<span class="month">{{ $Carbon->parse($film['date'])->formatLocalized('%b') }}</span>
								<span class="number-day">{{ $Carbon->parse($film['date'])->formatLocalized('%d') }}</span>
								<div class="day">
									@if($Carbon->now()->format('Y-m-d') == $film['date'])
										Сегодня
									@else
										{{ $Carbon->parse($film['date'])->formatLocalized('%a') }}
									@endif
								</div>	
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<section class="availible-shedule wow fadeInRightBig">
		<div class="soon">
			<div class="container">
				<?php $i=0; ?> 
				@foreach($films as $film)
					<div class="slider-soon-wrapper @if($i == 0) active @endif fix-slider-shedule">
						<div class="slider-soon">
							@foreach($film['films'] as $fm)
								@if($film['date'] == $Carbon->parse($fm['showtime']['']['date'])->format('Y-m-d'))						
									<div>
										<a href="/films/{{ $fm['show']['']['alias'] }}">
											<div class="soon-item">
												<div class="image">
													<img class="poster-img" src="{{ $fm['show']['posterUrl'] }}" alt="">
													<a href="#" class="play-button"><span><img class="play-sprite" src="{{ asset('img/play-sprite.png') }}" alt="" style="top: 1px;"><img class="play-sprite-retina" src="{{ asset('img/play-sprite-retina.png') }}" alt="" style="top: 1px;"></span></a>
													<span class="movie-name"><a href="/films/{{ $fm['show']['']['alias'] }}">{{ $fm['show']['name'] }}</a>{{-- <span class="till">до </span> --}}<span class="years">{{ $fm['show']['ageLimit'] }}+</span></span>
													<ul class="sheduled-sessions">
														@foreach($fm['showtimes']['by-date']['date'] as $time)
															@if($time['']['date'] == $film['date'])
																@foreach($time['showtimes']['showtime'] as $st)
																	<li class="@if($Carbon->parse($st['']['date'])->format('Y-m-d H:i')<$Carbon->now()->format('Y-m-d H:i'))passed @endif"><a href="#">{{ $Carbon->parse($st['']['date'])->format('H:i') }} @if($st['']['is3d'] == 'y')<img class="three-d-svg" src="{{ asset('img/3d.svg') }}"></img>@endif</a></li>
																@endforeach
															@endif
														@endforeach
													</ul>
												</div>
											</div>
										</a>
									</div>
								@endif
							@endforeach
						</div>
					</div>
					<?php $i++; ?>
				@endforeach
			</div>
		</div>
	</section>

		<section class="shedule-template soon">
		<div class="container">
			<div class="slider-soon-wrapper wow bounceInUp">
				<h4>Скоро в прокате <br> PALLADIUM CINEMA</h4>
				<div class="slider-soon">
					@foreach($soon['shows-soon']['show'] as $film)
						<div>
							<a href="/films/{{ $film['alias'] }}">
								<div class="soon-item">
									<div class="image">
										<img class="poster-img" src="{{ $film['posterUrl'] }}" alt="">
										<a href="https://www.youtube.com/watch?v=oN_1xiJ-Mk4" class="play-button"><span><img src="{{ asset('img/play-sprite.png') }}" alt=""></span></a>
										<span class="movie-name"><a href="/films/{{ $film['alias'] }}">{{ $film['name'] }}</a></span>
									</div>
									<div class="info">
										<div class="row">
											<div class="col">
												<span class="from">с {{ $Carbon->parse($film['releaseDate'])->formatLocalized('%d %b')}}</span>
											</div>
											<div class="col-3">
												<div class="text-right">
													<a href="#" class="buy-ticket">
														<img src="{{ asset('img/ticket-icon.png') }}" alt="">
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
@endsection