<?php 

if (isset($_POST['submitM'])) {
    $nameM = $_POST['nameM'];
    $emailM = $_POST['emailM'];
    $subjectM = $_POST['subjectM'];
    $messageM = $_POST['messageM'];
    $mailTo = "info@showlandproducciones.es";
    // $mailTo = "gabrielcireslopez@gmail.com";
            
    $formcontent="Correo: $emailM \n\nDe: $nameM \n\nAsunto: $subjectM\n\n$messageM";

    $errorEmptyM = false;
    $errorEmailM = false;

    if (empty($nameM) || empty($emailM) || empty($messageM)) {
        echo "<span class='form-error'>Rellena los campos obligatorios!*</span>";
        $errorEmptyM = true;

    } elseif (!filter_var($emailM, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Introduce un correo válido!</span>";
        $errorEmailM = true;

    } else { 
        mail($mailTo, $subjectM, $formcontent);
        echo "<span class='form-success'>!Correo enviado! Te responderemos cuanto antes.</span>";
    }

}

?>

<script>

    $(".mailNameM, .mailEmailM, .mailMessageM").addClass("all-good");

    var errorEmptyM = "<?php echo $errorEmptyM; ?>";
    var errorEmailM = "<?php echo $errorEmailM; ?>";

    if (errorEmptyM == true) {
        $(".mailNameM, .mailEmailM, .mailMessageM").removeClass("all-good");
    }
    if (errorEmailM == true) {
        $(".mailEmailM").removeClass("all-good");
    }
    if (errorEmptyM == false && errorEmailM == false) {
        $(".mailNameM, .mailEmailM, .mailSubject, .mailMessageM").val("");
    }

</script>

