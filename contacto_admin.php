<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '/vendor/autoload.php';

    $mail = new PHPMailer(true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    }

    $mail->isSMTP();
    $mail->Host = 'mail.privateemail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@pnu-aas.com';
    $mail->Password = 'administradorpnu#2023';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';

    $mail->setFrom($email, $name);
    $mail->addAddress("admin@pnu-aas.com", 'Programa de Naciones Unidas (AAS)');
    
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

?>