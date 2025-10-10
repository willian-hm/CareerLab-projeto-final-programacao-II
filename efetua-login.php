<?php
    session_start();
    require_once "src/UsuarioDAO.php";

    if ($idusuario = UsuarioDAO::validarUsuario($_POST)){    
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nome'] = $idusuario['nome'];
        $_SESSION['idusuario'] = $idusuario;
        header("Location:home.php");
    }else{
        $_SESSION['msg'] = "Usuário ou senha inválido.";    
        header("Location:login.php");
    }
?>