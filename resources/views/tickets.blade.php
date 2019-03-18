@extends('layouts.main')
@section('content')
@php $generator = new Picqer\Barcode\BarcodeGeneratorPNG(); @endphp
@php $Carbon = new \Carbon\Carbon(); @endphp
<div class="fix-overflow-all">	
	<section class="payment account">
		<div class="container">
			<div class="payment-details bonus-payment text-center">
				<div class="tab_content">
					        <div class="tab_item my-tickets">
								 <p class="pay-in text-center"><a href="/account" class="back"><img src="{{ asset('img/back-arrow.png') }}" alt="">Назад</a></p>
								<div class="row">
									<div class="col-md-3">
										<div class="poster">
											<img src="{{ $film['show']['posterUrl'] }}" class="img-responsive" alt="">
										</div>
										{{-- <div class="personal-code">
											<h3>Розыгрыш призов</h3>
											<p>Твои личные коды: </p>
											<ul>
												<li>jJWSiagfsC</li>
												<li>QAbgCLQcnU</li>
												<li>FJs548FKSJx</li>
											</ul>
											<p class="text-left">После начала сеанса жми на значек рулетки и забирай свой приз.</p>
										</div> --}}
									</div>
									<div class="col-md-9">
										<div class="heading-of-ticket text-left">
											<h2>{{ $film['show']['name'] }} <span class="years">{{ $film['show']['ageLimit'] }}+</span></h2>
											<span class="when-where">
											{{ $Carbon->parse($ticket['date'])->formatlocalized('%A, %d %B ') }} {{ $Carbon->parse($ticket['date'])->format('H:i') }}
											{{ $ticket['hallName'] }}</span>
											<a href="#" onclick="PrintElem('.bought-tickets-wrapper')" class="print">Распечатать</a>
										</div>								
										<div class="bought-tickets-wrapper">
											@php $i=1; @endphp
											@foreach($tickets['tickets']['ticket'] as $tick)

												<div class="bought-tickets-row text-left">
													<div class="row">
														<div class="col-3">
															<div class="barcode ">
																<img src="data:image/png;base64,{{ base64_encode($generator->getBarcode($tick['codePrint'], $generator::TYPE_CODE_128)) }}" class="img-responsive" alt="">
															</div>
														</div>
														<div class="col-4">
															<div class="ticket-details">
																<span class="ticket-nmb">Билет {{ $i }}</span>
																<span class="ticket-code">Код: <span class="direct-code">{{ $tick['codePrint'] }}</span></span>
																<div class="place-row">
																	<span class="ticket-code">Ряд: <span class="direct-code"> {{ $tick['row'] }}</span></span>
																	<span class="ticket-code">Место: <span class="direct-code"> {{ $tick['seat'] }}</span></span>
																</div>
															</div>
														</div>
														<div class="col-5">
															<div class="ticket-details price-det">
																<div class="place-row">
																	<span class="ticket-code">Действителен до:<span class="direct-code">{{ $Carbon->parse($tick['validUntil'])->format('d.m.y') }}</span><span class="direct-code">{{ $Carbon->parse($tick['validUntil'])->format('H:i') }}</span></span>
																	<span class="ticket-code">Цена: <span class="direct-code"> {{ $tick['totalPrice'] }} {{ $tick['currency']['caption'] }}.</span></span>
																</div>
															</div>
														</div>
													</div>
												</div>
												@php $i++; @endphp
											@endforeach
											<div class="bought-tickets-row text-left">
												<div class="row">
													<div class="col-12">
														<ul>
															<li>- Есть смартфон или планшет? На входе в зал предъяви с экрана коды билетов.</li>
															<li>- Нет мобильного устройства, но есть принтер ? Распечатай эту страницу и предъяви на контроле перед входом в зал.  Графические коды должны быть видны хорошо, без полос и пропусков.</li>
															<li>- Eсли все перечисленное не подходит. Электронные билеты необходимо обменять в кассе до начала сеанса. Покажите или назовите кассиру коды билетов с этой страницы.</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										@if(!empty($return))
											<div class="tickets-back text-left">
												<h3>Возврат билетов</h3>
												<div class="row">
													<div class="col-6">
														<p>В автоматическом режиме доступен до 
													{{ $Carbon->parse($return['returnUntil'])->format('d.m.Y H:i') }}.</p>
														<a href="#" class="rules">Правила возврата билетов</a>
													</div>	
													<div class="col-6">
														@if(!empty($return))
														<form action="/tickets/return" method="POST">
															@csrf
															<input type="hidden" name="return_id" value="{{ $return['number'] }}">
															<button type="submit" class="give-back-tickets">Вернуть {{ count($tickets['tickets']['ticket']) }} билет(-а)</button>
														</form>
														@endif
												<div class="row">
													<div class="col-md-12">
														<p class="request-numb">Номер заказа vkino.ua — <b>{{ $ticket['orderNumber'] }}</b>. Укажите его при обращении в <a href="#">службу поддержки покупателей</a>. Этот номер не является билетом (кодом билета) и не дает право прохода или обмена.</p>
													</div>
												</div>
											</div>
										</div>
									</div> 
								@endif
							</div>
			</div>
		</div>
        </div>
	</section>

@endsection