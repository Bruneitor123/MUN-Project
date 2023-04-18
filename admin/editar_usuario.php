<?php
// Replace the database credentials with your own
require_once 'variables_bmun.php';
require_once('/var/www/html/envvars.php');
// Create a connection to the database
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Template Stylesheet -->
    <link href="/css/admin_style2.css" rel="stylesheet">

	<title>Restricted Page</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<!-- Include the Bootstrap 5 stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

<!-- Create a table element with the Bootstrap table class -->
<table class="table table-striped table-hover">

  <!-- Add a table header row with the Bootstrap table header class -->
  <thead class="table-dark">
    <tr class="text-center">
      <th>Nombre Completo</th>
      <th>Carnet con Extensión</th>
      <th>Celular</th>
      <th>Correo Electrónico</th>
    </tr>
  </thead>

  <tbody>
    <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require '/vendor/autoload.php';

        $mail = new PHPMailer(true);
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check for errors in the connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        
        // Check if any parameters were provided
        if (isset($_GET["Nombre_Completo"])) {

        
        $nombre = $_GET["Nombre_Completo"];
        $carnet_ext = $_GET["Carnet_con_Extensión"];
        $celular = $_GET["Celular"];
        $correo = $_GET["Correo_Electrónico"];
        $foro = $_GET["Foro"];
        $equidpl = $_GET["Equipo_Diplomático"];
        $nom_comp = $_GET["Nombre_Comprobante"];
        $uniq_ident = $_GET["Identificador_Único"];
        $confirmado = $_GET["confirmado"];
        
        if (isset($_POST["submit"])) {

            $data = array(
                'nombre_completo' => $_POST['nombre'],
                'carnet_ext' => $_POST['carnet_ext'],
                'celular' => $_POST['celular'],
                'correo' => $_POST['correo'],
                'foro' => $_POST['foro'],
                'equipo_diplomatico' => $_POST['equidpl'],
                'nom_comprobante' => $_POST['nom_comp'],
                'Confirmado' => $_POST['confirmado']
            );
            

            $set_clause = "";
            foreach ($data as $key => $value) {
                if ($key !== 'submit') {
                    $set_clause .= "`" . $key . "`='" . $value . "',";
                }
            }
            $set_clause = rtrim($set_clause, ","); // Remove the last comma

            $sql = "UPDATE bassmun_registro SET " . $set_clause . " WHERE `uniq_ident`='" . $uniq_ident . "'";


            if ($conn->query($sql) === TRUE) {
                header("Location: plataforma_admin.php?success=true");
                exit();
            } else {
                echo "Error al editar el dato: " . $conn->error;
            }

        } else if (isset($_POST["inscribir"])) {

            $confirmado = 1;
            $sql = "UPDATE bassmun_registro SET `Confirmado`='" . $confirmado . "' WHERE `uniq_ident`='" . $uniq_ident . "'";

            if ($conn->query($sql) === TRUE) {

                // Enviar CORREO
                $Body = file_get_contents("/var/www/html/inscripcion_confirmed.html");
                $Body = str_replace("VARIABLE_NOMBRE", $nombre, $Body);

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
                $mail->addAddress($correo, $nombre);
                
                $mail->Subject = 'BassMUN 2023 - Inscripciones';
                $mail->Body = $Body;
                $mail->IsHTML(true);

                $mail->send();

                header("Location: plataforma_admin.php?success=inscrito&user=" . $nombre . "&correo_user=" . $correo);

                exit();
            } else {
                echo "Error al editar el dato: " . $conn->error;
            }
        } else {

                echo '<form method="post">';
                echo "<tr>";
                echo "<td><input type='text' name='nombre' value='" . $nombre . "' style='width: 100%'></td>";
                echo "<td><input type='text' name='carnet_ext' value='" . $carnet_ext . "' style='width: 100%'></td>";
                echo "<td><input type='text' name='celular' value='" . $celular . "' style='width: 100%'></td>";
                echo "<td><input type='text' name='correo' value='" . $correo . "' style='width: 100%'></td>";
                echo "</tr>";
                echo '<tr class="table-dark text-center">
                <th>Foro</th>
                <th>Equipo Diplomático</th>
                <th>Nombre Comprobante</th>
                <th>Inscripción Confirmada (1 = Si ; 0 = No)</th>
                </tr>';
                echo "<tr>";
                echo "<td><input type='text' name='foro' value='" . $foro . "' style='width: 100%'></td>";
                echo "<td><input type='text' name='equidpl' value='" . $equidpl . "' style='width: 100%'></td>";
                echo "<td><input type='text' name='nom_comp' value='" . $nom_comp . "' style='width: 100%'></td>";
                echo "<td><input type='text' name='confirmado' value='" . $confirmado . "' style='width: 100%'></td>";
                echo "</tr>";

                echo '<tr class="table-dark text-center">
                <th>Número de Identificador Único (QR)</th>
                </tr>';
                echo "<tr>";
                echo "<td><input type='text' name='identificador' value='" . $uniq_ident . "' style='width: 100%' disabled></td>";
                echo "<td><input type='hidden' name='identificador' value='" . $uniq_ident . "'></td>";
                echo '<button id="boton-importante" class="btn btn-primary" name="inscribir" onclick="validateForm()"><i class="fas fa-sync-alt"></i> <span>Inscribir Usuario</span></button></p>';
                echo "</tr>";

                echo '<table>';
                echo '<a href="/comprobantes-bassmun/'. $nom_comp . '" target="_blank" class="btn btn-primary">Abrir Comprobante de Pago en PDF</a>';
                $codigoqr = $nom_comp;

                $codigoqr_sinext = pathinfo($codigoqr, PATHINFO_FILENAME);
                echo '<img id="QR_DEC" style="float: right;" src="/qrs-bassmun/' . $codigoqr_sinext . '.png">';
                echo '<div class="col-md-12 text-center">';
                echo '<div style="margin-bottom: 10px;">';
                echo '<label id="asdlabel" for="submit">Volver a la Pag. Anterior /// Actualizar Valores:</label>';
                echo '</div>';
                echo '<div>';
                echo '<p><a href="/admin/plataforma_admin.php" class="btn btn-primary" style="margin-right: 1%"><i class="fas fa-arrow-left"></i> Volver a la Pag. Anterior</a>';
                echo '<button id="update-button" class="btn btn-primary" name="submit"><i class="fas fa-sync-alt"></i> <span>Actualizar Valores</span></button></p>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</table>';

            }
        }

        $conn->close();

    ?>
  </tbody>
</table>

<!-- Include the Bootstrap 5 JavaScript library -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Get the URL parameters
  const urlParams = new URLSearchParams(window.location.search);

  // Check if the confirmado parameter is set to 1
  if (urlParams.get('confirmado') === '1') {
    // Disable the button
    document.getElementById('boton-importante').disabled = true;
  }
</script>


<script>
    function validateForm() {
        Swal.fire({
            title: 'Confirmando Registro e Inscripción...',
            text: '¡Estamos haciendo trabajar a nuestros monos espaciales!',
            icon: 'info',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
    }
</script>

<div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="/">Programa de las Naciones Unidas OR</a>. Todos los derechos reservados. 
						
						Diseñado por Bruno Vincentty Viaña</p>
                    </div>
                </div>
            </div>
        </div>
</div>

</body>
</html>