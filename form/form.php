<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $cidade = $_POST["cidade"];
    $estados = $_POST["estados"];


    echo "<h3>Dados Recebidos:</h3>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Idade:</strong> $idade</p>";
    echo "<p><strong>Cidade que mora:</strong> $cidade</p>";


    if (!empty($estados)) {
        echo "<p><strong>Estados que visitou:</strong></p>";
        echo "<ul>";

        foreach ($estados as $estado) {
            echo "<li>$estado</li>";
        }
        echo "</ul>";
    } else {
        echo "<p><strong>Nenhum estado selecionado.</strong></p>";
    }
} else {

    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="idade">Idade:</label><br>
        <input type="text" id="idade" name="idade"><br>
        <label for="cidade">Cidade que mora:</label><br>
        <input type="text" id="cidade" name="cidade"><br>
        <label for="estados">Estados que visitou:</label><br>
        <select id="estados" name="estados[]" multiple>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
}
?>

</body>
</html>
