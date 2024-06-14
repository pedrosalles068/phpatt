<?php
require_once "conexao.php";
$mensagem = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        // Obter os dados do formulário
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = "O e-mail fornecido é inválido.";
        } else {
            // Verificar se o usuário ou e-mail já existem
            $sql_check = "SELECT COUNT(*) FROM usuarios WHERE nome = :username OR email = :email";
            if ($stmt_check = $conn->prepare($sql_check)) {
                $stmt_check->bindValue(':username', $username);
                $stmt_check->bindValue(':email', $email);
                $stmt_check->execute();
                $count = $stmt_check->fetchColumn();

                if ($count > 0) {
                    $erro = "Nome de usuário ou e-mail já estão em uso.";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql_insert = "INSERT INTO usuarios (nome, senha, email) VALUES (:username, :password, :email)";

                    // Preparar e executar a declaração
                    if ($stmt_insert = $conn->prepare($sql_insert)) {
                        $stmt_insert->bindValue(':username', $username);
                        $stmt_insert->bindValue(':password', $hashed_password);
                        $stmt_insert->bindValue(':email', $email);

                        if ($stmt_insert->execute()) {
                            $mensagem = "Usuário cadastrado com sucesso!";
                        } else {
                            $erro = "Erro ao cadastrar o usuário: " . $stmt_insert->errorInfo()[2];
                        }
                    } else {
                        $erro = "Erro ao preparar a declaração: " . $conn->errorInfo()[2];
                    }
                }
            } else {
                $erro = "Erro ao preparar a verificação: " . $conn->errorInfo()[2];
            }
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #f44336;
            color: white;
        }
        .alert-success {
            background-color: #4CAF50;
            color: white;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="button"] {
            background-color: #ccc;
            cursor: pointer;
        }
        input[type="button"]:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastro de Usuário</h2>
    <?php if (!empty($erro)) : ?>
        <div class="alert alert-danger"><?php echo $erro; ?></div>
    <?php endif; ?>
    <?php if (!empty($mensagem)) : ?>
        <div class="alert alert-success"><?php echo $mensagem; ?></div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="cadastroForm">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Cadastrar" id="submitBtn">
    </form>
    <input type="button" value="Voltar para Página Inicial" onclick="window.location.href='crud.php';">
</div>

</body>
</html>
