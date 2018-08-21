<?php 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $files = $_FILES['files'];
    // $mailTo = "info@showlandproducciones.es";
    $mailTo = "gabrielcireslopez@gmail.com";
            
    $formcontent="Correo: $email \n\nNombre: $name \n\nTelf: $number \n\n$files";

    $errorEmpty = false;
    $errorEmail = false;

    if (empty($name) || empty($email) || empty($number) || empty($files)) {
        echo "<span class='form-error'>Rellena los campos obligatorios!*</span>";
        $errorEmpty = true;

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Introduce un correo válido!</span>";
        $errorEmail = true;

    } else { 
        mail($mailTo, $email, $formcontent);
        echo "<span class='form-success'>!Correo enviado! Te responderemos cuanto antes.</span>";
    }

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
        $(".mailName, .mailEmail, .mailNumber").val("");
    }

</script>

