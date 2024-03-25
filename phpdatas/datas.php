<?php

function imprimirDatasEntre($dataInicial, $dataFinal)
{
    $inicio = new DateTime($dataInicial);
    $fim = new DateTime($dataFinal);

    $intervalo = new DateInterval('P1D');
    $periodo = new DatePeriod($inicio, $intervalo, $fim);

    foreach ($periodo as $data) {
        echo $data->format('d/m/Y') . "\n";
    }
}

$dataInicial = '2017-12-01';
$dataFinal = '2017-12-11';
imprimirDatasEntre($dataInicial, $dataFinal);

