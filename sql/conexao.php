<?php
$servername = "localhost";
$username = "root";
$password = "null";
$database = "acolitos";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
