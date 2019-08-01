<?php
	error_reporting(0);
	$msjStatus = null;

	//valido si existe el botón ajax
	if(isset($_POST['ajax'])){

		//recojo los campos del formuario
		$name = htmlspecialchars($_POST['c_name']);
		$phone = htmlspecialchars($_POST['c_phone']);
		$email = htmlspecialchars($_POST['c_email']);
		$message = htmlspecialchars($_POST['c_message']);

		//Valido el campo nombre
		if($name == ""){
			$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'el campo está vacío';</script>";
		}
		elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $name)){
			$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'No se admiten n&uacute;meros en este campo';</script>";
		}
		elseif(strlen($name)<2){
			$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'mínimo 2 caracteres';</script>";
		}
		elseif(strlen($name)>100){
			$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'M&aacute;ximo 100 caracteres';</script>";
		}

		//Validar campo teléfono
		elseif($phone == ""){
			$msjStatus = "<script>document.getElementById('telefono-status').innerHTML = 'El campo est&aacute vac&iacute;o';</script>";
		}

		elseif(strlen($phone)<2){
			$msjStatus = "<script>document.getElementById('telefono-status').innerHTML = 'M&iacute;nimo 2 d&iacute;gitos';</script>";
		}

		elseif(strlen($phone)>15){
			$msjStatus = "<script>document.getElementById('telefono-status').innerHTML = 'M&aacute;ximo 15 d&iacute;gitos';</script>";
		}

		elseif(!preg_match("/^[0-9]+$/", $phone)){
			$msjStatus = "<script>document.getElementById('telefono-status').innerHTML = 'No se admiten letras en este campo';</script>";
		}

		//validar campo email
		elseif($email == ""){
			$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
		}

		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'Introduce un email v&aacute;lido';</script>";
		}

		elseif(strlen($email)<2){
			$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'mínimo 2 caracteres';</script>";
		}

		elseif(strlen($email)>100){
			$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'M&aacute;ximo 100 caracteres';</script>";
		}

		//Valido el campo mensaje
		elseif($message == ""){
			$msjStatus = "<script>document.getElementById('mensaje-status').innerHTML = 'el campo está vacío';</script>";
		}
		elseif(strlen($message)<2){
			$msjStatus = "<script>document.getElementById('mensaje-status').innerHTML = 'mínimo 2 caracteres';</script>";
		}
		elseif(strlen($message)>500){
			$msjStatus = "<script>document.getElementById('mensaje-status').innerHTML = 'M&aacute;ximo 500 caracteres';</script>";
		}

		//validar los términos y condiciones
		elseif(!isset($_POST['c_terms']) && $_POST['c_terms'] != "on"){
			$msjStatus = "<script>document.getElementById('terms-status').innerHTML = 'Debes aceptar los términos y condiciones';</script>";
		}

		else{
			//a quién será enviado
			$destino = "juan_27angel@hotmail.com";

			//asunto
			$asunto = "Mensaje enviado desde la página web";

			//cabeceras para el envío del mail en formato html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=UTF-8\r\n";

			//contenido del mensaje
			$contenido = '
				<!DOCTYPE html>
				<html lang="es">
				<head></head>
				<body>
					<h2>' . $name . ' ha enviado el siguiente mensaje a través de tu sitio web:</h2>
				
					<p>' . $message . '</p>
			
					<p>Contacta a  <strong>' . $name . '</strong> al correo:  <span style="color:blue;"> ' . $email . '</span> o al teléfono '. $phone .' </p>
					
					<p>Ir a mi sitio web <span style="color:blue">http://tarianasesores.com.mx/</span></p>
				</body>
				</html>
			';

			//envío de mail
			$envio = mail($destino, $asunto, $contenido, $headers);

			if ($envio) {
				echo "Enviado correctamente";

				//enviando autorespuesta
				$pfw_header = "From: abogados@tarianasesores.com.mx"
					. "Reply-To: abogados@tarianasesores.com.mx";
				$pfw_subject = "Mensaje recibido";
				$pfw_email_to = "$email";
				$pfw_message = "Muchas Gracias $name, por su mensaje: $message "
					. "Su mensaje ha sido recibido satisfactoriamente - "
					. "Nos pondremos en contacto contigo lo antes posible en su e-mail: $email "
					. " n"
					. " n"
					. "--------------------------------------------------------------------------n"
					. "Favor de NO responder este E-mail ya que es generado Automáticamente.n";
				@mail($pfw_email_to, $pfw_subject, $pfw_message, $pfw_header);
			} else {
				echo "Falló el envío";			
			}
		}
	}

	echo $msjStatus;



	$msjStatus = null;

	//valido si existe el botón ajax
	if(isset($_POST['ajax2'])){

		//recojo los campos del formuario
		$name = htmlspecialchars($_POST['c_name2']);
		$phone = htmlspecialchars($_POST['c_phone2']);
		$email = htmlspecialchars($_POST['c_email2']);
		$message = htmlspecialchars($_POST['c_message2']);

		//Valido el campo nombre
		if($name == ""){
			$msjStatus = "<script>document.getElementById('nombre-status2').innerHTML = 'el campo está vacío';</script>";
		}
		elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $name)){
			$msjStatus = "<script>document.getElementById('nombre-status2').innerHTML = 'No se admiten n&uacute;meros en este campo';</script>";
		}
		elseif(strlen($name)<2){
			$msjStatus = "<script>document.getElementById('nombre-status2').innerHTML = 'mínimo 2 caracteres';</script>";
		}
		elseif(strlen($name)>100){
			$msjStatus = "<script>document.getElementById('nombre-status2').innerHTML = 'M&aacute;ximo 100 caracteres';</script>";
		}

		//Validar campo teléfono
		elseif($phone == ""){
			$msjStatus = "<script>document.getElementById('telefono-status2').innerHTML = 'El campo est&aacute vac&iacute;o';</script>";
		}

		elseif(strlen($phone)<2){
			$msjStatus = "<script>document.getElementById('telefono-status2').innerHTML = 'M&iacute;nimo 2 d&iacute;gitos';</script>";
		}

		elseif(strlen($phone)>15){
			$msjStatus = "<script>document.getElementById('telefono-status2').innerHTML = 'M&aacute;ximo 15 d&iacute;gitos';</script>";
		}

		elseif(!preg_match("/^[0-9]+$/", $phone)){
			$msjStatus = "<script>document.getElementById('telefono-status2').innerHTML = 'No se admiten letras en este campo';</script>";
		}

		//validar campo email
		elseif($email == ""){
			$msjStatus = "<script>document.getElementById('email-status2').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
		}

		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$msjStatus = "<script>document.getElementById('email-status2').innerHTML = 'Introduce un email v&aacute;lido';</script>";
		}

		elseif(strlen($email)<2){
			$msjStatus = "<script>document.getElementById('email-status2').innerHTML = 'mínimo 2 caracteres';</script>";
		}

		elseif(strlen($email)>100){
			$msjStatus = "<script>document.getElementById('email-status2').innerHTML = 'M&aacute;ximo 100 caracteres';</script>";
		}

		//Valido el campo mensaje
		elseif($message == ""){
			$msjStatus = "<script>document.getElementById('mensaje-status2').innerHTML = 'el campo está vacío';</script>";
		}
		elseif(strlen($message)<2){
			$msjStatus = "<script>document.getElementById('mensaje-status2').innerHTML = 'mínimo 2 caracteres';</script>";
		}
		elseif(strlen($message)>500){
			$msjStatus = "<script>document.getElementById('mensaje-status2').innerHTML = 'M&aacute;ximo 500 caracteres';</script>";
		}

		//validar los términos y condiciones
		elseif(!isset($_POST['c_terms2']) && $_POST['c_terms2'] != "on"){
			$msjStatus = "<script>document.getElementById('terms-status2').innerHTML = 'Debes aceptar los términos y condiciones';</script>";
		}

		else{
			//a quién será enviado
			$destino = "juan_27angel@hotmail.com";

			//asunto
			$asunto = "Mensaje enviado desde la página web";

			//cabeceras para el envío del mail en formato html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=UTF-8\r\n";

			//contenido del mensaje
			$contenido = '
				<!DOCTYPE html>
				<html lang="es">
				<head></head>
				<body>
					<h2>' . $name . ' ha enviado el siguiente mensaje a través de tu sitio web:</h2>
				
					<p>' . $message . '</p>
			
					<p>Contacta a  <strong>' . $name . '</strong> al correo:  <span style="color:blue;"> ' . $email . '</span> o al teléfono '. $phone .' </p>
					
					<p>Ir a mi sitio web <span style="color:blue">http://tarianasesores.com.mx/</span></p>
				</body>
				</html>
			';

			//envío de mail
			$envio = mail($destino, $asunto, $contenido, $headers);

			if ($envio) {
				echo "Enviado correctamente";

				//enviando autorespuesta
				$pfw_header = "From:  abogados@tarianasesores.com.mx"
					. "Reply-To:  abogados@tarianasesores.com.mx";
				$pfw_subject = "Mensaje recibido";
				$pfw_email_to = "$email";
				$pfw_message = "Muchas Gracias $name, por su mensaje: $message "
					. "Su mensaje ha sido recibido satisfactoriamente - "
					. "Nos pondremos en contacto contigo lo antes posible en su e-mail: $email "
					. " n"
					. " n"
					. "--------------------------------------------------------------------------n"
					. "Favor de NO responder este E-mail ya que es generado Automáticamente.n";
				@mail($pfw_email_to, $pfw_subject, $pfw_message, $pfw_header);
			} else {
				echo "Falló el envío";			
			}
		}
	}

	echo $msjStatus;
?>