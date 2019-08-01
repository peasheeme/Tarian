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

/**
 * OWL carousel
 * 
 */

$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        items : 2,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,4],
        itemsTablet: [768,2],
        itemsTabletSmall: false,
        itemsMobile : [479,2],
        singleItem : false,

        // Navigation
        navigation : true,
        navigationText : ["prev","next"],
        rewindNav : true,
        scrollPerPage : false,

        //Pagination
        pagination : true,
        paginationNumbers: false
    });
});



/**
 * Validación de formularios con AJAX
 */

$(function(){
	$('#btn-ajax').click(function () { 
	   var url = 'mail/formulario-contacto.php';

	   $.ajax({
		   type: "POST",
		   url: url,
		   data: $('#contact-form').serialize(),
		   success: function (data) {
			   $('#nombre-status').html('');
			   $('#telefono-status').html('');
			   $('#email-status').html('');
			   $('#mensaje-status').html('');
			   $('#terms-status').html('');
			   $('#mensajeErr-Status').html(data);//muestra los datos del script de PHP
		   }
	   });

	   return false;
	});

	$('#btn-ajax2').click(function () { 
        var url = 'mail/formulario-contacto.php';

        $.ajax({
            type: "POST",
            url: url,
            data: $('#contact-form2').serialize(),
            success: function (data) {
                $('#nombre-status2').html('');
                $('#telefono-status2').html('');
                $('#email-status2').html('');
                $('#mensaje-status2').html('');
                $('#terms-status2').html('');
                $('#mensajeErr-Status2').html(data);//muestra los datos del script de PHP
            }
        });

        return false;
     });
});
