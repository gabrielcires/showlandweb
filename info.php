<?php 

if($_POST && isset($_FILES['my_file']) || isset($_POST['submit_form']))
{
    //Capture POST data from HTML form and Sanitize them, 
    $sender_name    = filter_var($_POST["sender_name"], FILTER_SANITIZE_STRING); //sender name
    // $sender_email = filter_var($_POST["sender_email"], FILTER_SANITIZE_STRING); //sender email used in "reply-to" header
    $sender_email = filter_var($_POST["sender_email"], FILTER_VALIDATE_EMAIL); //sender email used in "reply-to" header
    $sender_number        = filter_var($_POST["sender_number"], FILTER_SANITIZE_STRING); //get subject from HTML form
    $subject = "Formulario de Información y Presupuestos";

    $recipient_email    = 'gabrielcireslopez@gmail.com'; //recipient email (most cases it is your personal email)

    //Get uploaded file data
    $file_tmp_name    = $_FILES['my_file']['tmp_name'];
    $file_name        = $_FILES['my_file']['name'];
    $file_size        = $_FILES['my_file']['size'];
    $file_type        = $_FILES['my_file']['type'];
    $file_error       = $_FILES['my_file']['error'];

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
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 

        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
        $body .= $formcontent; 

    $formcontent="Nombre: $sender_name \n\nTelf: $sender_number";

    $errorEmpty = false;
    $errorEmail = false;

    if (empty($sender_name) || empty($sender_email) || empty($sender_number)) {
        echo "<span class='form-error'>Rellena los campos obligatorios!*</span>";
        $errorEmpty = true;

    } elseif (!filter_var($sender_email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Introduce un correo válido!</span>";
        $errorEmail = true;

    } else { 
        $sentMail = @mail($recipient_email, $subject, $body, $headers);
        echo "<span class='form-success'>!Correo enviado! Te responderemos cuanto antes.</span>";
    };

}
?>

<script>

    $(".mailName, .mailEmail, .mailNumber").addClass("all-good");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $(".mailName, .mailEmail, .mailNumber").removeClass("all-good");
    }
    if (errorEmail == true) {
        $(".mailEmail").removeClass("all-good");
    }
    if (errorEmpty == false && errorEmail == false) {
        $(".mailName, .mailEmail, .mailNumber, .mailFiles").val("");
    }

</script>

