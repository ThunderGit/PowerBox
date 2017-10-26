jQuery(document).ready(function($) {
// Header animation
	function showHeader() {
		$('.header-background').fadeTo(1, $(document).scrollTop()/100);
		if ($(this).scrollTop() >= 50) {
			$('.logo').css('background-color', '#000000');
			$('nav>li>a').css('color', '#000000');
			$('.hamburger-icon span').css('background-color', '#000000');
			$('.mobile-menu').css('background-color', '#ffffff');
		}
	}
	showHeader();

	$(document).on('scroll', function() {
		showHeader();
		if ($(this).scrollTop() < 50) {
			$('.logo').css('background-color', '#ffffff');
			$('nav>li>a').css('color', '#ffffff');
			$('.hamburger-icon span').css('background-color', '#ffffff');
			$('.mobile-menu').css('background-color', '#000000');
		}
		animateAllNumbers();
	})
// Hamburger button
	var mobileMenu = false;
	function showMobileMenu() {
		$('.hamburger-icon').addClass('open');
		$('.mobile-menu').fadeToggle('fast');
		$('body').toggleClass('noScroll');
		mobileMenu = true;
	}
	function hideMobileMenu() {
		$('.hamburger-icon').removeClass('open');
		$('.mobile-menu').fadeOut('fast');
		$('body').toggleClass('noScroll');
		mobileMenu = false;
	}
	$('.hamburger-icon').on('click', function(){
		if (!mobileMenu) {
			showMobileMenu();
		} else if (mobileMenu) {
			hideMobileMenu();
		}
	});
	$(window).on('resize', function() {
		if (mobileMenu) { hideMobileMenu(); }
	})
// Links
	$('a[href^="#"]').not('[href="#"]').on('click', function(event) {
		event.preventDefault();
		if (mobileMenu) { hideMobileMenu(); }
		var $target = $(this.hash);
		$('body').animate({
			scrollTop: $target.offset().top-50
		})
	});
// Numbers animation
	var numbersAnimated = false;
	function animateNumbers(element, value) {
		$({number: 0}).stop(true).animate(
	      {number: value},
	      {
	        duration : 2000,
	        easing: "easeOutExpo",
	        step: function () {
	            var numberVal = Math.round(this.number);
	            
	            $(element).text(numberVal);
	        }
		})
	};
	function animateAllNumbers() {
		if ($(document).scrollTop() >= 525 && !numbersAnimated) {
			animateNumbers('.projects-value', 548);
			animateNumbers('.hours-value', 1465);
			animateNumbers('.feedback-value', 612);
			animateNumbers('.clients-value', 735);
			numbersAnimated = true;
		}
	}
	animateAllNumbers();
// Form
	$.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please, check your data"
    );

    $('form').validate({
    	rules: {
            firstName: {
                required: true,
                regex: "^[A-z-]+$"
            },
            email: {
                required: true,
                regex: "^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$"
            },
            title: {
            	required: true,
                maxlength: 100
            },
            comment: {
            	required: true,
                maxlength: 1000
            }
        },
        errorPlacement: function(error, element) {

        }
        //,
        // submitHandler: function(form) {
        //     var $submitButton = $(form).find(':submit');
        //     $submitButton.prop('disabled', true);
        //     $submitButton.val('Sending...');
        //     var data = $(form).serialize();
        //     $.ajax({
        //         url: 'server.php',
        //         data: data,
        //         success: function(response) {
        //             response = jQuery.parseJSON(response);
        //             showErrors(response);
        //             $submitButton.prop('disabled', false);
        //             $submitButton.val('Send message');
        //         },
        //         method: 'post'
        //     });
        // }
    });

    function showErrors(response) {
    	if (!response.errors) {
    		alert(response.message);
    	} else {
    		alert("ERRORS");
    	}
    }
 // Clients Flickity
	var $clientsCarousel = $('.clients').flickity();
	$clientsCarousel.flickity('playPlayer');
// Gallery
	function moveToSelected(element) {

	  if (element == "next") {
	    var selected = $(".selected").next();
	  } else if (element == "prev") {
	    var selected = $(".selected").prev();
	  } else {
	    var selected = element;
	  }

	  var next = $(selected).next();
	  var prev = $(selected).prev();
	  var prevSecond = $(prev).prev();
	  var nextSecond = $(next).next();

	  $(selected).removeClass().addClass("selected");

	  $(prev).removeClass().addClass("prev");
	  $(next).removeClass().addClass("next");

	  $(nextSecond).removeClass().addClass("nextRightSecond");
	  $(prevSecond).removeClass().addClass("prevLeftSecond");

	  $(nextSecond).nextAll().removeClass().addClass('hideRight');
	  $(prevSecond).prevAll().removeClass().addClass('hideLeft');

	}
	// Eventos teclado
	$(document).keydown(function(e) {
	    switch(e.which) {
	        case 37: // left
	        moveToSelected('prev');
	        break;

	        case 39: // right
	        moveToSelected('next');
	        break;

	        default: return;
	    }
	    e.preventDefault();
	});

	$('#carousel div').click(function() {
	  moveToSelected($(this));
	});

	$('#prev').click(function() {
	  moveToSelected('prev');
	});

	$('#next').click(function() {
	  moveToSelected('next');
	});
});