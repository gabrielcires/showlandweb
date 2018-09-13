<?php 

$sender_name    = filter_var($_POST["sender_name"], FILTER_SANITIZE_STRING);
$empresa    = filter_var($_POST["empresa"], FILTER_SANITIZE_STRING);
$sender_est = filter_var($_POST["sender_est"], FILTER_SANITIZE_STRING);
$sender_place = filter_var($_POST["sender_place"], FILTER_SANITIZE_STRING);
$sender_email = filter_var($_POST["sender_email"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
$checking = filter_var($_POST["checking"], FILTER_SANITIZE_STRING);
$sender_number        = filter_var($_POST["sender_number"], FILTER_SANITIZE_STRING);
$subject = "Formulario de Incidencias";
$recipient_email = 'info@showlandproducciones.es'; 
    
    //Get uploaded file data
    $file_tmp_name    = $_FILES['my_file']['tmp_name'];
    $file_name        = $_FILES['my_file']['name'];
    $file_size        = $_FILES['my_file']['size'];
    $file_type        = $_FILES['my_file']['type'];
    $file_error       = $_FILES['my_file']['error'];

    strtolower(end(explode('.',$file_name)));
    $formcontent="Nombre de contacto: $sender_name \nTelf de contacto: $sender_number \n\nEmpresa: $empresa \nEstablecimiento: $sender_place \n\nPoblacon: $sender_place \nUrgente 24h: $checking \n\nDescripcon: $description";

    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));
    
        $boundary = md5("sanwebe");

        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$sender_email."\r\n"; 
        $headers .= "Reply-To: ".$sender_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 

        //plain text 
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($formcontent));

        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 

        $sentMail = @mail($recipient_email, $subject, $body, $headers);


?>
