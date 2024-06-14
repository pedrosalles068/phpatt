<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "aula";


$conn = new pdo("mysql:host=$servername;dbname=$database", $username, $password);
