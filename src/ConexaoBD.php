<?php
class ConexaoBD{

    public static function conectar():PDO{
        $conexao = new PDO("pgsql:host=localhost;port=5432;dbname=meuprojeto","postgres","1234");
        return $conexao;
    }
}

ConexaoBD::conectar();