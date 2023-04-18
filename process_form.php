<?php

include 'php/qrlib.php';
include 'foros.php';
include 'equipos_diplomaticos.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/vendor/autoload.php';

$mail = new PHPMailer(true);
require_once('envvars.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$evento = filter_var($_POST['eventoform'], FILTER_SANITIZE_STRING);
$modalidad = filter_var($_POST['modalidadform'], FILTER_SANITIZE_STRING);

if ($evento == 'BassMUN') {
  $evento_final = "bassmun_registro";
  $comprobantes = "comprobantes-bassmun/";
  $qrs = "qrs-bassmun/";
  $Body = file_get_contents("email_bassmun.html");
} else if ($evento == 'SwordMUN International') {
  $evento_final = "Swordmun_int_registro";
  $comprobantes = "comprobantes-swordmun_int/";
  $qrs = "qrs-swordmun_int/";
} else {
  echo 'El evento seleccionado es inválido.';
}

$random_string = '';

function generate_random_string($string_length=32) {
  $letters_and_digits = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  global $random_string;
  for ($i = 0; $i < $string_length; $i++) {
      $random_string .= $letters_and_digits[rand(0, strlen($letters_and_digits) - 1)];
  }
  return $random_string;
}

function qr_crear($CODplataforma) {
  global $random_string;
  generate_random_string();
  $file_name = $GLOBALS['qrs'] . $CODplataforma;
  QRcode::png($random_string, $file_name, QR_ECLEVEL_Q, 10, 4);
}


// Set parameters and execute statement

$ubicacion = $_POST['ubicacion'];
$carnet = filter_var($_POST['carnet'], FILTER_SANITIZE_STRING);

$name = filter_var($_POST['nomyapell'], FILTER_SANITIZE_STRING);
$carnet_con_extension = $ubicacion . '-' . $carnet;
$celular = filter_var($_POST['numcel'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);

$foro = isset($_POST['forodes']) ? $_POST['forodes'] : "NO APLICA";

$modalidades = array(
  'Mesa (Presidente)',
  'Mesa (Moderador/a)',
  'Mesa (Oficial de Conferencias)',
  'Mesa (Paje)',
  'Staff (Comité)',
  'Staff (Otros)',
  'Asesor (Profesor/Encargado)'
);


if (in_array($modalidad, $modalidades)) {
  $equipo_diplomatico = $modalidad;
} else {
  // database connection details

  // create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


  $paises_general = array(
    'Estados Unidos de América',
    'Federación de Rusia',
    'República Popular China',
    'Reino Unido de Gran Bretaña e Irlanda del Norte',
    'República Francesa',
    'Ucrania (Україна)',
    'Reino de Arabia Saudita',
    'Emirato Islámico de Afganistán',
    'Estados Unidos de Venezuela',
    'República de la India',
    'Confederación Suiza',
    'Estado de Israel',
    'República de Haití',
    'Estado del Japón',
    'Estados Unidos Mexicanos'
);

$delegados_nacionales = array(
  'Departamento de Oruro',
  'Departamento de Cochabamba',
  'Departamento de La Paz',
  'Departamento de Potosí',
  'Departamento de Chuquisaca',
  'Departamento de Tarija',
  'Departamento de Santa Cruz',
  'Departamento del Beni',
  'Departamento de Pando',
  'República de la India',
  'Confederación Suiza',
  'Estado de Israel',
  'República de Haití',
  'Estado del Japón',
  'Estados Unidos Mexicanos'
);


$paises_comision_paz = array(
  'Ucrania (Україна)',
  'Reino de Arabia Saudita',
  'Emirato Islámico de Afganistán',
  'Estados Unidos de Venezuela',
  'República de la India',
  'Confederación Suiza',
  'Estado de Israel',
  'República de Haití',
  'Estado del Japón',
  'Estados Unidos Mexicanos',
  'República Italiana',
  'República Federal de Alemania',
  'Países Bajos (Holanda)',
  'República de Corea',
  'República de Sudáfrica'
);


  // prepare and execute query to get count of each option value
  $stmt = $conn->prepare("SELECT equipo_diplomatico FROM bassmun_registro WHERE foro = '$foro' GROUP BY equipo_diplomatico");
  $stmt->execute();
  $result = $stmt->get_result();

      if ($foro == 'Comité de Tierra y Territorio, Recursos Naturales y Hoja de la Coca (Foro Nacional)') {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $paises_ya_elegidos[] = $row['equipo_diplomatico'];
          }
        } else {
          $paises_disponibles = $delegados_nacionales;
        }
          
          $paises_disponibles = array_diff($delegados_nacionales, $paises_ya_elegidos);
          $random_index = array_rand($paises_disponibles);
          $valor_pais_random = $paises_disponibles[$random_index];

      } else if ($foro == 'Comisión de Consolidación de la Paz') {
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $paises_ya_elegidos[] = $row['equipo_diplomatico'];
            }
        } else {
          $paises_disponibles = $paises_comision_paz;
        }
        $paises_disponibles = array_diff($paises_comision_paz, $paises_ya_elegidos);
        $random_index = array_rand($paises_disponibles);
        $valor_pais_random = $paises_disponibles[$random_index];

      } else {
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $paises_ya_elegidos[] = $row['equipo_diplomatico'];
            }
        } else {
          $paises_disponibles = $paises_general;
        }
        $paises_disponibles = array_diff($paises_general, $paises_ya_elegidos);
        $random_index = array_rand($paises_disponibles);
        $valor_pais_random = $paises_disponibles[$random_index];
        }
  
  $equipo_diplomatico = $valor_pais_random;
}


$allowed_types = array('pdf');
$max_size = 1 * 1024 * 1024; // 1 MB


if ($_FILES['comprobante']['error'] == UPLOAD_ERR_OK) {

  // generate the new filename
  $initials = '';
  foreach (explode(' ', $name) as $word) {
    $initials .= substr($word, 0, 1);
  }
  $existing_files = glob("$comprobantes*-*.*");
  $count = count($existing_files) + 1;
  $last_digits = str_pad($count, 6, '0', STR_PAD_LEFT);
  
  // check the file type and size
  $filename = $_FILES['comprobante']['name'];
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  $new_filename = "{$initials}-{$last_digits}.{$extension}";


  if (in_array($extension, $allowed_types) && $_FILES['comprobante']['size'] <= $max_size) {
    $upload_path = $comprobantes . $new_filename;

    if (move_uploaded_file($_FILES['comprobante']['tmp_name'], $upload_path)) {
      // file uploaded successfully
      // save $new_filename to the database or perform any other required actions
    } else {
      // error occurred while moving the file
      echo 'Error: Unable to upload file. (Contacta con Bruno Vincentty)';
    }
  } else {
    // invalid file type or size
    echo 'Error: Tipo de archivo inválido (Solo PDF) o archivo con tamaño muy grande (Hasta 1MB), por favor vuelve atrás.';
  }
} else {
  // error occurred while uploading the file
  echo 'Error al subir, manda esto a Bruno Vincentty: ' . $_FILES['comprobante']['error'];
}

$codigoqr = $new_filename;

$codigoqr_sinext = pathinfo($codigoqr, PATHINFO_FILENAME);

qr_crear($codigoqr_sinext . ".png");

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO $evento_final (nombre_completo, carnet_ext, celular, correo, foro, equipo_diplomatico, nom_comprobante, uniq_ident) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $carnet_con_extension, $celular, $email, $foro, $equipo_diplomatico, $new_filename, $random_string);

$stmt->execute();

$Body = str_replace("VARIABLE_NOMBRE", $name, $Body);
$Body = str_replace("VARIABLEQR", $new_filename, $Body);
$Body = str_replace("CARNET_DE_IDENTIDAD", $carnet . " " . $ubicacion, $Body);
$Body = str_replace("NUM_CELULAR", $celular, $Body);
$Body = str_replace("FORO_ELEGIDO", $foro, $Body);
$Body = str_replace("PAIS_O_EQUIDPL", $equipo_diplomatico, $Body);


$stmt->close();
$conn->close();


$mail->isSMTP();
$mail->Host = $smtp_host;
  $mail->SMTPAuth = $smtp_auth;
  $mail->Username = $smtp_username;
  $mail->Password = $smtp_password;
  $mail->SMTPSecure = $smtp_secure;
  $mail->Port = $smtp_port;


$mail->CharSet = "UTF-8";
$mail->Encoding = 'base64';

$mail->setFrom('admin@pnu-aas.com', 'Programa de Naciones Unidas (AAS)');
$mail->addAddress($email, $name);

$mail->AddEmbeddedImage('email_img/facebook2x.png', 'facebook');
$mail->AddEmbeddedImage('email_img/instagram2x.png', 'instagram');
$mail->AddEmbeddedImage('email_img/mail2x.png', 'email');
$mail->AddEmbeddedImage('email_img/MCC_confirmation_icon_calendar.png', 'MCC_confirmation_icon_calendar');
$mail->AddEmbeddedImage('email_img/MCC_confirmation_icon_location.png', 'MCC_confirmation_icon_location');
$mail->AddEmbeddedImage('email_img/MCC_confirmation_icon_logo.png', 'MCC_confirmation_icon_logo');
$mail->AddEmbeddedImage('email_img/MCC_confirmation_orderdetails_bg.png', 'MCC_confirmation_orderdetails_bg');
$mail->AddEmbeddedImage('email_img/MCC_confirmation_ticketdetails_bg.png', 'MCC_confirmation_ticketdetails_bg');
$mail->AddEmbeddedImage('email_img/MCC_confirmation_type_seeyouthere.png', 'MCC_confirmation_type_seeyouthere');
$mail->AddEmbeddedImage('email_img/whatsapp2x.png', 'whatsapp');
$mail->AddEmbeddedImage("qrs-bassmun/" . $codigoqr_sinext . ".png", 'logo_qr_ident');

$mail->Subject = 'BassMUN 2023 - Inscripciones';
$mail->Body = $Body;
$mail->IsHTML(true);

$mail->send();

header('Location: /?success=true');

?>
