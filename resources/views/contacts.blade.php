<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title>Контакты</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon-180x180.png') }}">
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#CCB6A6">
	<!-- Custom Browsers Color End -->
	<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="contacts-custom">
    
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
    
    <!-- End Of Top Menu Line -->
   <div class="fix-overflow-all"> 
    <section class="contacts">
        <h1>Контакты</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 wow fadeInUpBig">
                   <div class="row">
                   	<div class="col-12 col-sm-12 col-md-12">
						<div class="contacts-list">
							<p class="item-contacts-list">{{ setting('sayt.address') }}</p>
						</div>
                   		<div class="contacts-phones">
							<p class="item-contacts-phones">
								<a href="tel:{{ setting('obratnaya-svyaz.phone_1') }}">{{ setting('obratnaya-svyaz.phone_1') }}</a>
							</p>
							<p class="item-contacts-phones">
								<a href="tel:{{ setting('obratnaya-svyaz.phone_2') }}">{{ setting('obratnaya-svyaz.phone_2') }}</a>
							</p>
							<p class="item-contacts-phones">
								<a href="tel:{{ setting('obratnaya-svyaz.phone_3') }}">{{ setting('obratnaya-svyaz.phone_3') }}</a>
							</p>
                    	</div>
                   	</div>
                   	<div class="col-12 col-sm-12 col-md-12">
                   		<div class="time-working">
							<p class="time-caption">
								Работаем
							</p>
							<p>
								Без выходных
							</p>
							<p>
								10:00  —  22:00
							</p>
                    	</div>
                   		 <div class="contacts-social">
							<ul>
								<li>
									<a href="{{ setting('sayt.insta_link') }}">
										<img class="instagram-contact" src="{{ asset('img/instagram-contact-sprite.png') }}" alt=""><img class="instagram-contact-retina" src="{{ asset('img/instagram-contact-sprite-retina.png') }}" alt="">
									</a>
								</li>
								<li>
									<a href="{{ setting('sayt.facebook_link') }}">
										<img class="facebook-contact" src="{{ asset('img/facebook-contact-sprite.png') }}" alt=""><img class="facebook-contact-retina" src="{{ asset('img/facebook-contact-sprite-retina.png') }}" alt="">
									</a>
								</li>
							</ul>
                    	</div>
                   	</div>
                   </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 wow fadeInUpBig">
                    <div id="palladium-location">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.2397189345616!2d36.23120921609043!3d49.988114979414306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0f1575ab039%3A0x91e4e23223a94c75!2sPalladium+Cinema!5e0!3m2!1sru!2sus!4v1542975469164" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- Footer feedback -->
    <footer class="ft-feedback">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 wow fadeInLeftBig">
                    <div class="ft-socials">
                        <h5>Связаться с нами</h5>
                        <ul>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_telega') }}"><span><img class="tg-footer" src="{{ asset('img/tg-footer-sprite.png') }}" alt=""><img class="tg-footer-retina" src="{{ asset('img/tg-footer-sprite-retina.png') }}" alt=""></span></a></li>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_facebook') }}"><span><img class="fb-footer" src="{{ asset('img/fb-footer-sprite.png') }}" alt=""><img class="fb-footer-retina" src="{{ asset('img/fb-footer-sprite-retina.png') }}" alt=""></span></a></li>
							<li><a href="{{ setting('obratnaya-svyaz.feedback_viber') }}"><span><img class="vb-footer" src="{{ asset('img/vb-footer-sprite.png') }}" alt=""><img class="vb-footer-retina" src="{{ asset('img/vb-footer-sprite-retina.png') }}" alt=""></span></a></li>
						</ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8 wow fadeInRightBig">
                	@if (count($errors) > 0)
					  <div class="alert alert-danger">
					    <ul>
					      @foreach ($errors->all() as $error)
					        <li>{{ $error }}</li>
					      @endforeach
					    </ul>
					  </div>
					@endif
                    <form action="/form-feedback" method="POST">
                    	@csrf
                    	<div class="form-group">
                            <label for="yourName">Ваше имя *</label>
                            <input type="text" name="name" class="form-control" id="yourName" placeholder="">
                        </div>
                        <div class="row">
                            <div class="col-12">
	                            <div class="form-group">
	                                <label for="yourEmail">Email *</label>
	                                <input name="email" type="email" class="form-control" id="yourEmail" placeholder="">
	                            </div> 
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label for="yourMessage">Сообщение *</label>
                            <textarea name="msg" class="form-control" id="yourMessage" minlength="6"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                              <div class="captcha-contacts">
                              	
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <button type="submit">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    
	<div class="sub-footer sub-footer-all-pages-fix">
        <a href="/" class="logo-subfooter">
            <img class="img-responsive logo-subfooter-image" src="img/logo-desktop.png" alt=""><img class="img-responsive logo-subfooter-image-retina" src="img/logo-desktop-retina.png" alt="">
        </a>
        <span class="sub-caption">Вы всегда в главной роли!</span>
    </div>

    <div class="siteby">
   		<div class="text-center">
   			<a href="https://unitspace.top/">Разработка сайтов Киев, Харьков</a>
   		</div>
   </div>
    
	</div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9My95iM8DEGwxsmBQVtNi5RHlPvE_dQs&callback=initMap">
    </script>
    <script src="js/scripts.min.js"></script>
</body>
</html>