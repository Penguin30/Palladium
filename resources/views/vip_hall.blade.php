@extends('layouts.main')
@section('content')
<div class="fix-overflow-all">		
	<section class="vip-banner wow fadeIn"></section>
	<section class="vip-description">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<div class="hall-description wow fadeInDownBig">
						<h1>{{ $page->title }}</h1>
							<div class="scroll-text">
								{!! $page->body !!}
							</div>							
					</div>
				</div>
				<div class="col-sm-12 col-md-5">
					<div class="vip-prices wow fadeInUpBig">
						<div class="prices-heading">
							<p>Стоимость аренды VIP-зала за просмотр фильма</p>
							<div class="row">
								<div class="col-6 col-sm-6 col-md-6 text-left">
									<div class="price-item prev text-center">
										<span class="before">
											До 18:00
										</span>
										<span class="price">
											700 грн
										</span>
									</div>
								</div>
								<div class="col-6 col-sm-6 col-md-6 text-right">
									<div class="price-item next text-center">
										<span class="before">
											После 18:00
										</span>
										<span class="price">
											900 грн
										</span>
									</div>
								</div>
							</div>
							<a href="#vip-call-me" class="callme">Перезвоните мне</a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<section class="catalogue-vip catalogue-vip-section">
		<div class="text-center wow fadeInLeftBig">
			<h2>Каталог фильмов VIP-зала</h2>
		</div>
		<div class="container wow fadeInLeftBig">
			<div class="filters">
				<div class="row">
					<div class="col-6 col-sm-6 col-md-4">						
						<label class="label-category">Выберите категорию</label>
						<select class="custom" id="select-category">
							<option selected>Все категории</option>
							@foreach($cats as $cat)
								<option>{{ $cat->name }}</option>
							@endforeach						  
						</select>
					</div>
					<div class="col-6 col-sm-6 col-md-4">
						<label class="label-sort">Сортировка</label>
						<select class="custom-second" id="select-by">
						  <option>Самые новые</option>
						  <option>Самые старые</option>
						  <option>Перемешать</option>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-4">
						<label class="label-search">Поиск по каталогу</label>
						<div class="inp-wp">
							<input type="text" placeholder="Название"><div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="vip-films-list">
				<div class="row wow fadeInUpBig">
					@foreach($films as $film)
						<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-2">
							<a href="/vip-film/{{ $film->slug }}" class="vip-film-item text-center">
								<img src="{{ Voyager::image($film->poster) }}" alt="">
								<span class="name-of-film">{{ $film->title }}</span>
							</a>
						</div>
					@endforeach
				</div>
			</div>
			{{ $films->render() }}
		</div>	
	</section>

@endsection