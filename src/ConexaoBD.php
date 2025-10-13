<?php
class ConexaoBD{

    public static function conectar():PDO{
        $conexao = new PDO("pgsql:host=localhost;port=5432;dbname=career_lab","postgres","Batman");
        return $conexao;
    }
}

ConexaoBD::conectar();