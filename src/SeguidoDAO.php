<?php
require_once "ConexaoBD.php";
class SeguidoDAO{

    public static function seguir(int $idusuario, int $idseguido):void{
        $conexao = ConexaoBD::conectar();
        
        $sql = "INSERT INTO seguidores (idusuario, idseguido) VALUES (?,?)";
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(1, $idusuario);
        $stmt->bindParam(2, $idseguido);

        $stmt->execute();
    }
}