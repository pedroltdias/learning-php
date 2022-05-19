<?php

function exibeMensagem(string $mensagem){
    echo $mensagem . PHP_EOL;
}

function sacar(array $conta, float $valorASacar) : array {
    if ( $valorASacar > $conta['saldo']){
        exibeMensagem("Você não pode sacar um valor maior do que seu saldo!");
    } else {
        $conta['saldo'] -= 500;
    }
    return $conta;
}

function depositar(array $conta, float $valorADepositar) : array {
    if ($valorADepositar > 0) {
        $conta['saldo'] += $valorADepositar;
    } else {
        exibeMensagem("Você precisa depositar valores maiores que zero!");
    }
    return $conta;
}
