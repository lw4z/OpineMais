<?php
session_start();
//unset($_SESSION["nome_usuario"]);
//unset($_SESSION["id_usuario"]);
//unset($_SESSION["mensagem"]);
//session_unset();
//session_destroy();
unset($_SESSION['usuario']);
header("Location:../../home.php");
?>
