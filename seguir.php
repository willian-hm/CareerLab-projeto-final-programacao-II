<?php
    include("incs/valida-sessao.php");
    require_once "src/SeguidoDAO.php";
if (isset($_GET["idseguido"])) {
        SeguidoDAO::seguir($_SESSION["idusuario"], $_GET["idseguido"]);
    }
    header("Location:home.php");