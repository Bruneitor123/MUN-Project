<?php

require_once 'variables_bmun.php';     
require_once('/var/www/html/envvars.php');     

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Template Stylesheet -->
    <link href="css/admin_style.css" rel="stylesheet">

	<title>Restricted Page</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
  <link href="stylish.css" rel="stylesheet">
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

<svg style="display:none;">
  <defs>

    <g id="home">
      <path fill="#90A4AE" d="M42,48H6c-3.3,0-6-2.7-6-6V6c0-3.3,2.7-6,6-6h36c3.3,0,6,2.7,6,6v36C48,45.3,45.3,48,42,48z"/>
      <path fill="#212121" d="M20.8,35.5v-9.6h6.4v9.6h8V22.7H40L24,8.3L8,22.7h4.8v12.8H20.8z"/>
    </g>

    <g id="search">
      <path fill="#90A4AE" d="M22.9,20.1h-1.5l-0.5-0.5c1.8-2.1,2.9-4.8,2.9-7.7C23.8,5.3,18.5,0,11.9,0S0,5.3,0,11.9s5.3,11.9,11.9,11.9
	    c3,0,5.7-1.1,7.7-2.9l0.5,0.5v1.4l9.1,9.1l2.7-2.7L22.9,20.1z M11.9,20.1c-4.5,0-8.2-3.7-8.2-8.2s3.7-8.2,8.2-8.2s8.2,3.7,8.2,8.2
	    S16.4,20.1,11.9,20.1z"/>
    </g>

    <g id="map">
      <path fill="#90A4AE" d="M16,14.2c-1,0-1.8,0.8-1.8,1.8s0.8,1.8,1.8,1.8c1,0,1.8-0.8,1.8-1.8S17,14.2,16,14.2z M16,0
	    C7.2,0,0,7.2,0,16c0,8.8,7.2,16,16,16s16-7.2,16-16C32,7.2,24.8,0,16,0z M19.5,19.5L6.4,25.6l6.1-13.1l13.1-6.1L19.5,19.5z"/>
    </g>

    <g id="planner">
      <path fill="#90A4AE" d="M28.4,3.6h-1.8V0h-3.6v3.6H8.9V0H5.3v3.6H3.6C1.6,3.6,0,5.1,0,7.1L0,32c0,2,1.6,3.6,3.6,3.6h24.9c2,0,3.6-1.6,3.6-3.6V7.1C32,5.1,30.4,3.6,28.4,3.6z M28.4,32H3.6V12.4h24.9V32z M7.1,16H16v8.9H7.1V16z"/>
    </g>

  </defs>
</svg>


<nav class="nav__cont">
  <ul class="nav">
    <li class="nav__items ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
        <use xlink:href="#home"></use>
      </svg>
      <a href="">Home</a>
    </li>
    
    <li class="nav__items ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
        <use xlink:href="#search"></use>
      </svg>
      <a href="">Search</a>
    </li>
      
    <li class="nav__items ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
        <use xlink:href="#map"></use>
      </svg>
     <a href="">Map</a>
    </li>
      
    <li class="nav__items ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 35.6">
        <use xlink:href="#planner"></use></svg>
      <a href="">Planner</a>
    </li>
        
  </ul>
</nav>

  
  <div class="wrapper">
    <main>
      
      <h1 class="display-4">Bienvenido a la página de administración MUN.</h1>
      <p class="lead">Acá se pueden editar todos los datos que quieras. Exceptuando el identificador único ya que es esencial para la identificación del usuario.</p>
      <p><a href="/" class="btn btn-primary">Cerrar Sesión</a></p>
    </main>
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