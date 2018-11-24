@extends('layouts.main')
@section('content')
<div class="fix-overflow-all">	
	<section class="loyality-system grey-part">
		<div class="loyality-container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6">
					<h1>{{ $post->title }}</h1>
				</div>
				<div class="d-none d-sm-none d-md-block d-lg-block d-xl-block col-4 col-sm-4 col-md-6 text-right">
					<a href="/news" class="see-shedule">Вернуться в акции<span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt="" style="top: 0px;"><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt="" style="top: 0px;"></span></a>
					<a class="see-shedule article-button" href="/news">Вcе акции<span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt="" style="top: 0px;"><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt="" style="top: 0px;"></span></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p>{{ $post->excerpt }}</p>
					<div class="video-wrapper">
						<div style="padding:56.25% 0 0 0;position:relative;">
							@if(!$post->video_link)
								<img style="position: absolute;top: 0;left: 0;  width: 100%;height: 100%;" src="{{ Voyager::image($post->image) }}" alt="">
							@else
								<iframe src="{{ $post->video_link }}" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							@endif
						</div><script src="https://player.vimeo.com/api/player.js"></script>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="white-part">
		<div class="loyality-container">
			{!! $post->body !!}
			<div class="mobile-container">
				<a href="#" class="leave-task mobile-lv-task">Оставить заявку. Мы Вам перезвоним.</a>
				<a href="#" class="leave-task fix-task">Оставить заявку. <br> <span>Мы Вам перезвоним.</span></a>
				<a href="/news" class="second-see-shedule">Все акции<span class="footer-button-arrow"><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt="" style="top: 0px;"><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt="" style="top: 0px;"></span></a>
			</div>
		</div>
	</section>
@endsection