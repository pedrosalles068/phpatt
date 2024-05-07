<?php
$dbhost = "localhost";
$dbname = "aula";
$dbusername ="root";
$dbpassword ="";

    $conn = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbusername, $dbpassword);

    $consulta = "SELECT * FROM usuarios";
    $resultado = $conn->query($consulta);
    echo "<h1>Lista de Usuários</h1>";
    echo "<pre>";
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome: {$linha['nome']} - Email: {$linha['email']} - Senha: {$linha['senha']}<br>";
    }


    $data = [
        "nome" => "João",
        "email" => "joao@gmail.com",
        "senha" => "123456"
    ];
    $comando = "INSERT INTO usuarios (id, nome, email, senha) VALUES (NULL, :nome, :email, SHA1(:senha))";
    $resultado = $conn->prepare($comando);
    $resultado->execute($data);
    echo "Usuário inserido com sucesso!";