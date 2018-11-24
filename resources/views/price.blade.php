@extends('layouts.main')
@section('content')
<div class="fix-overflow-all">	 
    <!-- First scheem hall -->
    
    <section class="schem-first-hall wow fadeInRightBig">
        <h1>Схемы залов</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="schem-first-block">
                        <h4 class="rotate-caption">{!! $parise->name !!}</h4>
                        <img class="img-responsive paris-1" src="{{ Voyager::image($parise->sheme) }}" alt=""><img class="img-responsive paris-1-retina" src="{{ Voyager::image($parise->sheme) }}" alt="">
                        <div class="fb-left">
                            <span class="time">
                                До 18:00
                            </span>
                            <p>
                                {{ $parise->price_day }} грн
                            </p>
                        </div>
                        <div class="fb-right">
                            <span class="time">
                                После 18:00
                            </span>
                            <p>
                                {{ $parise->price_night }} грн
                            </p>
                        </div>
                        <a href="/vip-hall" class="more-info">Подробнее<span><img src="{{ asset('img/actions-arrow-sprite.png') }}" alt=""></span></a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="people-image-first">
                        <img class="img-responsive people-lg" src="{{ Voyager::image($parise->img) }}" alt="Palladium people">
                        <img class="img-responsive people-sm" src="{{ Voyager::image($parise->img) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php $i = 0; ?>
    @foreach($halls as $hall)
    	@if($i%2==0)
		    <section class="schem-second-hall wow fadeInLeftBig">
		        <div class="container">
		            <div class="row">
		                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
		                    <div class="schem-second-block">
		                        <h4 class="rotate-caption">{!! $hall->name !!}</h4>
		                        <img class="img-responsive athens" src="{{ Voyager::image($hall->sheme) }}" alt=""><img class="img-responsive athens-retina" src="{{ Voyager::image($hall->sheme) }}" alt="">
		                        <div class="price-column">
		                            <div class="price-item">
		                                <p>До 18:00</p>
		                                <p>После 18:00</p>
		                            </div>
		                            <div class="price-item">
		                                <p>{{ $hall->price_row_3_from }} грн</p>
		                                <p>{{ $hall->price_row_3_to }} грн</p>
		                            </div>
		                            <div class="price-item">
		                                <p>{{ $hall->price_row_2_from }} грн</p>
		                                <p>{{ $hall->price_row_2_to }} грн</p> 
		                            </div>
		                            <div class="price-item">
		                                <p>{{ $hall->price_row_1_from }} грн</p>
		                                <p>{{ $hall->price_row_1_to }} грн</p>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
		                    <div class="people-image-second">
		                        <img class="img-responsive people-lg" src="{{ Voyager::image($hall->img) }}" alt="">
		                        <img class="img-responsive people-sm" src="{{ Voyager::image($hall->img) }}" alt="">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
		@else
			<section class="schem-third-hall wow fadeInRightBig">
		        <div class="container">
		            <div class="row">
		                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
		                    <div class="schem-third-block">
		                        <h4 class="rotate-caption">{!! $hall->name !!}</h4>
		                        <img class="img-responsive vip-london" src="{{ Voyager::image($hall->sheme) }}" alt=""><img class="img-responsive vip-london-retina" src="{{ Voyager::image($hall->sheme) }}" alt="">
		                        <div class="price-column">
		                            <div class="price-item">
		                                <p>До 18:00</p>
		                                <p>После 18:00</p>
		                            </div>
		                            <div class="price-item">
		                                <p>{{ $hall->price_row_3_from }} грн</p>
		                                <p>{{ $hall->price_row_3_to }} грн</p>
		                            </div>
		                            <div class="price-item">
		                                <p>{{ $hall->price_row_2_from }} грн</p>
		                                <p>{{ $hall->price_row_2_to }} грн</p> 
		                            </div>
		                            <div class="price-item">
		                                <p>{{ $hall->price_row_1_from }} грн</p>
		                                <p>{{ $hall->price_row_1_to }} грн</p>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
		                    <div class="people-image-third">
		                        <img class="img-responsive people-lg" src="{{ Voyager::image($hall->img) }}" alt="">
		                        <img class="img-responsive people-sm" src="{{ Voyager::image($hall->img) }}" alt="">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
		@endif
		<?php $i++; ?>
	@endforeach
	
    <div class="scheme-slider wow fadeInUpBig">
    	@foreach($slides as $slide)
	        <div>
	            <img src="{{ Voyager::image($slide) }}" alt="">
	        </div>
       	@endforeach
    </div>
    

@endsection