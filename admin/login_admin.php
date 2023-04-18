<?php

require_once('/var/www/html/envvars.php');

$login = $_POST['login'];
$password = $_POST['password'];

$user_dict = array(
    "brunovinvia" => "#Admin-Brunocapo4#",
    "anitabaya" => "#Miss-Anita-Baya$/a",
    "sec_administrativo" => "#$#Secretario_Admin$14"
);

// Check if login and password are valid
if (isset($user_dict[$login]) && $user_dict[$login] == $password) {
    // Set response message and status code for successful authentication
    $response = array("status" => "success", "message" => "Login successful");
    $cookie_name = "loggedin";
    $encrypted_value = openssl_encrypt($cookie_value, "AES-256-CBC", $cookie_key, 0, $cookie_aad);

    setcookie($cookie_name, $encrypted_value, time()+3600, '/', $_SERVER['HTTP_HOST'], true, true); // Set cookie for logged in user
    exit(); // Stop execution of the script
} else {
    // Set response message and status code for failed authentication
    $response = array("status" => "error", "message" => "Invalid login or password");
    http_response_code(401); // Status code 401 indicates unauthorized access
}

// Send response in JSON format
echo json_encode($response);

?>
