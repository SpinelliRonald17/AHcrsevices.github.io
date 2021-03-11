$(document).ready(function() {

	$('#pass2').keyup(function() {

		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if ( pass1 == pass2 ) {
			$('#errorletras2').text("Coinciden.").css("color","green");
			$('#error2').css("background", "url(assets/imagenes/check.png)");
			
		} else {
			$('#errorletras2').text("Direfentes.").css("color","red");
			$('#error2').css("background", "url(assets/imagenes/check-.png)");
		}

	});

});
