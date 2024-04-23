<?php
$dbhost = "localhost";
$dbname = "aula";
$dbusername ="root";
$dbpassword ="";

try {
    $con = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbusername, $dbpassword);
    echo "Conexão realizada com sucesso!" . PHP_EOL;
}
catch(PDOException $exception){
    echo "Conexão falhou: " . $exception->getMessage() . PHP_EOL;
}
