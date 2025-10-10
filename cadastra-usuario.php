<?php
session_start();
require "src/UsuarioDAO.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    UsuarioDAO::cadastrarUsuario($_POST, $_FILES['foto']);
    $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
    header("Location: login.php");
    exit;
}
?>