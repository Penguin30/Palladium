@extends('layouts.main')
@section('content')
<div class="fix-overflow-all">	
	<section class="payment account">
		<div class="container">
			<div class="payment-details bonus-payment text-center">
				<div class="bonus-inner">
					<div class="wrapper">
					    <div class="tabs">
					        <span class="tab">Мои билеты</span>
					        <span class="tab">Профиль</span>
					        <span class="tab">Бонусная карта</span>        
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
										<div class="ticket-row wow fadeInRightBig">
											<div class="row">
												<div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1 order-number-column">
													<span class="tickets-code">5253356</span>
												</div>
												<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-1 clearfix date-column">
													<span class="data-tickets">19.05.2018 <br> 00:19</span>
												</div>
												<div class="col-md-4 col-lg-4 col-xl-5 clearfix film-column">
													<div class="img-wrapper">
														<img src="img/avengers-small.jpg" alt="">
													</div>
													<span class="movie-name">Мстители: Война бесконечности (3D <br> RealD)<span class="years-allowed">16+</span></span>
													<span class="date-sheduled">Воскресенье, 25 сентября    13:00    Зал «Лондон»</span>
												</div>
												<div class="col-md-2 col-lg-2 col-xl-2 summ-column">
													<span class="ticket-price">170 <span class="uah">грн</span></span>
												</div>
												<div class="col-md-2 col-lg-3 col-xl-3">
													<a href="#" class="tickets-link">Билеты</a>
												</div>
											</div>
										</div>
										<div class="ticket-row wow fadeInLeftBig">
											<div class="row">
												<div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1 order-number-column">
													<span class="tickets-code">5253356</span>
												</div>
												<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-1 date-column">
													<span class="data-tickets">19.05.2018 <br> 00:19</span>
												</div>
												<div class="col-md-4 col-lg-4 col-xl-5 clearfix film-column">
													<div class="img-wrapper">
														<img src="img/avengers-small.jpg" alt="">
													</div>
													<span class="movie-name">Мстители: Война бесконечности (3D <br> RealD)<span class="years-allowed">16+</span></span>
													<span class="date-sheduled">Воскресенье, 25 сентября    13:00    Зал «Лондон»</span>
												</div>
												<div class="col-md-2 col-lg-2 col-xl-2 summ-column">
													<span class="ticket-price">170 <span class="uah">грн</span></span>
												</div>
												<div class="col-md-2 col-lg-3 col-xl-3">
													<a href="#" class="tickets-open">Открыть заказ</a>
												</div>
											</div>
										</div>
										<div class="ticket-row wow fadeInRightBig">
											<div class="row">
												<div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1 order-number-column">
													<span class="tickets-code">5253356</span>
												</div>
												<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-1 date-column">
													<span class="data-tickets">19.05.2018 <br> 00:19</span>
												</div>
												<div class="col-md-4 col-lg-4 col-xl-5 clearfix film-column">
													<div class="img-wrapper">
														<img src="img/avengers-small.jpg" alt="">
													</div>
													<span class="movie-name">Мстители: Война бесконечности (3D <br> RealD)<span class="years-allowed">16+</span></span>
													<span class="date-sheduled">Воскресенье, 25 сентября    13:00    Зал «Лондон»</span>
												</div>
												<div class="col-md-2 col-lg-2 col-xl-2 summ-column">
													<span class="ticket-price">170 <span class="uah">грн</span></span>
												</div>
												<div class="col-md-2 col-lg-3 col-xl-3">
													<span class="payment-failed">Прострочена оплата </span>
												</div>
											</div>
										</div>
										<div class="ticket-row wow fadeInLeftBig">
											<div class="row">
												<div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1 order-number-column">
													<span class="tickets-code">5253356</span>
												</div>
												<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-1 date-column">
													<span class="data-tickets">19.05.2018 <br> 00:19</span>
												</div>
												<div class="col-md-4 col-lg-4 col-xl-5 clearfix film-column">
													<div class="img-wrapper">
														<img src="img/avengers-small.jpg" alt="">
													</div>
													<span class="movie-name">Мстители: Война бесконечности (3D <br> RealD)<span class="years-allowed">16+</span></span>
													<span class="date-sheduled">Воскресенье, 25 сентября    13:00    Зал «Лондон»</span>
												</div>
												<div class="col-md-2 col-lg-2 col-xl-2 summ-column">
													<span class="ticket-price">170 <span class="uah">грн</span></span>
												</div>
												<div class="col-md-2 col-lg-3 col-xl-3">
													<span class="payment-failed">Возвращен</span>
												</div>
											</div>
										</div>
									</div> 
								@endif
							</div>
					        <div class="tab_item">
								<div class="autorization-data">
									<div class="input-wrappper text-center">
										<label>Основной Email/Логин</label>
										<div class="input">
											<input type="text" placeholder="leshchenko.ld@gmail.com">
											<div class="default-info">
												<img src="img/info.png" alt="" class="default-info"><img src="img/info-retina.png" alt="" class="default-info default-info-retina">
												<p class="text-center">По-умолчанию билеты приходят на основной email. Вы можете указать дополнительный email для получения билетов.</p>
											</div>
										</div>
										<a href="#" class="add-email">Добавить email для получения билетов</a>
									</div>
									<div class="input-wrappper text-center">
										<label>Контактный телефон</label>
										<div class="input">
											<input type="text" value="38 (066) 210 54 55">
										</div>
									</div>
									<div class="input-wrappper text-center">
										<label>Подключить аккаунт</label>
										<div class="soc-accs">
											<a href="#" class="fb-a"><img src="img/facebook-aut.png" alt="">Facebook</a>
											<a href="#" class="g-plus"><img src="img/g-plus-aut.png" alt="">Google</a>
										</div>
									</div>
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
						        	<div class="table-item">
						        		<div class="row">
						        			<div class="col-md-2 col-lg-1">
						        				<div class="service default-service">
						        					<img src="img/envelope.png" alt="">
						        				</div>
						        			</div>
						        			<div class="col-md-4">
						        				<div class="service-info">
						        					<span class="e-mail-name">leshchenko.ld@gmail.com</span>
						        				</div>
						        			</div>
						        			<div class="col-md-4 col-lg-5">
						        				<div class="service-info">
						        					<div class="e-mail-name"><b>Этот браузер</b>palladium-cinema.com.ua</div>
						        					<div class="e-mail-name">22.05.2018 в 21:17</div>
						        				</div>
						        			</div>
						        			<div class="col-md-2">
						        				<div class="service-info">
						        					<a href="#" class="remove-session"><img src="img/delete.png" alt="">Отключить</a>
						        				</div>
						        			</div>
						        		</div>
						        	</div>
						        	<div class="table-item">
						        		<div class="row">
						        			<div class="col-md-2 col-lg-1">
						        				<div class="service default-service">
						        					<img src="img/envelope.png" alt="">
						        				</div>
						        			</div>
						        			<div class="col-md-4">
						        				<div class="service-info">
						        					<span class="e-mail-name">leshchenko.ld@gmail.com</span>
						        				</div>
						        			</div>
						        			<div class="col-md-4 col-lg-5">
						        				<div class="service-info">
						        					<div class="e-mail-name">Vkino iOS</div>
						        					<div class="e-mail-name">12.06.2019 в 21:17</div>
						        				</div>
						        			</div>
						        			<div class="col-md-2">
						        				<div class="service-info">
						        					<a href="#" class="remove-session"><img src="img/delete.png" alt="">Отключить</a>
						        				</div>
						        			</div>
						        		</div>
						        	</div>
						        	<div class="table-item">
						        		<div class="row">
						        			<div class="col-md-2 col-lg-1">
						        				<div class="service facebook">
						        					<img src="img/facebook-aut.png" alt="">
						        				</div>
						        			</div>
						        			<div class="col-md-4">
						        				<div class="service-info">
						        					<span class="e-mail-name">Лещенко Дмитрий</span>
						        				</div>
						        			</div>
						        			<div class="col-md-4 col-lg-5">
						        				<div class="service-info">
						        					<div class="e-mail-name"><b>Этот браузер</b>palladium-cinema.com.ua</div>
						        					<div class="e-mail-name">22.05.2018 в 21:17</div>
						        				</div>
						        			</div>
						        			<div class="col-md-2">
						        				<div class="service-info">
						        					<a href="#" class="remove-session"><img src="img/delete.png" alt="">Отключить</a>
						        				</div>
						        			</div>
						        		</div>
						        	</div>
						        </div>
					   		</div>
					        <div class="tab_item">
								<div class="cards-wrapper">
									<div class="row">
										<div class="col-lg-12 col-xl-6 wow fadeInUpBig">
											<div class="bonus-card-template first-bonus-card">
												<form>
													<label>Номер бонусной карты</label>
													<input type="text" class="confirmed" value="1234 5678 9102 3">
													<label>Телефон, зарегистрированный на эту карту</label>
													<input type="text" class="confirmed" value="38 (066) 210 54 55">
													<label class="on-your">На вашем счету <br>
														<span class="bonus-number"><span class="val">540</span> бонусов</span>
													</label>
												</form>
											</div>
											<div class="text-center responsive-fix">
												<a href="#" class="delete-card"><img class="delete-card-icon" src="img/delete.png" alt=""><img class="delete-card-icon-retina" src="img/delete-retina.png" alt="">Удалить карту</a>
											</div>
										</div>
										<div class="col-lg-12 col-xl-6 wow fadeInUpBig">
											<div class="bonus-card-template second-bonus-card">
												<form>
													<label>Номер бонусной карты</label>
													<input type="text" class="confirmed" value="1234 5678 9102 3">
													<label>Телефон, зарегистрированный на эту карту</label>
													<input type="text" class="confirmed" value="38 (066) 210 54 55">
													<label class="on-your">На вашем счету <br>
														<span class="bonus-number"><span class="val">540</span> бонусов</span>
													</label>
												</form>
											</div>
											<div class="text-center">
												<a href="#" class="delete-card"><img class="delete-card-icon" src="img/delete.png" alt=""><img class="delete-card-icon-retina" src="img/delete-retina.png" alt="">Удалить карту</a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 wow fadeInUpBig">
											<div class="bonus-card-template centered third-bonus-card">
												<form>
													<label>Номер бонусной карты</label>
													<input type="text" class="confirmed" value="1234 5678 9102 3">
													<label>Телефон, зарегистрированный на эту карту</label>
													<input type="text" class="confirmed" value="38 (066) 210 54 55">
													<label class="on-your">На вашем счету <br>
														<span class="bonus-number"><span class="val">540</span> бонусов</span>
													</label>
												</form>
											</div>
											<div class="text-center">
												<a href="#" class="delete-card"><img class="delete-card-icon" src="img/delete.png" alt=""><img class="delete-card-icon-retina" src="img/delete-retina.png" alt="">Удалить карту</a>
											</div>
										</div>
									</div>
									<div class="add-card">
										<div class="row">
											<div class="col-md-12">
												<a href="#"><img class="addcart-icon" src="img/addcart.png" alt=""><img class="addcart-icon-retina" src="img/addcart-retina.png" alt="">Добавить бонусную карту</a>
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