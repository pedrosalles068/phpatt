<?php
$servername = "localhost";
$username = "adm";
$password = "acolitos";
$database = "acolitos";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
