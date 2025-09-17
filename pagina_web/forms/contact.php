<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require __DIR__ . '/../../phpMailer/Exception.php';
require __DIR__ . '/../../phpMailer/PHPMailer.php';
require __DIR__ . '/../../phpMailer/SMTP.php';

  if(isset($_POST['submit'])){
    $nombre= trim($_POST['nombre']);
    $email= trim($_POST['email']);
    $asunto= trim($_POST['asunto']);
    $mensaje= trim($_POST['mensaje']);


    if(!empty($nombre) && !empty($asunto) && !empty($mensaje) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msj = "<b>De:</b> $nombre <br>";
        $msj .= "<b>Email:</b> <a href='mailto: $email'>$email</a><br>";
        $msj .= "<b>Asunto:</b> $asunto <br>";
        $msj .= "<br><b>Cuerpo del mensaje: </b>";
        $msj .= '<p>' .$mensaje. '</p>';
        $msj .= '<p>Enviado desde el formulario de contacto de EGP</p>';
      } 
  }  
    
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ppereiralucia10@gmail.com';                     //SMTP username
    $mail->Password   = 'tohawiyptukxysyx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ppereiralucia10@gmail.com', 'Formulario EGP');
    $mail->addAddress('luuciapereira2016@gmail.com');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Formulario de contacto';
    if(isset($msj)){
      $mail->Body    = $msj;
      $mail->send();
        header("Location: msj_gracias.php"); 
          exit;
    }
  } catch (Exception $e) {
      echo "El mensaje no se pudo enviar. Error: {$mail->ErrorInfo}";
  }


    
?>
