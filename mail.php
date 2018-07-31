<?php 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mailTo = "gabrielcireslopez@gmail.com";
            
    $formcontent="
    
    Correo: $email \n\nDe: $name \n\nAsunto: $subject\n\n$message";

    $errorEmpty = false;
    $errorEmail = false;

    if (empty($name) || empty($email) || empty($message)) {
        echo "<span class='form-error'>Rellena los campos obligatorios!</span>";
        $errorEmpty = true;

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Introduce un correo válido!</span>";
        $errorEmail = true;

    } else { 
        mail($mailTo, $subject, $formcontent);
        echo "<span class='form-success'>Correo enviado!</span>";
    }

}

?>

<script>

    $("#mailName, #mailEmail, #mailMessage, #mailSubject").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $("#mailName, #mailEmail, #mailMessage").addClass("input-error");
    }
    if (errorEmail == true) {
        $("#mailEmail").addClass("input-error");
    }
    if (errorEmpty == false && errorEmail == false) {
        $("#mailName, #mailEmail, #mailSubject, #mailMessage").val("");
    }

</script>

