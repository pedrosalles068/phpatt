<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: crud.php");
        exit;
    } else {
        echo "Erro ao excluir usuário!";
    }
} else {
    echo "ID não fornecido!";
    exit;
}
?>
