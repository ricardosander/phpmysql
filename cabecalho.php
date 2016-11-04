<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/loja.css" />
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Minha Loja</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="produto-formulario.php">Adiciona  Produto</a></li>
                <li><a href="produto-lista.php">Produtos</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="principal">

        <?php
        session_start();
        include("mostra-alerta.php");

        mostraAlerta('success');
        mostraAlerta('danger');