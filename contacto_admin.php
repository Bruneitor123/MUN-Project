<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '/vendor/autoload.php';
    require_once(__DIR__ . '/envvars.php');

    $mail = new PHPMailer(true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    }

    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = $smtp_auth;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = $smtp_secure;
    $mail->Port = $smtp_port;


    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';

    $mail->setFrom($email, $name);
    $mail->addAddress("admin@pnu-aas.com", 'Programa de Naciones Unidas (AAS)');
    
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

?>