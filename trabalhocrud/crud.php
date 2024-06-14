<?php
require_once 'conexao.php';

$sql = "SELECT * FROM usuarios";
$stmt = $conn->prepare($sql);
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
    <title>CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
        .btn-custom {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Gerenciamento de Usuários</h1>
    <div class="table-container">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>
                                    <a href='editar.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm btn-custom'>Editar</a>
                                    <button class='btn btn-danger btn-sm btn-custom' onclick='confirmarExclusao(" . $row['id'] . ")'>Excluir</button>
                                  </td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="adicionar.php" class="btn btn-success">Adicionar Usuário</a>
    </div>
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir este usuário?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmarExclusao(id) {
        var confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        confirmDeleteBtn.href = 'excluir.php?id=' + id;
        $('#confirmModal').modal('show');
    }
</script>
</body>
</html>
