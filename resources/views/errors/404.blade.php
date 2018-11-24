@extends('layouts.main')
@section('content')
   <section class="error-section">
       <div class="container">
           <div class="row">
               <div class="col-12 col-sm-12 fix-error-column">
                  <div class="container-for-image-error">
                       <img class="image-404 img-responsive d-md-block d-lg-block d-xl-block" src="{{ asset('img/image-404.jpg') }}" alt="Not found 404"><img class="image-404-retina img-responsive d-md-block d-lg-block d-xl-block" src="{{ asset('img/image-404-retina.jpg') }}" alt="Not found 404">
                       <div class="block-error">
                          <div class="row">
                          	<div class="col-12 col-sm-12 col-md-12">
                          		<h1>404</h1>
                           		<p>Ошибка</p>
                          	</div>
                          	<div class="col-12 col-sm-12 col-md-12">
                          		<p class="page-undefined">Страница не <br><br>существует</p>
                          	</div>
                          	<div class="col-12 col-sm-12 col-md-12">
								<a href="/" class="button-empty">На главную<span class="footer-button-arrow"><img src="{{ asset('img/footer-arrow-sprite.png') }}" alt=""></span></a>
                          	</div>
                          </div>
                       </div>
                  </div>
               </div>
           </div>
		   </div>
   </section>
   <div class="container">
   	<div class="row">
   		<div class="col d-flex change-error-btn">
   			<a href="/" class="button-empty mobile-error-btn d-block d-sm-block d-md-none">На главную<span class="footer-button-arrow"><img src="{{ asset('img/footer-arrow-sprite-retina.png') }}" alt="" class="footer-arrow-retina"></span></a>
   		</div>
   	</div>
   </div>	
@endsection