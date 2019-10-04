/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {

        window.onload = function() {
          var scroll = $(window).scrollTop();
          if (scroll === 0) {
            $('.navbar').addClass('at-rest');
          }
        };

        $(window).scroll(function() {
          var scroll = $(window).scrollTop();

          if (scroll === 0) {
            $('.navbar').addClass('at-rest');
          } else {
            $('.navbar').removeClass('at-rest');
          }
        });

        /**
		* Gets a measurement of the viewport that meshes with what is used by CSS
		* media queries.
		*
		* Webkit browsers overlay the scrollbar on the window, while Gecko
		* browsers put the scrollbar beside. Both of these behaviors are slightly
		* different than what is used by CSS media queries...
		*/
		function viewport() {
			var
			e = window,
			a = "inner";
			if (!(window.hasOwnProperty("innerWidth"))) {
				a = "client";
				e = document.documentElement || document.body;
			}
			return {width: e[a + "Width"], height: e[a + "Height"]};
		}
		$windowWidth = viewport().width;

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

      }
    },
    // Home page
    'home': {
      init: function() {

        var navHeight = 75;

        $('.home-slides').slick({
          dots: true,
          infinite: true,
          speed: 500,
          fade: true,
          autoplay: true,
          autoplaySpeed: 4000,
          cssEase: 'linear'
        });

        $('.application-slides').slick({
          dots: false,
          arrows: false,
          infinite: true,
          speed: 500,
          fade: true,
          autoplay: true,
          autoplaySpeed: 4000,
          cssEase: 'linear'
        });

        $('.qa-slides').slick({
          dots: false,
          infinite: true,
          cssEase: 'linear',
          prevArrow: '<span class="prev"><img src="/wp-content/themes/enplast/dist/images/left-arrow-2x.png" width="11" height ="20" alt="Left Arrow, Previous Slide"/></span>',
          nextArrow: '<span class="next"><img src="/wp-content/themes/enplast/dist/images/right-arrow-2x.png" width="11" height ="20" alt="Right Arrow, Next Slide"/></span>'
        });

		$('.dot').hover( function() {
			$(this).tooltip('show');
		}, function() {
			$(this).tooltip('show');
		});

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
        if ( $(window).width() >= 768 ) {
			console.log($windowWidth);
			// Vimeo vids (swap then play) Requires vimeo api include in setup.php
	        $('.vid-thumb .video-container').on('click', function() {
		       var vid = $(this).html();
		       $('.video-current .video-container').html(vid);
		       var iframe = $('.video-current .video-container iframe');
			   var player = new Vimeo.Player(iframe);
			   player.play();
	        });
	    }

      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  /* IG Feed styling */
  $(window).on('sbiafterimagesloaded', function (event) {
    $feedEl = event.el;

    // do things with main plugin div as $feedEl
    $('.ig-feed').find('.sbi_item').each(function(){

		  /* Generate / Style Title */
		  var str1 = $(this).find('.sbi_caption').html();
		  var callout = str1.replace(/(([^\s]+\s\s*){3})(.*)/,"<span class='ig-title'>$1...</span>");
		  if ( $(this).find('.ig-title').length ) {
			  $(this).find('.sbi_caption').html(str1);
		  } else {
		  	$(this).find('.sbi_caption').html(callout + str1);
		  }

		  /* Get Date */
		  if ( $(this).find('.sbi_caption > .sbi_date').length === 0 ) {
			  //$y = ", " + new Date().getFullYear();
			  $(this).find('.sbi_date > svg').remove();
			  //$(this).find('.sbi_date').append($y);
			  $d = $(this).find('.sbi_date').html();
			  $(this).find('.sbi_caption').prepend( "<span class='sbi_date'>" + $d + "</span>" );
		  }

	  	  /* Link Title */
	  	  $ig_link = $(this).find('a.sbi_photo').attr('href');
	  	  if ( $(this).find('.ig-link').length === 0 ) {
	  	  	$(this).find('.ig-title').contents().wrap("<a href='" + $ig_link + "' class='ig-link' target='_blank'></a>");
	  	  	$(this).find('.sbi_meta').contents().wrap("<a href='" + $ig_link + "' class='ig-link' target='_blank'></a>");
	  	  }
	  });
  });


})(jQuery); // Fully reference jQuery after this point.
