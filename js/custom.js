var nav = document.getElementById('main-nav');
nav.addEventListener('click', function(){
    'use strict';
    nav.classList.toggle('to-show');
});

/**botón ir arriba */
$(document).ready(function(){
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0',
		}, 300)
	});

	$(window).scroll(function(){
		if($(this).scrollTop()>0){
			$('.ir-arriba').slideDown(100);
		}else{
			$('.ir-arriba').slideUp(100);
		}
	});
});
