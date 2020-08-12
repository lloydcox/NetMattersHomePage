// Scripts

// Carousel Scripts

$(document).ready(function () {
    $('.banner-carousel').slick({
      autoplay: false,
      arrows: false,
      dots: true,
      infinite: true,
      speed: 1500,
      fade: true,
      cssEase: 'linear'
    });

// Cookie Scripts

if($('.cookie-banner').length) {
    $('.cookie-banner').slideDown(800);
}

 

// Side Menu scripts

var	menuRight = document.getElementById( 'cbp-spmenu-s2' ),
    showRightPush = document.getElementById( 'showRightPush' ),
    body = document.body;

showRightPush.onclick = function() {
	classie.toggle( this, 'active' );
	classie.toggle( body, 'cbp-spmenu-push-toleft' );
	classie.toggle( menuRight, 'cbp-spmenu-open' );
	disableOther( 'showRightPush' );
};

function disableOther( button ) {

	if( button !== 'showRightPush' ) {
		classie.toggle( showRightPush, 'disabled' );
	}
}


});

