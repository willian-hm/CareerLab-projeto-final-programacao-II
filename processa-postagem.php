
<?php
include "incs/valida-sessao.php";
require_once "src/PostagemDAO.php";

// Verifica se os campos foram enviados
if (isset($_POST['titulo']) && isset($_POST['descricao'])) {
    PostagemDAO::cadastrar($_POST, $_SESSION["idusuario"]);
}

// Redireciona para a página inicial
header("Location: index.php");
exit;
?>
