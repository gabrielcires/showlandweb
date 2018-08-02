<?php 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mailTo = "info@showlandproducciones.es";
    // $mailTo = "gabrielcireslopez@gmail.com";
            
    $formcontent="Correo: $email \n\nDe: $name \n\nAsunto: $subject\n\n$message";

    $errorEmpty = false;
    $errorEmail = false;

    if (empty($name) || empty($email) || empty($message)) {
        echo "<span class='form-error'>Rellena los campos obligatorios!*</span>";
        $errorEmpty = true;

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Introduce un correo válido!</span>";
        $errorEmail = true;

    } else { 
        mail($mailTo, $subject, $formcontent);
        echo "<span class='form-success'>!Correo enviado! Te responderemos cuanto antes.</span>";
    }
}

?>

<script>

    $(".mailName, .mailEmail, .mailMessage").addClass("all-good");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $(".mailName, .mailEmail, .mailMessage").removeClass("all-good");
    }
    if (errorEmail == true) {
        $(".mailEmail").removeClass("all-good");
    }
    if (errorEmpty == false && errorEmail == false) {
        $(".mailName, .mailEmail, .mailSubject, .mailMessage").val("");
    }

</script>

