<?php

// Connect to the database
require_once('envvars.php');

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the query to retrieve the variables from the database
$sql = "SELECT nombre_completo, carnet_ext, celular, correo, foro, equipo_diplomatico, nom_comprobante FROM bassmun_registro";

// Execute the query
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Retrieve the variables from the query result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["nombre_completo"];
    $carnet_con_extension = $row["carnet_ext"];
    $celular = $row["celular"];
    $email = $row["correo"];
    $foro = $row["foro"];
    $equipo_diplomatico = $row["equipo_diplomatico"];
    $new_filename = $row["nom_comprobante"];
} else {
    die("No results found.");
}

// Close the database connection
$conn->close();
?>
