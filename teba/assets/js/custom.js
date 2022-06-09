/* ------------------------------------- */
/*  TABLE OF CONTENTS
/* ------------------------------------- */
/*   Preloader                           */
/*   WOW                                 */
/*   Menu                                */
/*   progress bars                       */
/*   counter                             */
/*   owl-carousel                        */
/*   isotope                             */
/*   pricing table                       */
/*   Lightbox popup  
 */
(function ($) {
 "use strict";
	/* ===========================
	 Preloader
	============================*/
	$(window).load(function () {
		$(".main-content").addClass("before-loading"), setTimeout(function() {
			$(".loading-wrap").addClass("loaded")
		}, 2600), setTimeout(function() {
			$("#loading").addClass("loaded")
		}, 2800), setTimeout(function() {
			$(".main-content").removeClass("before-loading").addClass("loaded")
		}, 3200), setTimeout(function() {
			$("#loading").remove()
		}, 3600)
	}); 
	/* ===========================
		cursor
	============================*/
	jQuery('.mouse-cursor.style1, .mouse-cursor.style2, .mouse-cursor.style3').each(function() {
		var $this = jQuery(this);
		jQuery('body').addClass('cursor-disabled');
		jQuery(window).on('mousemove', function(event) {
			$this.css({
				'top' : event.pageY + 'px',
				'left' : event.pageX + 'px'
			});
		});
	});
	$("a, .button, .owl-prev, .owl-next").hover(function(){
        $(".mouse-cursor").toggleClass("bigCursor");
    });
	$(".footer_v1, .footer_v2, .bg-dark, .bg-color-main, .page-404").hover(function(){
        $(".mouse-cursor").toggleClass("whiteCursor");
    });
	/* ------------------------------------- */
	/*   Image animation
	/* ------------------------------------- */
	VanillaTilt.init(document.querySelectorAll(".img-perspective"), {
		max: 15,
		speed: 400,   
		perspective: 600,  
        scale: 1.08, 
	});
	VanillaTilt.init(document.querySelectorAll(".image-box-style5"), {
		max: 10,
		speed: 300,   
		perspective: 1000,  
        scale: 1, 
	});
    /* ------------------------------------- */
    /*   Menu
    /* ------------------------------------- */
	  //Close responsive nav
	  $('#navigation li a').on('click', function() {
		if ($(window).width() < 768) {
		  $('.navbar-toggle').on();
		}
	  });
	 //mo-header-v1 (menu-toggle open )
	  $('.menu-toggle , #menu-close, .sidepanel-left .menu-item a').on('click', function(event) {
		$('.sidepanel').toggleClass('open');
		$('body').toggleClass('sidepanel-open');
	  });
	  //close nav-header-v1
	  $('.onepage-nav a').on(function(event) {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top
			}, 700);
		  }
		}    
		setTimeout(function(e){      
		  $('.menu-toggle').trigger('click');
		}, 700)
		return false;
	  }); 
	  $('.sidepanel-overlay').on('click',function(){
			$('.sidepanel').removeClass('open');
		    $('body').removeClass('sidepanel-open');
	  });
	  //mo-header-v3
	  $('.nav-menu-icon a').on('click',function(){var $nav=$('nav');if($nav.hasClass('slide-menu')){$nav.removeClass('slide-menu');$(this).removeClass('active');$('.navigation').css({'overflow':'hidden'});}else{$nav.addClass('slide-menu');$(this).addClass('active');setTimeout(function(){$('.navigation').css({'overflow':'initial'});},500);}
	 return false;});  
	  
	  // Smooth scroll function 
	  $(document).on('click', '.menu-item a , .smooth-scroll a, .one-page-scroll ', function (e) {
        if ($(e.target).is('a[href*="#"]:not([href="#"]')) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        }
    });
	
	// Open the hide menu
	function TebaOpenTheHideMenu() {
		if ($('.mo-header-v3 .mo-toggle-menu').length) {
			$('.mo-header-v3 .mo-toggle-menu').on('click', function() {
				var $menu = $('#mo_header .mo-menu-list');

				$(this).toggleClass('active');
				$menu.toggleClass('active');

				$menu.on( {
					'menu.open': function( e ) {
						var $li_items = $( this ).find( '> ul > li' );
						$li_items.each( function() {
							var index = $( this ).index();
							btAnimation.slideUp( this, index * 80 );
						} )
					},
					'menu.hidden': function( e ) {
						var $li_items = $( this ).find( '> ul > li' );
						$li_items.each( function() {
							var index = $( this ).index();
							btAnimation.slideDown( this, index * 80 );
						} )
					}
				} )

				if( $menu.hasClass('active') )
					$menu.trigger( 'menu.open' )
				else
					$menu.trigger( 'menu.hidden' )
			});
		}
	}
	TebaOpenTheHideMenu();
	
	/* search-trigger(wide) */ 
	if ( jQuery('.search-trigger').length ) {
		jQuery('.search-trigger').on('click',function(){
			jQuery('body').toggleClass('search-is-opened');
		});
		jQuery('.main-search-overlay , .main-search-close').on('click',function(){
			jQuery('body').removeClass('search-is-opened');
		});
     }

	/* Open the hide mini search(box) */
	function TebaOpenMiniSearchSidebar() {
		$('.box-search > a').on('click', function() {
			$(this).toggleClass('active');
			$('.mo-cart-header > a.mo-icon').removeClass('active');
			$('.mo-header-menu .header_search').toggle();
			$('.mo-cart-content').hide();
		});
	}
	TebaOpenMiniSearchSidebar();

	function TebaOpenMiniCartSidebar() {
			$('.mo-cart-header > a.mo-icon').on('click', function() {
				$(this).toggleClass('active');
				$('.mo-search-sidebar > a').removeClass('active');
				//$('.mo-cart-content').toggle();
				
				$('.mo-cart-content').toggleClass('active');
				
				$('.header_search').hide();
			});
		}
	TebaOpenMiniCartSidebar();

	/* Open the hide menu */
	function TebaOpenMenu() {
		$('#mo-header-icon').on('click', function() {
			$(this).toggleClass('active');
			$('.mo-menu-list').toggleClass('hidden-xs');
			$('.mo-menu-list').toggleClass('hidden-sm');
		});
	}
	TebaOpenMenu();
	/* Mobile Menu Dropdown Icon Header */
	function TebaMobileMenuDropdown() {
		var hasChildren = $('.mo-sidepanel .mo-menu-list ul li.menu-item-has-children, .mo-header-v2 .mo-menu-list ul li.menu-item-has-children, .mo-header-v3 .mo-menu-list ul li.menu-item-has-children , .mo-header-v4 .mo-menu-list ul li.menu-item-has-children, .mo-header-v5 .mo-menu-list ul li.menu-item-has-children , .mo-header-v6 .mo-menu-list ul li.menu-item-has-children, .mo-header-v7 .mo-menu-list ul li.menu-item-has-children');
		hasChildren.each( function() {
			var $btnToggle = $('<a class="mb-dropdown-icon hidden-lg hidden-md" href="#"></a>');
			$( this ).append($btnToggle);
			$btnToggle.on( 'click', function(e) {
				e.preventDefault();
				$( this ).toggleClass('open');
				$( this ).parent().children('ul').toggle('slow');
			} );
		} );
	}
    TebaMobileMenuDropdown();

	/* large media Menu children Icon Header  */
	function TebaMenuDropdown() {
		var hasChildren = $('.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children, .mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children, .mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children');
		hasChildren.each( function() {
			var $btnToggle = $('<span class="l-dropdown-icon"></span>');
			$( this ).append($btnToggle);
		} );
	}
    TebaMenuDropdown();
	
	/* Menu Dropdown Icon Header Canvas, Header Canvas Border */
	function TebaLeftNavigationDropdown() {
		var hasChildren = $('.mo-left-navigation .mo-menu-list ul li.menu-item-has-children, .menu-sidepanel ul li.menu-item-has-children');
		hasChildren.each( function() {
			var $btnToggle = $('<a class="mb-dropdown-icon" href="#"></a>');
			$( this ).append($btnToggle);
			$btnToggle.on( 'click', function(e) {
				e.preventDefault();
				$( this ).toggleClass('open');
				$( this ).parent().children('ul').toggle('slow');
			} );
		} );
	}
	TebaLeftNavigationDropdown();
	/* Header Stick */
	function TebaHeaderStick() {
		if($( '.mo-sidepanel, .mo-header-v2, .mo-header-v3, .mo-header-v4, .mo-header-v5, .mo-header-v6, .mo-header-v7 ' ).hasClass( 'mo-header-stick' )) {
			var header_offset = $('#mo_header .mo-header-menu').offset();

			if ($(window).scrollTop() > header_offset.top) {
				$('body').addClass('mo-stick-active');
			} else {
				$('body').removeClass('mo-stick-active');
			}
			$(window).on('scroll', function() {
				if ($(window).scrollTop() > header_offset.top) {
					$('body').addClass('mo-stick-active');
				} else {
					$('body').removeClass('mo-stick-active');
				}
			});

			$(window).on('load', function() {
				if ($(window).scrollTop() > header_offset.top) {
					$('body').addClass('mo-stick-active');
				} else {
					$('body').removeClass('mo-stick-active');
				}
			});
			$(window).on('resize', function() {
				if ($(window).scrollTop() > header_offset.top) {
					$('body').addClass('mo-stick-active');
				} else {
					$('body').removeClass('mo-stick-active');
				}
			});
		}
	}
	TebaHeaderStick();
	
    $(document).ready(function () {
	// scroll-pane 
	$(function(){
		$('.scroll-pane').jScrollPane();
	});
	/* ------------------------------------- */
	/*  counter
	/* ------------------------------------- */
    $('.counter').counterUp({
		delay: 10,
		time: 2000
	});
	/* ------------------------------------- */
	/*  accordionjs
	/* ------------------------------------- */
	$(".accordionjs").accordionjs();
	 /* ------------------------------------- */
	 /*  owl-carousel
	 /* ------------------------------------- */
	 /*OWL Carousel*/
	function TebathemesOwlCaousel($elem) {
		$elem.owlCarousel({
			items:$elem.data( "col_lg" ),
			margin:$elem.data( "item_space" ),
			loop:$elem.data( "loop" ),
			autoplay: $elem.data( "autoplay" ),
			smartSpeed: $elem.data( "smartspeed" ),
			dots:$elem.data( "dots" ),
			nav:$elem.data( "nav" ),
			navText: ["<span class='prev'><i class='fa fa-angle-left'></i></span>","<span class='next'><i class='fa fa-angle-right'></i></span>"],
			responsive:{
				0:{
					items:$elem.data( "col_xs" ),
					nav:false,
					dots:false,
				},
				768:{
					items:$elem.data( "col_sm" ),
					nav:false,
					dots:false,
				},
				992:{
					items:$elem.data( "col_md" ),
				},
				1200:{
					items:$elem.data( "col_lg" ),
				}
			}
		});
	}
	function TebaTestimonialOwlCaousel($elem) {
		$elem.owlCarousel({
			center: true,
			items:$elem.data( "col_lg" ),
			margin:$elem.data( "item_space" ),
			loop:$elem.data( "loop" ),
			autoplay: $elem.data( "autoplay" ),
			smartSpeed: $elem.data( "smartspeed" ),
			dots:$elem.data( "dots" ),
			nav:$elem.data( "nav" ),
			navText: ["<span class='prev'><i class='fa fa-angle-left'></i></span>","<span class='next'><i class='fa fa-angle-right'></i></span>"],
			responsive:{
				0:{
					items:$elem.data( "col_xs" ),
					nav:false,
					dots:false,
				},
				768:{
					items:$elem.data( "col_sm" ),
					nav:false,
					dots:false,
				},
				992:{
					items:$elem.data( "col_md" ),
				},
				1200:{
					items:$elem.data( "col_lg" ),
				}
			}
		});
	}
	/* Active carousel */
	if ($('.owl-carousel').length) {
		$('.owl-carousel').each(function() {
			new TebathemesOwlCaousel($( this ));
		});
	}
	/* Active testimonial carousel */
	if ($('.testimonial-carousel').length) {
		$('.testimonial-carousel').each(function() {
			new TebaTestimonialOwlCaousel($( this ));
		});
	}
	/* Active images carousel */
	if ($('.image-carousel').length) {
		$('.image-carousel').each(function() {
			new TebathemesOwlCaousel($( this ));
		});
	}
	/*  post carousel */
	$(".carousel-post").owlCarousel({
		dots: true,
		items: 1,
		autoplay: false,
	});

	$(".search-submit").after('<i class="fa fa-search"></i>');
	/* ------------------------------------- */
	/*   portfolio-filter
	 /* ------------------------------------- */
	// filter items on button click
	$('.portfolio-filter').on('click', 'a', function(e) {
		e.preventDefault();
		var filterValue = $(this).attr('data-filter');
		$container.isotope({
			filter: filterValue
		});
		$('.portfolio-filter a').removeClass('active');
		$(this).closest('a').addClass('active');
	});
   // init Isotope
   var $container = $('.masonry');
   $container.imagesLoaded(function() {
	  $container.isotope({
		 itemSelector: '.masonry-item',
		 layoutMode: 'masonry',
		 percentPosition: true,
		 masonry: {
			columnWidth: '.masonry-img',
			horizontalOrder: false
		 }
	  });
   });
   // masonry post
	 $('.masonry-posts').isotope({
	  itemSelector: '.masonry-post',
	  masonry: {
		  horizontalOrder: false
	  }
	}); 
	/* ------------------------------------- */
	/*   pricing table
	/* ------------------------------------- */
	$('.pricing').waypoint(function () {
		$('.pricing-best').addClass('depth');
	});
		
	$(".pricing-item").on("mouseenter",function(){
		$(this).closest(".vc_row .vc_inner").find(".pricing-item").removeClass("active"),$(this).addClass("active");
	});
	/* ------------------------------------- */
	/*  Lightbox popup
	/* ------------------------------------- */
	jQuery('.lightbox-gallery').each(function() {
		jQuery(this).magnificPopup({
			type:'image',
			image: {
				titleSrc: 'title',
				verticalFit: true
			},
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1]
			},
		});
	});
	jQuery('.lightbox-video').each(function() {
		jQuery(this).magnificPopup({
		   type:'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			iframe: {
				patterns: {
					youtube: {
						index: 'youtube.com/',
						id: 'v=',
						src: 'https://www.youtube.com/embed/%id%?autoplay=1'
					},
					youtube_short: {
					  index: 'youtu.be/',
					  id: 'youtu.be/',
					  src: '//www.youtube.com/embed/%id%?autoplay=1'
					},
					vimeo: {
					  index: 'vimeo.com/',
					  id: '/',
					  src: '//player.vimeo.com/video/%id%?autoplay=1'
					}
				}
			}
		});
	});
	/* ------------------------------------- */
	/*   stickem sticky
	/* ------------------------------------- */
	$('body').stickem({
		item:'.sticky-buttons',
		container:'.mo-blog',
		stickClass:'is-sticky',
		endStickClass:'is-bottom',
		offset:90,
	});
  /* ------------------------------------- */
  /*  fixed footer
  /* ------------------------------------- */
  var footerFixed = $('.footer-fixed').outerHeight();
  if($(document).width() > 991) {
	$('.main-content').css('margin-bottom',footerFixed);
  }
   /* ------------------------------------- */
  /*  BacktoTop
  /* ------------------------------------- */
	var offset = 300,
	offset_opacity = 1200,
	scroll_top_duration = 700,
	$back_to_top = $('#back-to-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
			}, scroll_top_duration
		);
	});
/* ------------------------------------- */
/*  BacktoTop SVG animation
/* ------------------------------------- */
	var progressPath = document.querySelector('.progress path');
	var pathLength = progressPath.getTotalLength();
	progressPath.style.transition = progressPath.style.WebkitTransition =
	'none';
	progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
	progressPath.style.strokeDashoffset = pathLength;
	progressPath.getBoundingClientRect();
	progressPath.style.transition = progressPath.style.WebkitTransition =
	'stroke-dashoffset 300ms linear';

	var updateProgress = function () {
	var scroll = $(window).scrollTop();
	var height = $(document).height() - $(window).height();
	var percent = Math.round(scroll * 100 / height);
	var progress = pathLength - (scroll * pathLength / height);
	progressPath.style.strokeDashoffset = progress;
	$('.percent').text(percent+"%");
	};

	updateProgress();
	$(window).scroll(updateProgress);
  /* ------------------------------------- */
  /*  woocommerce
  /* ------------------------------------- */
	/* Add Product Quantity Up Down icon */
	$('form.cart .quantity, .product-quantity .quantity').each(function() {
		$(this).prepend('<span class="qty-minus"><i class="fa fa-minus"></i></span>');
		$(this).append('<span class="qty-plus"><i class="fa fa-plus"></i></span>');
	});
	/* Plus Qty */
	$(document).on('click', '.qty-plus', function() {
		var parent = $(this).parent();
		$('input.qty', parent).val( parseInt($('input.qty', parent).val()) + 1);
	})
	/* Minus Qty */
	$(document).on('click', '.qty-minus', function() {
		var parent = $(this).parent();
		if( parseInt($('input.qty', parent).val()) > 1) {
			$('input.qty', parent).val( parseInt($('input.qty', parent).val()) - 1);
		}
	})

	/* Single image gallery */
	if($('.mo-slick-slider').length > 0) {
		$('.mo-slick-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
			fade: true,
			asNavFor: '.mo-slick-slider-nav'
		});
	}
	if($('.mo-slick-slider-nav').length > 0) {
		$('.mo-slick-slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: false,
			asNavFor: '.mo-slick-slider',
			centerMode: true,
			focusOnSelect: true
		});
	}
  });
})(jQuery);