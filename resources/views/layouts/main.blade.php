<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title>{{ $title }}</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon-180x180.png') }}">
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#CCB6A6">
	<!-- Custom Browsers Color End -->
	<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">

	<link rel="stylesheet" href="{{ asset('css/main.min.css') }}">

</head>

<body class="{{ $body_class }}">

	<!-- Top Menu Line -->

	<header class="header-height-fix">
		<div class="container-fluid">
			<div class="navigation">
				<div class="row">
					<div class="col-6 col-md-8">
						<div class="navigation__left">						
							<a href="/" class="logo"><img src="{{ asset('img/logo-desktop_backUp.png') }}" alt=""></a>
							<a href="/" class="logo-responsive"><img class="logo-responsive-image" src="{{ asset('img/logo-responsive.png') }}" alt=""><img class="logo-responsive-image-retina" src="{{ asset('img/logo-responsive-retina.png') }}" alt=""></a>
							{{ menu('main', 'main_menu') }}							
						</div>
					</div>
					<div class="col-6 col-md-4">
						<div class="navigation__right">
							<a href="tel:{{ setting('obratnaya-svyaz.phone_1') }}"><span class="phone">{{ setting('obratnaya-svyaz.phone_1') }}</span></a>
							<button class="hamburger hamburger--squeeze" type="button">
							  <span class="hamburger-box">
							    <span class="hamburger-inner"></span>
							  </span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="popup-menu" data-style="hidden">
	
			<div class="popup-right-menu">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-12">
					<div class="unathorized-menu">
						@if(!session('token'))
							<a href="/account" class="authorize">Войти в личный кабинет</a>
						@else
							{{ menu('auth', 'auth_menu') }}
						@endif
						{{ menu( 'aside', 'aside_menu' ) }}
						<div class="row mb-mnu-information">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 d-block d-xl-none pr-0">
								<div class="contact-list-mobile-m">
									<p class="ct-mb-item-change ml-mb">{{ setting('sayt.address') }}</p>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 d-block d-xl-none">
								<div class="ph-list-mobile-m">
									<a href="tel:{{ setting('obratnaya-svyaz.phone_2') }}"><p class="ph-mob-item ml-mb-scd">{{ setting('obratnaya-svyaz.phone_2') }}</p></a>
									<a href="tel:{{ setting('obratnaya-svyaz.phone_3') }}"><p class="ph-mob-item ">{{ setting('obratnaya-svyaz.phone_3') }}</p></a>
								</div>	
							</div>
						</div>
						
						<div class="wrapper-nav-contacts">
							<p class="d-none d-sm-none d-md-none d-lg-none d-xl-block">{{ setting('sayt.address') }}</p>
							<div class="phone-socials d-none d-sm-none d-md-none d-lg-none d-xl-block">
								<div class="row">
									<div class="col">
										<a href="tel:{{ setting('obratnaya-svyaz.phone_2') }}"><span>{{ setting('obratnaya-svyaz.phone_2') }}</span></a>
										<a href="tel:{{ setting('obratnaya-svyaz.phone_3') }}"><span>{{ setting('obratnaya-svyaz.phone_3') }}</span></a>
									</div>
									<div class="col">
										<div class="text-left">
											<ul class="social-icons">
												<li><a href="{{ setting('sayt.insta_link') }}" target="_blank"><span><img id="inst-aside" src="{{ asset('img/instagram-aside-sprite.png') }}" alt="Palladium instagram"><img id="inst-aside-retina" src="{{ asset('img/instagram-aside-sprite-retina.png') }}" alt="Palladium instagram"></span></a></li>
												<li><a href="{{ setting('sayt.facebook_link') }}" target="_blank"><span class="fb"><img id="fb-aside" src="{{ asset('img/facebook-aside-sprite.png') }}" alt="Palladium facebook"><img id="fb-aside-retina" src="{{ asset('img/facebook-aside-sprite-retina.png') }}" alt="Palladium facebook"></span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl">
						<aside class="contact-for-menu d-none d-sm-none d-lg-block d-xl-none">
							<div class="contact-item">
								<a href="{{ setting('sayt.tel_shop_link') }}" target="_blank">
									<span><img class="telegram-icon-menu" src="{{ asset('img/telegram-icon.png') }}" alt="Telegram кассир"><img class="telegram-icon-menu-retina" src="{{ asset('img/telegram-icon-retina.png') }}" alt="Telegram кассир"></span>
									Telegram <br> кассир
								</a>
							</div>
							<div class="contact-item">
								<a href="{{ setting('sayt.insta_link') }}" target="_blank">
									<img class="instagram-icon-menu" src="{{ asset('img/instagram-icon.png') }}" alt="Palladium instagram"><img class="instagram-icon-menu-retina" src="{{ asset('img/instagram-icon-retina.png') }}" alt="Palladium instagram">
								</a>
								<a href="{{ setting('sayt.facebook_link') }}" target="_blank">
									<img class="facebook-icon-menu" src="{{ asset('img/facebook-icon.png') }}" alt="Palladium facebook"><img class="facebook-icon-menu-retina" src="{{ asset('img/facebook-icon-retina.png') }}" alt="Palladium facebook">
								</a>
							</div>
							<div class="contact-item">
								<a href="{{ setting('sayt.app_i_link') }}" target="_blank">
									<img class="apple-icon-menu" src="{{ asset('img/apple-icon.png') }}" alt="Palladium Application AppStore"><img class="apple-icon-menu-retina" src="{{ asset('img/apple-icon-retina.png') }}" alt="Palladium Application AppStore">
								</a>
								<a href="{{ setting('sayt.app_a_link') }}" target="_blank">
									<img class="android-icon-menu" src="{{ asset('img/android-icon.png') }}" alt="Palladium Application Play Market"><img class="android-icon-menu-retina" src="{{ asset('img/android-icon-retina.png') }}" alt="Palladium Application Play Market">
								</a>
							</div>
						</aside>
					</div>
					<aside class="contact-for-menu d-block d-sm-block d-md-none">
							<div class="contact-item">
								<a href="{{ setting('sayt.tel_shop_link') }}" target="_blank">
									<span><img class="telegram-icon-menu" src="{{ asset('img/telegram-icon.png') }}" alt="Telegram кассир"><img class="telegram-icon-menu-retina" src="{{ asset('img/telegram-icon-retina.png') }}" alt="Telegram кассир"></span>
									Telegram <br> кассир
								</a>
							</div>
							<div class="contact-item">
								<a href="{{ setting('sayt.insta_link') }}" target="_blank">
									<img class="instagram-icon-menu" src="{{ asset('img/instagram-icon.png') }}" alt="Palladium instagram"><img class="instagram-icon-menu-retina" src="{{ asset('img/instagram-icon-retina.png') }}" alt="Palladium instagram">
								</a>
								<a href="{{ setting('sayt.facebook_link') }}" target="_blank">
									<img class="facebook-icon-menu" src="{{ asset('img/facebook-icon.png') }}" alt="Palladium facebook"><img class="facebook-icon-menu-retina" src="{{ asset('img/facebook-icon-retina.png') }}" alt="Palladium facebook">
								</a>
							</div>
							<div class="contact-item">
								<a href="{{ setting('sayt.app_i_link') }}" target="_blank">
									<img class="apple-icon-menu" src="{{ asset('img/apple-icon.png') }}" alt="Palladium Application AppStore"><img class="apple-icon-menu-retina" src="{{ asset('img/apple-icon-retina.png') }}" alt="Palladium Application AppStore">
								</a>
								<a href="{{ setting('sayt.tel_shop_link') }}" target="_blank">
									<img class="android-icon-menu" src="{{ asset('img/android-icon.png') }}" alt="Palladium Application Play Market"><img class="android-icon-menu-retina" src="{{ asset('img/android-icon-retina.png') }}" alt="Palladium Application Play Market">
								</a>
							</div>
						</aside>
				</div>
			</div>
			
		
	</div>	

	<div class="try-luck">
		<a href="#">
			<span class="decr">Получи приз</span>
			<img class="fortune-wheel" src="{{ asset('img/spinroll.png') }}" alt="">
		</a>
	</div>

	<!-- End Of Top Menu Line -->

	<aside class="contact">
		<div class="contact__item">
			<a href="{{ setting('sayt.tel_shop_link') }}" target="_blank"><span class="tg-aside-retina" ><img id="tg-aside-retina" src="{{ asset('img/telegram-aside-sprite-retina.png') }}" alt="Telegram кассир"></span>Telegram кассир</a>
		</div>
		<div class="contact__item">
			<a href="{{ setting('sayt.insta_link') }}"  target="_blank"><span><img id="inst-aside" src="{{ asset('img/instagram-aside-sprite.png') }}" alt="Palladium instagram"><img id="inst-aside-retina" src="{{ asset('img/instagram-aside-sprite-retina.png') }}" alt="Palladium instagram"></span></a>
			<a href="{{ setting('sayt.facebook_link') }}" target="_blank"><span><img id="fb-aside" src="{{ asset('img/facebook-aside-sprite.png') }}" alt="Palladium facebook"><img id="fb-aside-retina" src="{{ asset('img/facebook-aside-sprite-retina.png') }}" alt="Palladium facebook"></span></a>
		</div>
		<div class="contact__item">
			<a href="{{ setting('sayt.app_i_link') }}" target="_blank"><span><img id="apple-aside" src="{{ asset('img/apple-aside-sprite.png') }}" alt="Palladium Application AppStore"><img id="apple-aside-retina" src="{{ asset('img/apple-aside-sprite-retina.png') }}" alt="Palladium Application AppStore"></span></a>
			<a href="{{ setting('sayt.app_a_link') }}" target="_blank"><span><img id="android-aside" src="{{ asset('img/android-aside-sprite.png') }}" alt="Palladium Application Play Market"><img id="android-aside-retina" src="{{ asset('img/android-aside-sprite-retina.png') }}" alt="Palladium Application Play Market"></span></a>
		</div>
	</aside>

	@yield('content')

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 wow fadeInUpBig">
					<div class="content">
						<h5>Связаться с нами</h5>
						<span>Вы можете написать в любое из <br> приложений:</span>
						<ul class="footer-social">
							<li><a href="{{ setting('obratnaya-svyaz.feedback_telega') }}"><span><img id="tg-footer" src="{{ asset('img/tg-footer-sprite.png') }}" alt="Palladium telegram"><img id="tg-footer-retina" src="{{ asset('img/tg-footer-sprite-retina.png') }}" alt="Palladium telegram"></span></a></li>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_facebook') }}"><span><img id="fb-footer" src="{{ asset('img/fb-footer-sprite.png') }}" alt="Palladium facebook"><img id="fb-footer-retina" src="{{ asset('img/fb-footer-sprite-retina.png') }}" alt="Palladium facebook"></span></a></li>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_viber') }}"><span><img id="vb-footer" src="{{ asset('img/vb-footer-sprite.png') }}" alt="Palladium viber"><img id="vb-footer-retina" src="{{ asset('img/vb-footer-sprite-retina.png') }}" alt="Palladium viber"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 wow fadeInUpBig">
					<div class="write-to-director">
						<div class="content">
							<h5>Написать директору</h5>
							<span>С жалобами и предложениями вы можете <br> напрямую написать директору</span>
							<div class="row">
								<div class="col">
									<a href="#write-director" class="button-filled">Написать</a>
								</div>
								<div class="col">
									<div class="text-right">
										<a href="/contacts" class="button-empty">Открыть карту<span><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/arrow-sprite-retina.png') }}" alt=""></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="footer-mobile footer-mobile-all-pages-fix additional-class additional-class1 additional-class2 additional-class3 additional-class4">
		<div class="contact-us-part">
			<div class="container">
				<div class="row fix-rmobile-footer">
					<div class="col-12 col-sm-12 col-md-6">
						<h3>Связаться с нами</h3>
						<p>Вы можете написать в любое из <br> приложений:</p>
					</div>
					<div class="col-12 col-sm-12 col-md-6">
						<ul class="soc-nets">
							<li><a href="{{ setting('obratnaya-svyaz.feedback_telega') }}"><span><img class="tg-footer" src="{{ asset('img/tg-footer-sprite.png') }}" alt=""><img class="tg-footer-retina" src="{{ asset('img/tg-footer-sprite-retina.png') }}" alt=""></span></a></li>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_facebook') }}"><span><img class="fb-footer" src="{{ asset('img/fb-footer-sprite.png') }}" alt=""><img class="fb-footer-retina" src="{{ asset('img/fb-footer-sprite-retina.png') }}" alt=""></span></a></li>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_viber') }}"><span><img class="vb-footer" src="{{ asset('img/vb-footer-sprite.png') }}" alt=""><img class="vb-footer-retina" src="{{ asset('img/vb-footer-sprite-retina.png') }}" alt=""></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="contact-us-part bg-map">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6">
						<h3>Написать директору</h3>
						<p>С жалобами и предложениями вы <br> можете напрямую написать директору</p>
					</div>
					<div class="col-sm-12">
						<div class="row write-mt">
							<div class="col-12 col-sm-12 col-md-6">
								<a href="#write-director" class="button-filled">Написать</a>
							</div>
							<div class="col-12 col-sm-12 col-md-6">
								<div class="text-right">
									<a href="/contacts" class="button-empty">Открыть карту<span><img class="footer-arrow" src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""><img class="footer-arrow-retina" src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt=""></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="write-director" class="white-popup-block mfp-hide">
		<div class="popup-heading">
			<h4>Написать директору</h4>
			<a href="#" class="close-director-popup"><img src="{{ asset('img/close-popup.png') }}" alt=""></a>
		</div>
		<div class="popup-form">
			<form id="director-form" method="POST" action="/form-feedback">
				 @csrf
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<label>Ваше имя *</label>
						<input type="text" required name="name">
					</div>
					<div class="col-sm-12 col-md-6">
						<label>Email *</label>
						<input type="email" id="director-form-email" name="email" required>
					</div>
					<div class="col-sm-12 col-md-12">
						<label>Сообщение *</label>
						<textarea id="director-form-message" name="msg" required></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button type="submit">Отправить</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="sub-footer sub-footer-all-pages-fix">
        <a href="/" class="logo-subfooter">
            <img class="img-responsive logo-subfooter-image" src="{{ asset('img/logo-desktop.png') }}" alt=""><img class="img-responsive logo-subfooter-image-retina" src="{{ asset('img/logo-desktop-retina.png') }}" alt="">
        </a>
        <span class="sub-caption">Вы всегда в главной роли!</span>
    </div>

   <div class="siteby">
   		<div class="text-center">
   			<a href="https://unitspace.top/">Разработка сайтов Unit Space</a>
   		</div>
   </div>

	<div class="telegram-cashier-fixed d-sm-flex d-md-none justify-content-center align-items-center">
		<img class="cashier-arrow" src="{{ asset('img/cashier-arrow-up.png') }}" alt="">
		<a href="{{ setting('sayt.tel_shop_link') }}" target="_blank"><img class="cashier-logo" src="{{ asset('img/telegram-icon-retina.png') }}" alt="">
		<span>Telegram кассир</span></a>
	</div>

	<script src="{{ asset('js/scripts.min.js') }}"></script>

</body>
</html>
