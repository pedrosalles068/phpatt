<?php
// Inicia sessões
require_once "verificacao_logado.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .categories {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .category {
            width: calc(50% - 10px);
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .category:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .category h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .category p {
            margin-top: 5px;
            color: #666;
        }
        .category a {
            display: block;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .category a:hover {
            background-color: #45a049;
        }
        .logout-btn {
            display: block;
            width: 100%;
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bem-vindo à Página Inicial</h1>
    <div class="categories">
        <div class="category">
            <h2>Escala</h2>
            <p>Aqui você pode acessar informações sobre escalas.</p>
            <a href="escala.php">Preencher</a>
            <a href="escalacompleta.php">Ver escalas</a>
        </div>
        <div class="category">
            <h2>Reuniões</h2>
            <p>Encontre informações sobre reuniões nesta seção.</p>
            <a href="reunioes.php">Ver reuniões</a>
        </div>
        <div class="category">
            <h2>Coordenação</h2>
            <p>Coordene suas atividades e tarefas aqui.</p>
            <a href="coordenacao.php">Coordenar</a>
        </div>
        <div class="category">
            <h2>Formação</h2>
            <p>Aprenda um pouco mais sobre nosso ministério</p>
            <a href="formacao.php">Iniciar</a>
        </div>
        <div class="category">
            <h2>Criar Usuario</h2>
            <p> Cadastrar novo Acólito</p>
            <a href="cadastrar_usuario.php">Iniciar</a>
        </div>
        <div class="category">
            <h2>Intruções para Responsáveis </h2>
            <p> Instruções a serem seguidas</p>
            <a href="instrucoes.php">Instruções</a>
        </div>
    </div>
    <a href="logout.php" class="logout-btn">Sair</a>
</div>
</body>
</html>