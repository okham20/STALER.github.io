<?php

    $name = $_POST['Nombre'];
    $mail = $_POST['mail'];
    $phon = $_POST['phone'];
    $affair = $_POST['Asunto'];
    $message = $_POST['message'];

    $body = "Nombre: ". $name . "<br> Correo: " . $mail . "<br> Teléfono: " . $phon . "<br> Mensaje: " . $message;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;   //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'micorreo';                     //SMTP username
    $mail->Password   = 'clave';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('micorreo', 'Interesado');
    $mail->addAddress('startnov06@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto importamisimo';
    $mail->Body    = $body;

    $mail->send();
    echo '<script>
        alert("El mensaje se envío correctamente");
        window.history.go(-1);
        </script>';
    
} catch (Exception $e) {
    echo "error al enviar el mensaje: {$mail->ErrorInfo}";
}
// header("Location:index.html");

?>