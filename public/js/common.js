$(function() {

  //new WOW().init();

	$(".slider-home").slick({
		infinite: false,
		slidesToShow: 1,
    variableWidth: true,
    touchThreshold: 20,
		nextArrow: "<span class='controls-next'><img class='arrow-next' src='img/arrow-next-sprite.png'><img class='arrow-next-retina' src='img/arrow-next-sprite-retina.png'></span>",
    prevArrow: "<span class='controls-prev'><img class='arrow-prev' src='img/arrow-prev-sprite.png'><img class='arrow-prev-retina' src='img/arrow-prev-sprite-retina.png'></span>"

    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    
	});

  $(".slider-cards").slick({
    infinite: false,
    slidesToShow: 1,
    touchThreshold: 20,
    nextArrow: "<span class='controls-next'><img class='arrow-next' src='img/arrow-next-sprite.png'><img class='arrow-next-retina' src='img/arrow-next-sprite-retina.png'></span>",
    prevArrow: "<span class='controls-prev'><img class='arrow-prev' src='img/arrow-prev-sprite.png'><img class='arrow-prev-retina' src='img/arrow-prev-sprite-retina.png'></span>"
  });

	$(".slider-soon").slick({
		infinite: false,
		slidesToShow: 4,
    variableWidth: true,
    speed: 700,
    touchThreshold: 20,
		nextArrow: "<span class='controls-next'><img class='arrow-next' src='img/arrow-next-sprite.png'><img class='arrow-next-retina' src='/img/arrow-next-sprite-retina.png'></span>",
    prevArrow: "<span class='controls-prev'><img class='arrow-prev' src='img/arrow-prev-sprite.png'><img class='arrow-prev-retina' src='img/arrow-prev-sprite-retina.png'></span>",
    responsive: [
    {
      breakpoint: 1024,
      settings: {
          slidesToShow: 4,
          dots: false
        }
      },
      {
      breakpoint: 980,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false
        }
      },
      {
      breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
      },
      {
      breakpoint: 576,
        settings: {
          slidesToShow: 1
        }
      }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
	});

 /*   $(".slider-soon-wrapper .slider-soon").slick({
    infinite: true,
    slidesToShow: 4,
    prevArrow: "<img class='controls-prev' src='img/arrow-prev.png'>",
    nextArrow: "<img class='controls-next' src='img/arrow-next.png'>",
    responsive: [
    {
      breakpoint: 1024,
      settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          infinite: true,
          dots: false,
          variableWidth: false
        }
      },
      {
      breakpoint: 980,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
      breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
      breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });*/

  $(".dates-silder").slick({
    infinite: false,
    slidesToShow: 12,
    slidesToScroll: 1,
    variableWidth: true,
    touchThreshold: 20,
	//asNavFor: '.sessions-slider',
    nextArrow: "<span class='controls-next'><img class='arrow-next' src='img/arrow-next-sprite.png'><img class='arrow-next-retina' src='img/arrow-next-sprite-retina.png'></span>",
    prevArrow: "<span class='controls-prev'><img class='arrow-prev' src='img/arrow-prev-sprite.png'><img class='arrow-prev-retina' src='img/arrow-prev-sprite-retina.png'></span>",
    responsive: [
    {
      breakpoint: 1024,
        settings: {
          slidesToShow: 10
        }
      },
      {
      breakpoint: 980,
        settings: {
          slidesToShow: 7
        }
      },
      {
      breakpoint: 768,
        settings: {
          slidesToShow: 7
        }
      },
      {
      breakpoint: 480,
        settings: {
          slidesToShow: 4
        }
      }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

//  $(".sessions-slider").slick({
//    infinite: false,
//	arrows: false,
//    slidesToShow: 1,
//    slidesToScroll: 1,
//    variableWidth: true,
//    touchThreshold: 20,
//	asNavFor: '.about-movie .dates-silder'
//  });

  var alldays = $(".date");


	
	$(".hamburger").click(function() {
		$(this).toggleClass("is-active");
		if($(".popup-menu").data("style") == "hidden") {
			$(".popup-right-menu").addClass("slideInRight");
      		$(".popup-menu").fadeIn();
			$(".popup-menu").data("style", "visible");
      		$("body").addClass("noscroll");
		}
		else {
			$(".popup-menu").fadeOut();
			$(".popup-menu").data("style", "hidden");
     		$("body").removeClass("noscroll");
		}
	
	});
	
	$(".popup-menu").on('click', function(e) {
		if(e.target !== this) {
		  return
		}
		if($(".hamburger").hasClass("is-active")) {
			$(this).fadeOut();
			$(this).data("style", "hidden");
			$("body").removeClass("noscroll");
			$(".hamburger").removeClass("is-active");
			$('html').css('overflow', 'auto');
		}
	});	
	
  $(".anouncments-slider").slick({
    infinite: true,
    slidesToShow: 4,
  });

/*  $(".about-movie .video").click(function(e) {
    if(e.target!=this){
      return;
    }
    if(browser=='Firefox') {
      var playedTrailer = $(this);
      if($(this).get(0).played) {
        playedTrailer.get(0).pause();
        $(this).parent().find(".current-film").show();
      }
    } else {
      player.pauseVideo();
      $(this).parent().find(".current-film").show();
    }
  });

  $(".current-film").click(function() {
    if(browser=='Firefox') {
      var currentTrailer = $(this).parent().find("video");
      if(currentTrailer.get(0).paused) {
        currentTrailer.get(0).play();
        $(this).hide();
      }
    } else {
      player.playVideo();
      $(this).hide();
    }
  });*/
  $(".about-movie .video .overlay").click(function(e) {
   /* if(e.target!=this){
      return;
    }*/
    player.pauseVideo();
    $(this).parent().find(".current-film").show();
    //$(this).hide();
  });

  $(".current-film").click(function() {
    player.playVideo();
    //$(this).parent().find(".overlay").show();
    if(player.getPlayerState()!=2){
      setTimeout(function() {
        $(".current-film").hide();
      }, 300);
    } else {
      $(".current-film").hide();
    }
  });

/*  $("video").click(function() {
    if(browser=='Firefox') {
      var playedTrailer = $(this);
      if($(this).get(0).played) {
        playedTrailer.get(0).pause();
        $(this).parent().find(".current-film").show();
      }
    } else {
      player.pauseVideo();
      $(this).parent().find(".current-film").show();
    }
  });*/

  $(".seat-place").click(function() {
    var th = $(this),
        seatsInRow = th.parent().find(".seat-place"),
        numberOfClicked = seatsInRow.index(this) + 1;
        
        th.toggleClass("chosen"); 
        
        if(!$(this).find(".seat-number").length > 0) {
          $(this).append("<span class='seat-number'>" + numberOfClicked + "</span>");
        }
        else {
         $(this).find(".seat-number").remove();
        }
        
        if($(this).hasClass("bought")) {
          $(this).removeClass("chosen");
          $(this).find(".seat-number").remove();
        }

  });

  $('.custom').selectpicker({
    style: 'btn-info',
    size: 10
  });

  $('.custom-second').selectpicker({
    style: 'btn-info',
    size: 3
  });

  $('.film-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $(".button-filled").magnificPopup({
    type: 'inline',
    preloader: true,
    focus: '#username',
    modal: true,
    closeOnBgClick: true
  });

  $(".callme").magnificPopup({
    type: 'inline',
    preloader: true,
    focus: '#username',
    modal: true,
    closeOnBgClick: true
  });

  $(".send-call-request").magnificPopup({
    type: 'inline',
    preloader: true,
    focus: '#username',
    modal: true,
    closeOnBgClick: true
  });

  $(".button-filled").click( function () {
    $('html').css("overflow-y", "hidden");
  });

  $(".soon .play-button").magnificPopup({
    items: {
      src: '<div class="trailer-popup"><video controls><source src="videos/Avengers.mp4" type="video/mp4"></video></div>',
      type: 'inline'
    },
    closeBtnInside:true
  });

$(document).on('click', '.close-director-popup', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
    $('html').css("overflow-y", "unset");
  });


  $(".dropdown-toggle").click(function() {
    if($(window).width()>768) {
      $(this).parent().find(".dropdown-menu.inner").slideToggle();
      return;
    }
    if( $(this).parent().find(".dropdown-menu.inner").attr("style") != "display: block;" || $(this).parent().find(".dropdown-menu.inner").attr("style") == undefined ) {
      $(this).parent().animate({"padding-bottom":"1.215vw"},400);
      //$(this).parent().css("padding-bottom", "10px");
    } else {
      $(this).parent().animate({"padding-bottom":"0px"},400);
      //$(this).parent().css("padding-bottom", "0px");
    }
    $(this).parent().find(".dropdown-menu.inner").slideToggle();
  });
  $(".movie-details").click(function(){
    if( $(this).find(".bootstrap-select.custom .dropdown-menu.inner").attr("style")=="display: block;") {
      $(this).find(".bootstrap-select.custom .dropdown-menu.inner").slideToggle();
      $(this).find(".bootstrap-select.custom .dropdown-menu.inner").parent().parent().animate({"padding-bottom":"0px"},400);
    }
    if( $(this).find(".bootstrap-select.custom-second .dropdown-menu.inner").attr("style")=="display: block;") {
      $(this).find(".bootstrap-select.custom-second .dropdown-menu.inner").slideToggle();
      $(this).find(".bootstrap-select.custom-second .dropdown-menu.inner").parent().parent().animate({"padding-bottom":"0px"},400);
    }
  });
	
  $("#director-form-phone").mask("rq we00t 000 00 00", {
    translation: {
      "r": {
        pattern: /[0-9]/,
        fallback: "3"
      },
      "q": {
        pattern: /[0-9]/,
        fallback: "8"
      },
      "w": {
        pattern: /[0-9]/,
        fallback: "("
      },
      "e": {
        pattern: /[0-9]/,
        fallback: "0"
      },
      "t": {
        pattern: /[0-9]/,
        fallback: ")"
      }
    }
  });

  $("#send").click(function() {
    $(".popup").show().animate({
		opacity : 1
	}, 400);
  });

  $(".close").click(function() {
    $(".popup").hide().animate({
		opacity: 0
	}, 500);
  });

  $(".tab_item").not(":first").hide();
  $(".wrapper .tab").click(function() {
    $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".tab_item").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

    $(".tab_item-account").not(":first").hide();
  $(".wrapper-account .tab-account").click(function() {
    $(".wrapper-account .tab-account").removeClass("active").eq($(this).index()).addClass("active");
    $(".tab_item-account").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

   $('.scheme-slider').slick({
        infinite: true,
        slidesToShow: 3
    });
    
    // Slider vimeo on PAGE NEWS
    
    $('.wrapper-to-slider > div.slider-vimeo').slick({
        infinite: true,
        slidesToShow: 1,
        adaptiveHeight: true,
        variableWidth: true,
        speed: 500,
        asNavFor: '.slider-vimeo-info',
        nextArrow: "<span class='controls-next'><img class='arrow-next' src='img/arrow-next-sprite.png'><img class='arrow-next-retina' src='img/arrow-next-sprite-retina.png'></span>",
        prevArrow: "<span class='controls-prev'><img class='arrow-prev' src='img/arrow-prev-sprite.png'><img class='arrow-prev-retina' src='img/arrow-prev-sprite-retina.png'></span>"
    });
    $('.slider-vimeo-info').slick({
        infinite: true,
        slidesToShow: 1,
        adaptiveHeight: true,
        speed: 500,
        arrows: false,
        fade: true,
        asNavFor: '.slider-vimeo'
    });
    
     $('.wrapper-to-slider > div.slider-vimeo').on('afterChange', function(event, slick, currentSlide, nextSlide){
            $('.wrapper-to-slider .current-item-slider>span.current-slide').html(currentSlide+1);
    });

    $("aside.contact span").hover(function() {
      $(this).find("img").css("top", "-"+($(this).find("img")[0].clientHeight/2+5)+"px");
    }, function() {
      $(this).find("img").css("top", "0");
    });

    $(".footer-social img").hover(function() {
      $(this).css("top", "-"+(this.clientHeight/2+5)+"px");
    });

     $(".footer-social img").mouseout(function() {
      $(this).css("top", "0");
    });

     $(".ft-feedback ul img").hover(function() {
      $(this).css("top", "-"+(this.clientHeight/2+5)+"px");
    });

     $(".ft-feedback ul img").mouseout(function() {
      $(this).css("top", "0");
    });

     $(".play-button img").hover(function() {
      if($(window).width()>=768){
        $(this).css("top", "-"+(this.clientHeight/2+4)+"px");
      } else {
        $(this).css("top", "-102%");
      }
    },function() {
      $(this).css("top", "1px");
    });

     $(".play-button.current-film img").hover(function() {
      if($(window).width()>1024){
        $(this).css("top", "-114%");
      } else if($(window).width()>=992){
        $(this).css("top", "-108%");
      } else if($(window).width()>=768){
        $(this).css("top", "-105%");
      } else {
        $(this).css("top", "-107%");
      }
    },function() {
      $(this).css("top", "0");
    });

      $(".contacts-social img").hover(function() {
        if(window.devicePixelRatio >= 2.1) {
          $(this).css("top", "-"+(this.clientHeight/2+3)+"px");
        } else {
          $(this).css("top", "-"+(this.clientHeight/2+5)+"px");
        }
    });

    $("aside.contact span.tg-aside-retina").hover(function() {
        $(this).find("img").css("top", "-"+($(this).find("img")[0].clientHeight/2+2.74)+"px");
    }, function() {
        $(this).find("img").css("top", "0");
    });

     $(".contacts-social img").mouseout(function() {
      if(window.devicePixelRatio >= 2.1) {
          $(this).css("top", "-2px");
        } else {
          $(this).css("top", "0");
        }
    });

    $(".social-icons span").hover(function() {
      $(this).find("img").css("top", "-"+($(this).find("img")[0].clientHeight/2+5)+"px");
    }, function(){
      $(this).find("img").css("top", "0");
    });

    $(".actions-link").hover(function() {
      if(!$(this).parent().hasClass("nav-left")){
        if ( $(window).width()<992 && $(window).width()>=768 ){
          $(this).find("img").css("top", "-"+(this.clientHeight/2+7)+"px");
        } else if ( $(window).width()<768 ){
          $(this).find("img").css("top", "-4.1vw");
        } else {
          $(this).find("img").css("top", "-"+(this.clientHeight/2+8)+"px");
        }
      }
    }, function(){
      if(!$(this).parent().hasClass("nav-left")){
        $(this).find("img").css("top", "0");
      }
    });

    $(".nw-btn").hover(function() {
      if($(window).width()>1024){
        $(this).find("img").css("top", "-"+(this.clientHeight/2+10)+"px");
      } else {
        $(this).find("img").css("top", "-"+(this.clientHeight/2+9)+"px");
      }
    }, function(){
      $(this).find("img").css("top", "0");
    });

    $(".pagination-vip .nav-right .actions-link").hover(function() {
      if($(window).width()>=768){
        $(this).find("img").css("top", "-105%");
      } else {
        $(this).find("img").css("top", "-7vw");
      }
    }, function() {
      if($(window).width()>=768){
        $(this).find("img").css("top", "0");
      } else {
        $(this).find("img").css("top", "-2.9vw");
      }
    });

    $(".button-empty").hover(function() {
      if($(window).width()>=768){
        $(this).find("img").css("top", "-190%");
      }
    }, function() {
      if($(window).width()>=768){
        $(this).find("img").css("top", "0");
      }
    });

    $(".button-empty").on('touchstart', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "-120%");
        $(this).css("background-color", "#ccb6a6");
        $(this).css("border-color", "#ccb6a6");
        $(this).css("color", "#fff");
      }
    });
    $(".button-empty").on('touchend', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "0");
        $(this).css("background-color", "transparent");
        $(this).css("border-color", "#a7978a");
        $(this).css("color", "#a7978a");
      }
    });

	$(".button-empty.mobile-error-btn").on('touchstart', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "-73%");
        $(this).css("background-color", "#ccb6a6");
        $(this).css("border-color", "#ccb6a6");
        $(this).css("color", "#fff");
      }
    });

  $(".see-shedule").hover( function() {
    if($(window).width()>=768){
      $(this).find("img").css("top", "-190%");
      $(this).css("background-color", "#ccb6a6");
      $(this).css("border-color", "#ccb6a6");
      $(this).css("color", "#fff");
    }
  }, function() {
    if($(window).width()>=768){
      $(this).find("img").css("top", "0");
      $(this).css("background-color", "transparent");
      $(this).css("border-color", "#a7978a");
      $(this).css("color", "#a7978a");
    }
  });

  $(".second-see-shedule").hover( function() {
      $(this).find("img").css("top", "-110%");
      $(this).css("background-color", "#ccb6a6");
      $(this).css("border-color", "#ccb6a6");
      $(this).css("color", "#fff");
  }, function() {
      $(this).find("img").css("top", "0");
      $(this).css("background-color", "transparent");
      $(this).css("border-color", "#a7978a");
      $(this).css("color", "#a7978a");
  });
	
	$(".see-shedule.responsive-shedule").on('touchstart', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "-145%");
        $(this).css("background-color", "#ccb6a6");
        $(this).css("border-color", "#ccb6a6");
        $(this).css("color", "#fff");
      }
    }); 
  $(".see-shedule.film-page-btn.film-btn-adaptive").on('touchstart', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "-130%");
        $(this).css("background-color", "#ccb6a6");
        $(this).css("border-color", "#ccb6a6");
        $(this).css("color", "#fff");
      }
    });
  $(".see-shedule.film-page-btn.film-btn-adaptive").on('touchend', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "0");
        $(this).css("background-color", "transparent");
        $(this).css("border-color", "#a7978a");
        $(this).css("color", "#a7978a");
      }
    });
	


//    $(".button-empty").mouseleave(function() {
//      $(this).find("img").css("top", "0");
//    });   

    $(".slick-arrow").hover(function() {
      if(!$(this).parent().hasClass('slider-vimeo') && !$(this).parent().hasClass('slider-cards')){
        $(this).find("img").css("top", "-"+(this.clientHeight/2+10)+"px");
      }
    }, function() {
      if(!$(this).parent().hasClass('slider-vimeo') && !$(this).parent().hasClass('slider-cards')){
        $(this).find("img").css("top", "0");
      }
    });

    $(".slider-home .slick-arrow").hover(function() {
      $(this).find("img").css("top", "-250%");
    },function() {
      $(this).find("img").css("top", "0");
    });

    $(".soon .slick-arrow").hover(function() {
      $(this).find("img").css("top", "-"+(this.clientHeight/2+9)+"px");
    },function() {
      $(this).find("img").css("top", "0");
    });

    $(".slider-vimeo .slick-arrow").hover(function() {
      if($(window).width()>=768){
        $(this).find("img").css("top", "-"+(this.clientHeight/2+8)+"px");
      }
    },function() {
      if($(window).width()>=768){
        $(this).find("img").css("top", "0");
      }
    });

    $(".slider-vimeo .slick-arrow").on('touchstart', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "-7.5vw");
        $(this).css("background-color", "#ccb6a6");
      }
    });
    $(".slider-vimeo .slick-arrow").on('touchend', function(e) {
      if($(window).width()<768){
        $(this).find("img").css("top", "0");
        $(this).css("background-color", "#fff");
      }
    });

    $(".slider-cards .slick-arrow").on('touchstart', function(e) {
        $(this).find("img").css("top", "-7.5vw");
        $(this).css("background-color", "#ccb6a6");
    });
    $(".slider-cards .slick-arrow").on('touchend', function(e) {
        $(this).find("img").css("top", "0");
        $(this).css("background-color", "#f6f4f3");
    });

    $(".dates-silder .slick-arrow").hover(function() {
      $(this).find("img").css("top", "-"+(this.clientHeight/2+12)+"px");
    }, function() {
      $(this).find("img").css("top", "0");
    });

    $(".other-dates").hover(function() {
      $(this).find("img").attr("src", "img/arrow-others-hover.png");
    },function() {
      $(this).find("img").attr("src", "img/arrow-others.png");
    });
	
	var $btn_shedule = $('.see-shedule .resp-btn');
	$(window).resize(function() {
		if($(window).width() < 1024) {
			$btn_shedule.html('Все акции' + '<img src="img/footer-arrow.png" alt="">');
		} else if($(window).width() > 1024) {
			$btn_shedule.html('Вернуться в акции' + '<img src="img/footer-arrow.png" alt="">');
		}
	});
  $(".soon .info .text-right").mouseenter( function () {
      var ticket = $(this).find(".buy-ticket");
      var imageMargin = ticket[0].clientWidth / 10;
      if(window.devicePixelRatio >= 2.1 || $(window).width()<768) {
        ticket.find("img").attr("src", "img/ticket-icon-hover-retina.png");
      } else {
        ticket.find("img").attr("src", "img/ticket-icon-hover.png");
      }
      ticket.parent().parent().prev().css("display", "none");
      ticket.parent().parent().removeClass("col-3");
      ticket.parent().parent().addClass("col-12");

      ticket.css("display", "flex");
      ticket.css("width", "100%");
      ticket.css("justify-content", "center");
      ticket.css("align-items", "center");
      ticket.css("background-color", "#b19f96");
      ticket.find("span").css("display", "inline");
      ticket.find("img").css("margin-right", imageMargin);
  });
  $(".soon .info .text-right").mouseleave( function() {
      var ticket = $(this).find(".buy-ticket");
      if(window.devicePixelRatio >= 2.1 || $(window).width()<768) {
        ticket.find("img").attr("src", "img/ticket-icon-retina.png");
      } else {
        ticket.find("img").attr("src", "img/ticket-icon.png");
      }
      ticket.parent().parent().prev().css("display", "block");
      ticket.parent().parent().removeClass("col-12");
      ticket.parent().parent().addClass("col-3");

      ticket.css("display", "inline-block");
      ticket.css("background-color", "unset");
      ticket.find("span").css("display", "none");
      ticket.find("img").css("margin-right", 0);
  });

  $(document).ready(function(){
    var offer = $(".fix-home+.actions .actions-item h3");
    offer.css("bottom", offer.parent().next()[0].clientHeight);
  });
	
	
  $(".fortune-wheel").hover( 
    function () {
      $(this).prev().css("opacity", "1");
    },
    function () {
      $(this).prev().css("opacity", "0");
    });
  $(".tab_item:nth-child(2)").click( function(e) {
    if( e.target != $("img.default-info")[0] && $("img.default-info").next().css("display") == "block" ){
      $("img.default-info").next().css("display", "none");
    }
  });
  $("div.default-info").hover( 
    function () {
      $(this).find("p").css("display", "block");
    },
    function () {
      $(this).find("p").css("display", "none");
    });
	
	// menu fixed
	var $window_width = $(window).width(),
		$hmb_mnu = $('header.header-height-fix .navigation__right .hamburger.hamburger--squeeze'),
		$test_span = $('header.header-height-fix .navigation__right .hamburger .hamburger-inner');
	$hmb_mnu.click(function(e) {
	if($(this).hasClass('is-active')) {
      		$('html').css("overflow", "hidden");
			$test_span.addClass('fix-menu-span');
		} else {
      		$('html').css("overflow", "auto");
				$test_span.removeClass('fix-menu-span');
			}
	});
	// end menu fixed
	
	  captionNews();

  if($(window).width()>=768) {
    $('.about-movie video').attr('controls', true);
  }
  if($(window).width()<992 && window.devicePixelRatio >= 2.1){
    $('.contact-for-menu .contact-item:nth-child(2)').css('padding-top', '38px');
  }
  if($(window).width()<768 && window.devicePixelRatio >= 2.1){
    $('.contact-for-menu .contact-item:nth-child(2)').css('padding-top', '34px');
  }
  if($(window).width()<576 && window.devicePixelRatio >= 2.1){
    $('.contact-for-menu .contact-item:nth-child(2)').css('padding-top', '45px');
  }

  $('.cashier-arrow').click( function(){
    if($(this).attr('src') == "img/cashier-arrow-up.png"){
      $(this).attr('src', "img/cashier-arrow-down.png");
      $(this).parent().css('transform', "translateY(0)");
    } else{
      $(this).attr('src', "img/cashier-arrow-up.png");
      $(this).parent().css('transform', "translateY(77%)");
    }
  });
  $('.hamburger-box').on('touchstart', function(e) {
    if($(window).width()<768){
      $(this).find('.hamburger-inner').addClass("mobile-hover");
    }
  });
  $(".hamburger-box").on('touchend', function(e) {
    if($(window).width()<768){
      $(this).find('.hamburger-inner').removeClass("mobile-hover");
    }
  });
	
	$('.hamburger-box').hover(function(e) {
		$(this).find('.hamburger-inner').addClass("mobile-hover");
	}, function() {
		$(this).find('.hamburger-inner').removeClass("mobile-hover");
	});
	
	
	
	/*
	*
	*	CHECK PAYMENT PLACES
	*
	*/
	
	
	var $container_adding_tickets = $('.chosen-seats'),
		$row_seats = $('.hall-seats .seats-row'),
		$hall_seats = $('.hall-seats .seats-row .seat-place'),
		$row_sail = `<div class="payment-info">
						<div class="row">
							<div class="col-12">
									<div class="text-right">
										<div class="payment-lightbox showbox">
												<img src="img/info.png" alt="">
													<div class="lightbox">
														<span>Вы можете оплатить бонусами 1 грн = 1 бонус</span>
															</div>
														</div>
														<span class="price-final">
															450 <span class="uah">грн.</span>
														</span>
													<a href="#" class="buy">Купить</a>
												</div>
											</div>
										</div>
							</div> `;
	
	
	$hall_seats.on('click', function(event) {
			var self = $(this);
			var $currentRow = $(this).closest('.seats-row').data('row');
			var $currentPlace = $(this).data('place');
			var $currentPrice = $(this).data('price');
			var $seat_rows = `<div class="seat-row-gought" id="${$currentPlace}">
								<div class="row">
									<div class="col-3">
										<span class="chosen-row">Ряд <span class="row-n row-line">${$currentRow}</span></span>
									</div>
									<div class="col-4">
										<span class="chosen-row">Место <span class="row-n place">${$currentPlace}</span></span>
									</div>
									<div class="col-3">
											<span class="chosen-row"><span class="row-n price">${$currentPrice}</span><span class="uah"> грн.</span></span>
									</div>
									<div class="col-2">
										<div class="delete text-right">
											<a href="#" class="delete"><img src="img/delete.png" alt=""></a></div>
										</div>
									</div>
							</div>`;
			if($(this).hasClass('chosen')) {
				$container_adding_tickets.addClass('seats-filled db-payment').find('h4').remove();
				$container_adding_tickets.append($seat_rows);
				$('.chosen-seats.seats-filled .seat-row-gought a.delete').click(function() {
					$(this).closest('.seat-row-gought').remove();
//					var $tstNum = self.eq($(this).index()).data('place');
//					if($tstNum == self.data('place')) {
//						console.log(true)
//					} 
					
					return false;
				});
			} else {
				var $seat = $(this).data('place');
				console.log($seat);
				$('#'+$seat).remove();
				console.log($container_adding_tickets.children())
//				if(!$.contains($container_adding_tickets, $container_adding_tickets.children()) ) {	
//					$('.chosen-seats').removeClass('seats-filled db-payment').html('<h4>Выберите места</h4>');	
//				}
			}
		
		
			
		
	});
	
	
	/* TABS FOR DATA SLIDER ON PAGE FILM */
	
	var $dataSliderSlide = $('.dates-silder .slick-slide.slick-active'),
		$sessionTimeUl = $('.about-movie .sessions-time'); 
	$dataSliderSlide.eq(0).addClass('today');
	$dataSliderSlide.click(function() {
		$(this).addClass('today').siblings().removeClass('today');
		$sessionTimeUl.removeClass('active').eq($(this).index()).addClass('active');
		return false;
	});
	
	/* TABS FOR DATA SLIDER ON PAGE SHEDULE */
	
	var $sheduleSliderSlides = $('.shedule-wrapper .dates-silder .slick-slide.slick-active'),
		$posterSlider = $('.availible-shedule .soon .slider-soon-wrapper');
	
	$sheduleSliderSlides.click(function() {
		$(this).addClass('active-tab-slide').siblings().removeClass('active-tab-slide');
		$posterSlider.removeClass('active').eq($(this).index()).addClass('active');
		return false;
	});
	
	
	/*
	*	SUPPORT FF
	*
	*/
	
	$('.scroll-pane').jScrollPane();
	
	
	var check_browser = browser();
	if(check_browser === 'Firefox') {
		var vids = $(".about-movie .video video"); 
		$.each(vids, function(){
	       this.controls = false; 
		}); 
	}
	
	/* CUSTOM PLAYER */
	var video_ff = $(".about-movie.vip-movie .video video").get(0),  
		muteButton = $(".mute"), 
		mutedButton = $(".muted"), 
		fullScreenButton = $("#video-controls .full-screen"), 
		seekBar = $(".seek-bar"), 
		volumeBar = $(".volume-bar");


	// Event listener for the full-screen button
	fullScreenButton.click( function() {
		goFullScreen(video_ff);
	});
	
	muteButton.click(function() {
		if(video_ff.muted == false) {
			video_ff.muted = true;
			$(this).hide();
			mutedButton.show();
		} else {
			reverseMute();
		} 
	});
	
	mutedButton.click(function() {
		if(video_ff.muted == true) {
			video_ff.muted = false;	
			$(this).hide();
			muteButton.show();
		}
	});
	
//	$(".current-film").click(function() {
//		var currentTrailer = $(this).parent().find("video");
//		var video_row = ('#video-controls');
//		video_row.toggleClass('reverse-opacity');
//  	});

	seekBar.on('change', function() {
		var time = video_ff.duration * ($(this).val() / 100);
		video_ff.currentTime = time;
	});
	
	$(".about-movie.vip-movie .video video").on('timeupdate', function() {
		var value = (100 / video_ff.duration) * video_ff.currentTime;
		seekBar.val(value);
	});

  // $(".about-movie .play-button.current-film").click(function(){
  //   player.playVideo();
  // });
});

  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  var player;

  function onYouTubeIframeAPIReady() {
    player = new YT.Player('film-video-frame', {
      videoId: $('#film-video-frame').attr("title"),
      playerVars: { 'controls': 0, 'showinfo': 0, 'modestbranding': 1, 'rel': 0, 'playsinline': 1 }
    });
  }

// helper function's

function captionNews() {
	  if( $(window).width() > 575 ) {
      var newsItem = $(".bottom-section-news .news-block h1");
      newsItem.each(function(index){
        newsItem.eq(index).css("bottom", newsItem.eq(index).parent().parent().find("p")[0].clientHeight);
    });
    }
}


function goFullScreen(element) {
  var el = element,
      rfs = el.requestFullScreen
        || el.webkitRequestFullScreen
        || el.mozRequestFullScreen
        || el.msRequestFullscreen;

  rfs.call(el);
}


var browser = function() {
		// Return cached result if avalible, else get result then cache it.
		if (browser.prototype._cachedResult)
			return browser.prototype._cachedResult;

		// Opera 8.0+
		var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

		// Firefox 1.0+
		var isFirefox = typeof InstallTrigger !== 'undefined';

		// Safari 3.0+ "[object HTMLElementConstructor]" 
		var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);

		// Internet Explorer 6-11
		var isIE = /*@cc_on!@*/false || !!document.documentMode;

		// Edge 20+
		var isEdge = !isIE && !!window.StyleMedia;

		// Chrome 1+
		var isChrome = !!window.chrome && !!window.chrome.webstore;

		// Blink engine detection
		var isBlink = (isChrome || isOpera) && !!window.CSS;

		return browser.prototype._cachedResult =
			isOpera ? 'Opera' :
			isFirefox ? 'Firefox' :
			isSafari ? 'Safari' :
			isChrome ? 'Chrome' :
			isIE ? 'IE' :
			isEdge ? 'Edge' :
			isBlink ? 'Blink' :
			"Don't know";
};

// end helper function's