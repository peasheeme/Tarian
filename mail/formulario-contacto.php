<?php
	//revisar que los campos no estén vacíos
	if(empty($_POST['c_name']) ||
		empty($_POST['c_phone']) ||
		empty($_POST['c_email']) ||
		empty($_POST['c_message']) ||
		!filter_var($_POST['c_email'], FILTER_VALIDATE_EMAIL)	
	){
		echo "<script>alert('Favor de llenar todos los campos');</script>";
		echo "<script>window.location.href='#';</script>";
	}else{
		$nombre=htmlspecialchars($_POST['c_name']);
		$telefono=htmlspecialchars($_POST['c_phone']);
		$correo=htmlspecialchars($_POST['c_email']);
		$mensaje=htmlspecialchars($_POST['c_message']);

		//destinatario
		$destino="perla.holguin@3e-digital.com";

		//asunto
		$asunto="Nuevo mensaje de '.$nombre.' desde el sitio web";

		//cabeceras
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		//contenido del mensaje
		$contenido = '
			<html>
			<head></head>
			<body>
				<p> <strong> '.$nombre.'ha enviado el siguiente mensaje a través del sitio web https://# </strong> </p>
				<br>
				<p>'.$mensaje.'</p>
				<br>
				
				<p> Contacta a '.$nombre.' al correo  '.$correo.' o al teléfono '.$telefono.'</p> 
			</body>
			</html>
		';

		//envío de correo electrónico
		$envio = mail($destino, $asunto, $contenido, $headers);

		if($envio){
			echo "<script>alert('datos enviados exitosamente, Redireccionando');</script>";
			//Enviando autorespuesta
			$pwf_header = "perla.holguin@3e-digital.com\n"
			."Reply-to: perla.holguin@3e-digital.com \n";
			$pwf_asunto = "Foro Marketing Confirmación";
			$pwf_dirigido_a = "$correo";
			$pwf_mensaje = "$nombre Gracias por dejarnos su mensaje desde nuestro sitio web \n"
			."Su mensaje ha sido recibido satisfactoriamente.\n"
			."Nos pondremos en contacto lo antes posible a su e-mail: $correo o su telefono $telefono \n"
			."\n"
			."\n"
			."-----------------------------------------------------------------"
			."Favor de NO responder este e-mail ya que es generado Automaticamente.\n"
			."Atte: RNB S.A. de C.V. \n";
			
			@mail($pwf_dirigido_a, $pwf_asunto, $pwf_mensaje, $pwf_header);
			echo "<script>window.location.href='https://#';</script>";
		}else{
			echo "<script>alert('Intentelo de nuevo en unos momentos, Redireccionando');</script>";
			echo "<script>window.location.href='https://#';</script>";
		}
	}
?>