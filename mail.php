<?php $nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];
$asunto = $_POST['asunto'];
$formcontent="Correo: $correo \n
De: $nombre \n
Asunto: $asunto \n
Mensaje: $mensaje";
$recipient = "info@showlandproducciones.es";
$mailheader = "De: $correo \r\n";
mail($recipient, $asunto, $formcontent, $mailheader) or die("Error!");
echo "Enviado!";
?>