<?php
require_once "ConexaoBD.php";

class UsuarioDAO{
    public static function cadastrarUsuario($dados, $foto){
        $conexao = ConexaoBD::conectar();
        
        // Upload da foto
        $nomeFoto = uniqid() . "-" . basename($foto['name']);
        $destino = "uploads/" . $nomeFoto;
        move_uploaded_file($foto['tmp_name'], $destino);

        $sql = "INSERT INTO usuarios 
                (nome, email, senha, data_nascimento, telefone, area_id, foto) 
                VALUES (?,?,?,?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        
        $senhaCriptografada = md5($dados['senha']);
        $stmt->bindParam(1, $dados['nome']);
        $stmt->bindParam(2, $dados['email']);
        $stmt->bindParam(3, $senhaCriptografada);
        $stmt->bindParam(4, $dados['data_nascimento']);
        $stmt->bindParam(5, $dados['telefone']);
        $stmt->bindParam(6, $dados['area_id']);
        $stmt->bindParam(7, $nomeFoto);

        $stmt->execute();
    }


    public static function validarUsuario($dados){
        
        $senhaCriptografada = md5($dados['senha']);
        $sql = "select * from usuarios where email=? AND senha=?";

        $conexao = ConexaoBD::conectar();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $dados['email']);
        $stmt->bindParam(2, $senhaCriptografada);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            return $usuario;
        } else {
            return false;
        }
    }

    public static function listarUsuarios($idusuario){
        $sql = "SELECT * FROM usuarios where idusuario!=?";

        $conexao = ConexaoBD::conectar();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $idusuario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}