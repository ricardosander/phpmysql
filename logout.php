<?php
require_once("logica-usuario.php");
logout();
session_start();
$_SESSION['success'] = "Deslogado com sucesso!";
header("Location: index.php");