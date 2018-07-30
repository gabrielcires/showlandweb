<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$formcontent="Correo: $email \n
De: $name \n
Asunto: $subject \n
$message";
$recipient = "gabrielcireslopez@gmail.com";
$mailheader = "De: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

// -----------

// if(isset($_POST['contactSubmit'])){
// 	$message = " ";
// 	$name = $_POST["name"] ;
// 	$email = $_POST["email"];
// 	$formMessage = $_POST["message"];
	
	
// 	$message .= "Full Name: " . $name . "\
// ";
// 	$message .= "Email Address: " . $email . "\
// ";
// 	$message .= "Comment: " . $formMessage . "\
// ";
	
// 	$subject = "Contact Us";
// 	$myEmail =" gabrielcireslopez@gmail.com";
	
// 	if (mail($myEmail, $subject, $message)){
// 		$success = "Message successfully sent";
// 	}else{
// 		$success = "Message Sending Failed, try again";
// 	}
// }

?>

