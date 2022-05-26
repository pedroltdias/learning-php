<?php

class Conta 
{
    private string $cpfTitular;      //é possível tipar ou não variaveis
    private string $nomeTitular;
    private float $saldo;
    private static int $numeroDeContas = 0;

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->cpfTitular = $cpfTitular;
        $this->validaNomeTitular($nomeTitular);
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function saca(float $valorASacar) : void
    {
        if ($valorASacar > $this->$saldo) {
            echo "Saldo indisponível!";
            return;
        }
        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar) : void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo!";
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $contaDestino) : void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível!";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }

    public function getSaldo() : float 
    {
        return $this->saldo;
    }

    public function getCpfTitular() : string
    {
        return $this->cpfTitular;
    }

    public function getNomeTitular() : string
    {
        return $this->nomeTitular;
    }

    private function validaNomeTitular(string $nomeTitular) : void
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }

    public function getNumeroDeContas() : int  
    {
        return self::$numeroDeContas;
    }
}