@extends('layouts.main')
@section('content')
<section class="top-section-news top-section-news-mobile-fix">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
				<div class="slider-vimeo-info">
					<?php $i=0; ?>
					@foreach($sliders as $slide)
						<?php $i++; ?>
						<div class="text-slide">
							<h1>{{ $slide->title }}</h1>
							<p>{{ $slide->excerpt }}</p>
							<a href="/news/{{ $slide->slug }}" class="nw-btn">Подробнее<span><img class="footer-arrow" src="{{ asset('img/actions-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/arrow-sprite-retina.png') }}" alt=""></span></a>
						</div>
					@endforeach
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 fix-news-player">
				<div class="wrapper-to-slider">
					<div class="slider-vimeo">
						@foreach($sliders as $slide)
							<div class="item-vimeo">
								<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="{{ $slide->video_link }}" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
							</div>
						@endforeach
					</div>
					<p class="current-item-slider">
						<span class="current-slide">1</span> / <span class="length-slide">{{ $i }}</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="bottom-section-news bottom-section-news-mobile-fix">
	<div class="container">
		<?php $i =0; ?>
		@foreach($posts as $post)
			@if($i & 1)
				<div class="row news-block wow fadeInUpBig one">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 order-2 order-sm-2 order-md-1">
						<a href="/news/{{ $post->slug }}"><h1 class="d-none d-sm-none d-md-none d-lg-none d-xl-block">{{ $post->title }}</h1></a>
						<a href="/news/{{ $post->slug }}"><h1 class="d-block d-sm-block d-md-block d-lg-block d-xl-none">{{ $post->excerpt }}</h1></a>
						<p>{{ $post->excerpt }}</p>
					</div>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 fix-padding order-1 order-sm-1 order-md-2">
						<a href="/news/{{ $post->slug }}"><img class="img-responsive" src="{{ Voyager::image($post->image) }}" alt="News image"></a>
					</div>
				</div>
			@else
				<div class="row news-block wow fadeInUpBig fix-news-first-row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 fix-padding">
						<a href="/news/{{ $post->slug }}"><img class="img-responsive" src="{{ Voyager::image($post->image) }}" alt="News image"></a>
					</div>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
						<a href="/news/{{ $post->slug }}">
							<h1>{{ $post->title }}</h1>
						</a>
						<p>{{ $post->excerpt }}</p>
					</div>
				</div>
			@endif
			<?php $i++; ?>
		@endforeach
		</div>
	</section>
@endsection