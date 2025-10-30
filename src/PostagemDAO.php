<?php
require_once "ConexaoBD.php";

class PostagemDAO {    

    // Cadastrar nova postagem
    public static function cadastrar($dados, $idusuario) {
        $titulo = $dados['titulo'];
        $descricao = $dados['descricao'];
        $criado_em = date('Y-m-d H:i:s');

        $conexao = ConexaoBD::conectar();
        $sql = "INSERT INTO postagem (titulo, descricao, idusuario) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $idusuario);
        $stmt->execute();
        return $conexao->lastInsertId();
    }

    // Listar todas as postagens (com nome do usuário)
    public static function listarTimeline($idusuario) {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT p.*, u.nome 
                FROM postagem p
                JOIN usuarios u ON p.idusuario = u.idusuario
                WHERE p.idusuario = ?
                   OR p.idusuario IN (
                        SELECT s.idseguido FROM seguidos s WHERE s.idusuario = ?
                   )
                ORDER BY p.idpostagem DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $idusuario);
        $stmt->bindParam(2, $idusuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar postagens de um usuário
    public static function listarPorUsuario($idusuario) {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT * FROM postagem WHERE idusuario = :idusuario ORDER BY idpostagem DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':idusuario' => $idusuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>