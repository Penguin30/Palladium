@extends('layouts.main')
@section('content')
<?php $Carbon = new \Carbon\Carbon(); ?>
<div class="fix-overflow-all">	
	<section class="payment account">
		<div class="container">
			<div class="payment-details bonus-payment text-center">
				<div class="bonus-inner">
					<div class="wrapper">
					    <div class="tabs">
					        <span class="tab {{ (!isset($_GET['tab']) || $_GET['tab'] == 'tickets' || $_GET['tab'] == '') ? 'active' : '' }}">Мои билеты</span>
					        <span class="tab {{ (isset($_GET['tab']) && $_GET['tab'] == 'profile') ? 'active' : '' }}">Профиль</span>
					        <span class="tab {{ (isset($_GET['tab']) && $_GET['tab'] == 'profile') ? 'active' : '' }}">Бонусная карта</span>      
					    </div>
					</div>
				</div>
				<div class="tab_content">
					        <div class="tab_item my-tickets">
					        	@if($tickets['orders']['count'] == 0)
									<div class="tickets-empty">
										<h4>У вас еще нет активных билетов</h4>
										<a href="/shedule" class="to-shedule">Расписание</a>
									</div>
								@else							
									<div class="tickets-list">
										<div class="table-names">
											<div class="row">
												<div class="col-3 col-sm-3 col-md-2 col-lg-1 col-xl-1 order-number-column">
													<span>№Заказа</span>
												</div>
												<div class="col-6 col-sm-6 d-block d-sm-block d-md-none d-lg-none d-xl-none"></div>
												<div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1 date-column">
													<span>Дата</span>
												</div>
												<div class="col-sm-6 col-md-4 col-lg-4 col-xl-5 d-none d-sm-none d-md-block d-lg-block d-xl-block film-column">
													
												</div>
												<div class="col-md-2 col-lg-2 col-xl-2 d-none d-sm-none d-md-block d-lg-block d-xl-block summ-column">
													<span>Сумма</span>
												</div>
												<div class="col-md-2 col-lg-3 col-xl-3 d-none d-sm-none d-md-block d-lg-block d-xl-block">
													<span>Статус</span>
												</div>
											</div>
										</div>
										<?php $i = 0; ?>
										@foreach($tickets['showtimes']['showtime'] as $film)
										@php $ticket = $tickets['orders']['invoice'][$film['orderNumber']]; @endphp
											<div class="ticket-row wow fadeInLeftBig">
												<div class="row">
													<div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1 order-number-column">
														<span class="tickets-code">{{ $ticket['number'] }}</span>
													</div>
													<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-1 date-column">
														<span class="data-tickets">{{ $Carbon->parse($ticket['created'])->format('d.m.Y') }}<br> {{ $Carbon->parse($ticket['created'])->format('H:i') }}</span>
													</div>
													<div class="col-md-4 col-lg-4 col-xl-5 clearfix film-column">				
														<div class="img-wrapper">
															<img width="100px" src="{{ $films[$film['orderNumber']]['posterUrl'] }}" alt="">
														</div>
														<span class="movie-name">{{ $films[$film['orderNumber']]['name'] }}<span class="years-allowed">{{ $films[$film['orderNumber']]['ageLimit'] }}+</span></span>
														<span class="date-sheduled">
															{{ $Carbon->parse($film['date'])->formatlocalized('%A, %d %B') }} {{ $Carbon->parse($film['date'])->format('H:i') }}   </span>			
													</div>
													<div class="col-md-2 col-lg-2 col-xl-2 summ-column">
														<span class="ticket-price">{{ $ticket['amount'] }} <span class="uah">грн</span></span>
													</div>
													<div class="col-md-2 col-lg-3 col-xl-3">
														@if($ticket['statusCode'] == 19)
															<span class="payment-failed">Прострочена оплата </span>
														@elseif($ticket['status'] == 'Canceled')
															<span class="payment-failed">Билеты были возвращены </span>	
														@elseif($ticket['status'] == 'AwaitingForPayment')
															<a href="/order/{{ $ticket['number'] }}/{{ $ticket['authCode'] }}" class="tickets-open">Открыть заказ</a>
														@else
															<a href="/tickets/{{ $ticket['number'] }}/{{ $ticket['authCode'] }}" class="tickets-link">Билеты</a>
														@endif
													</div>
												</div>
											</div>
										@endforeach
									</div> 
								@endif
							</div>
					        <div class="tab_item">
								<div class="autorization-data">
									<div class="input-wrappper text-center">
										<label>Основной Email/Логин</label>
										<div class="input">
											
											<input type="text" disabled placeholder="email@email.email" value="@if($profile['code'] == 1){{ $profile['customer']['email'] }}@elseif($account['userAccount'][0]['email']){{ $account['userAccount'][0]['email'] }}@else {{ session('email') }} @endif">
										</div>
									</div>
									<form action="/account/create_profile" method="POST">
										@csrf
										<div class="input-wrappper text-center">
											<label>Контактный телефон</label>
											<div class="input">
												<input @if($profile['code'] == 1 && $profile && $profile['customer']['phoneCell']) disabled @endif required name="phone" type="text" placeholder="0661111111" value="@if($profile && $profile['code'] == 1)0{{ $profile['customer']['phoneCell'] }}@endif">
											</div>
										</div>

										<div class="input-wrappper text-center">
											@if($profile['code'] == 1 &&  !$profile['customer']['phoneCell'])
												<button type="submit" style="border:none; outline: none;cursor: pointer;" class="save">Сохранить</button>
											@endif
										</div>
									</form>
									{{-- <div class="input-wrappper text-center">
										<label>Подключить аккаунт</label>
										<div class="soc-accs">
											<a href="#" class="fb-a"><img src="img/facebook-aut.png" alt="">Facebook</a>
											<a href="#" class="g-plus"><img src="img/g-plus-aut.png" alt="">Google</a>
										</div>
									</div> --}}
						        </div>
						        <div class="active-sessions text-left wow fadeInUpBig">
						        	<h3>Активные подключения</h3>
						        	<div class="table-names hide-xs hide-sm">
						        		<div class="row">
						        			<div class="col-md-2 col-lg-1">
						        				<span class="table-name">Сервис</span>
						        			</div>
						        			<div class="col-md-4">
						        				<span class="table-name">Имя</span>
						        			</div>
						        			<div class="col-md-6 col-lg-7">
						        				<span class="table-name">Авторизирован</span>
						        			</div>
						        		</div>
						        	</div>
						        	@foreach($account['auth']['profiles']['profile'] as $prof)
							        	<div class="table-item">
							        		<div class="row">
							        			<div class="col-md-2 col-lg-1">
							        				<div class="service default-service">
							        					@if($prof['provider'] == 'email')
							        						<img src="{{ asset('img/envelope.png') }}" alt="">
							        					@elseif($prof['provider'] == 'facebook-palladium')
							        						<img src="{{ asset('img/facebook-aut.png') }}" alt="">
							        					@elseif($prof['provider'] == 'google-palladium')
							        						<img src="{{ asset('img/g-plus-aut.png') }}" alt="">
							        					@endif
							        				</div>
							        			</div>
							        			<div class="col-md-4">
							        				<div class="service-info">
							        					<span class="e-mail-name">{{ $prof['displayName'] }}</span>
							        				</div>
							        			</div>
							        			<div class="col-md-4 col-lg-5">
							        				<div class="service-info">
							        					<div class="e-mail-name">palladium-cinema.com.ua</div>
							        					<div class="e-mail-name">
														{{ $Carbon->parse($prof['created'])->format('d.m.Y в H:i') }}
														</div>
							        				</div>
							        			</div>
{{-- 							        			<div class="col-md-2">
							        				<div class="service-info">
							        					<a href="#" class="remove-session"><img src="img/delete.png" alt="">Отключить</a>
							        				</div>
							        			</div> --}}
							        		</div>
							        	</div>
							        @endforeach
						        </div>
					   		</div>
							<div class="tab_item">
								<div class="cards-wrapper">
									@foreach($cards as $card)
										<div class="row added-cards justify-content-center">
											<div class="col-lg-12 col-xl-6 wow fadeInUpBig">
												<div class="bonus-card-template centered first-bonus-card">
													<form method="POST" action="/account/card/delete">
														@csrf
														<label>Номер бонусной карты</label>
														<input type="hidden" value="{{ $card['loyalityCard'][0]['number'] }}" name="c_num">
														<input disabled type="text" class="confirmed" value="{{ $card['loyalityCard'][0]['number'] }}">
														<label class="on-your">На вашем счету <br>
															<span class="bonus-number"><span class="val">{{ $card['accountBalance']['bonusesAmount'] }}</span> бонусов</span>
														</label>
														<div class="text-center responsive-fix">
															<button class="delete-card" type="submit" style="cursor: pointer;"><img class="delete-card-icon" src="{{ asset('img/delete.png') }}" alt=""><img class="delete-card-icon-retina" src="{{ asset('img/delete-retina.png') }}" alt="">Удалить карту</button>
														</div>
													</form>
												</div>
											</div>
										</div>		
									@endforeach			
									<div class="row new-card d-none justify-content-center">
										<div class="col-lg-12 col-xl-6 wow fadeInUpBig">
											<div class="bonus-card-template centered third-bonus-card">
												<form action="javascript:void(0)" method="POST" id="add_card_form">
													@csrf
													<label for="c_num">Номер бонусной карты</label>
													<input type="text" id="c_num" name="num" placeholder="xxxx xxxx xxxx">
													<label for="tel">Телефон, зарегистрированный на эту карту</label>
													<input type="text" class="confirmed" 
													name="tel" id="tel" value="@if($profile['code'] == 1)0{{ $profile['customer']['phoneCell'] }}@endif">
													<div class="text-center responsive-fix">
														<button class="delete-card" style="cursor: pointer;">Добавить карту</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="add-card">
										<div class="row">
											<div class="col-md-12">
												<a href="javascript:void(0)" id="add-bonus-card"><img class="addcart-icon" src="{{ asset('img/addcart.png') }}" alt=""><img class="addcart-icon-retina" src="{{ asset('img/addcart-retina.png') }}" alt="">Добавить бонусную карту</a>
											</div>
										</div>
									</div>
								</div>
					        </div>
			</div>
		</div>
        </div>
	</section>
</div>
@endsection