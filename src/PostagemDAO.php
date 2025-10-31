<?php
require_once "ConexaoBD.php";
require_once "Util.php";
class PostagemDAO {    

    // Cadastrar nova postagem
    public static function cadastrar($dados, $idusuario) {
        $legenda = $dados['legenda'];
        $imagem = Util::salvarImagem();
        $data = date('Y-m-d H:i:s');

        $conexao = ConexaoBD::conectar();
        $sql = "INSERT INTO postagens (legenda, imagem, idusuario, data) VALUES (?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $legenda);
        $stmt->bindParam(2, $imagem);
        $stmt->bindParam(3, $idusuario);
        $stmt->bindParam(5, $data);
        $stmt->execute();
        return $conexao->lastInsertId();
    }

    public static function listarTimeline($idusuario) {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT p.*, u.nome, u.foto AS foto_usuario
                FROM postagem p
                JOIN usuario u ON p.idusuario = u.idusuario
                WHERE p.idusuario = ?
                   OR (p.idusuario IN (
                        SELECT s.idseguido FROM seguidos s WHERE s.idusuario = ?
                   ))
                ORDER BY p.criado_em DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $idusuario);
        $stmt->bindParam(2, $idusuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar postagens de um usuário
    // public static function listarPorUsuario($idusuario) {
    //     $conexao = ConexaoBD::conectar();
    //     $sql = "SELECT * FROM postagens WHERE idusuario = :idusuario ORDER BY criado_em DESC";
    //     $stmt = $conexao->prepare($sql);
    //     $stmt->execute([':idusuario' => $idusuario]);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // // Buscar todas postagens públicas
    // public static function listarPublicas() {
    //     $conexao = ConexaoBD::conectar();
    //     $sql = "SELECT p.*, u.nome, u.foto as foto_usuario 
    //             FROM postagens p 
    //             JOIN usuarios u ON p.idusuario = u.idusuario
    //             WHERE p.publico = 1 
    //             ORDER BY p.criado_em DESC";
    //     $stmt = $conexao->query($sql);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
?>