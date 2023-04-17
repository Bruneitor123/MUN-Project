<?php

require_once 'variables_bmun.php';     
require_once('envvars.php');     

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Template Stylesheet -->
    <link href="css/admin_style.css" rel="stylesheet">

	<title>Restricted Page</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
</head>


<?php
$cookie_name = "loggedin";
$cookie_value_local = isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : "";
$decrypted_value = openssl_decrypt($cookie_value_local, "AES-256-CBC", $cookie_key, 0, $cookie_aad);

if($decrypted_value === $cookie_value)  {

  if (isset($_GET['success'])) {

    echo 'Datos Editados :)';

    if($_GET['success'] == 'true') {
      echo '<script type="text/javascript">
        Swal.fire({
          icon: "success",
          title: "Datos editados!",
          text: "Se han editado exitosamente los datos del usuario.",
        })
        </script>';
    } else if($_GET['success'] == 'inscrito') {
      echo '<script type="text/javascript">
        Swal.fire({
          icon: "success",
          title: "El Usuario Ha Sido Inscrito!",
          text: "Se ha editado al usuario ' . $_GET['user'] . ' y se ha mandado un correo de confirmación a su correo ' . $_GET['correo_user'] . ' .",
        })
        </script>';
    }
  }
  
  
?>
<body>

<!-- Include the Bootstrap 5 stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

<div class="container">
  <h1 class="display-4">Bienvenido a la página de administración MUN.</h1>
  <p class="lead">Acá se pueden editar todos los datos que quieras. Exceptuando el identificador único ya que es esencial para la identificación del usuario.</p>
  <p><a href="/" class="btn btn-primary">Volver a la página principal</a></p>
</div>


<!-- Create a table element with the Bootstrap table class -->
<table class="table table-striped table-hover">

  <!-- Add a table header row with the Bootstrap table header class -->
  <thead class="table-dark">
    <tr class='text-center'>
      <th>Nro</th>
      <th>Nombre Completo</th>
      <th>Carnet con Extensión</th>
      <th>Celular</th>
      <th>Correo Electrónico</th>
      <th>Foro</th>
      <th>Equipo Diplomático</th>
      <th>Nombre Comprobante</th>
      <th>Identificador Único</th>
      <th>Inscripción Confirmada <br>(1 = Si ; 0 = No)</th>
    </tr>
  </thead>

  <tbody>
    <?php
      // Replace the database credentials with your own

      // Create a connection to the database
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check for errors in the connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Create a query to retrieve the data from the database
      $sql = "SELECT Nro, nombre_completo, carnet_ext, celular, correo, foro, equipo_diplomatico, nom_comprobante, uniq_ident, Confirmado FROM bassmun_registro";

      // Execute the query and retrieve the results
      $result = $conn->query($sql);

      // Check if any rows were returned
      if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='text-decoration-underline text-wrap'><button type='button' class='btn btn-info' id='modinfo' onclick='modifyuser()'>" . $row["Nro"] . "</button></td>";
            echo "<td>" . $row["nombre_completo"] . "</td>";
            echo "<td>" . $row["carnet_ext"] . "</td>";
            echo "<td>" . $row["celular"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>" . $row["foro"] . "</td>";
            echo "<td>" . $row["equipo_diplomatico"] . "</td>";
            echo "<td>" . $row["nom_comprobante"] . "</td>";
            echo "<td>" . $row["uniq_ident"] . "</td>";
            echo "<td>" . $row["Confirmado"] . "</td>";
            echo "</tr>";
        }
      } else {
            echo "<tr><td colspan='9'>0 results</td></tr>";
      }

      // Close the connection to the database
      $conn->close();
    ?>
  </tbody>
</table>

<!-- Include the Bootstrap 5 JavaScript library -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function modifyuser() {
    var row = event.target.parentNode.parentNode;
    var cells = row.getElementsByTagName("td");

    var params = "";
    for (var i = 0; i < cells.length; i++) {
        var key = "";
        var header = document.getElementsByTagName("th")[i].innerHTML;
        if (header.includes("Inscripción Confirmada")) {
            key = "confirmado";
        } else {
            key = header.replace(/\s/g, "_");
        }
        if (key == "Nro") {
            continue;
        }
        var value = cells[i].innerHTML;
        params += encodeURIComponent(key) + "=" + encodeURIComponent(value) + "&";
    }

    params = params.slice(0, -1); // Remove last '&'
    var url = "/admin/editar_usuario.php?" + params;

    window.location.href = url;
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

<?php
} else {
  header('Location: /');
  echo '<script type="text/javascript">
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "You need to login first!",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "OK"
      }).then((result) => {
        window.location.href = "/";
      })
      </script>';
      
}
?>

</html>

