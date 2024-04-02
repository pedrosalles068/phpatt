<?php
class Gato {
private $nome;
private $idade;
private $raca;

public function __construct($nome, $idade, $raca) {
$this->nome = $nome;
$this->idade = $idade;
$this->raca = $raca;
}

public function mensagem() {
echo "Meu gato {$this->nome} tem {$this->idade} anos e é da raça {$this->raca}.";
}

// Getters
public function getNome() {
return $this->nome;
}

public function getIdade() {
return $this->idade;
}

public function getRaca() {
return $this->raca;
}

// Setters
public function setNome($nome) {
$this->nome = $nome;
}

public function setIdade($idade) {
$this->idade = $idade;
}

public function setRaca($raca) {
$this->raca = $raca;
}
}
$meuGato = new Gato("Tom", 3, "Siamês");
$meuGato->mensagem();