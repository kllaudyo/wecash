<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style>
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }
        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        .bd-footer{padding:4rem 0;margin-top:4rem;font-size:85%;text-align:center;background-color:#f7f7f7}
        .bd-footer a{font-weight:500;color:#464a4c}
        .bd-footer a:hover{color:#0275d8}
        .bd-footer p{margin-bottom:0}@media (min-width:576px){.bd-footer{text-align:left}}.bd-footer-links{padding-left:0;margin-bottom:1rem}.bd-footer-links li{display:inline-block}.bd-footer-links li+li{margin-left:1rem}.bd-example-row .row+.row{margin-top:1rem}
    </style>
</head>
<body>
<!-- Navbar Top -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse bg-faded">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">WeCa$h</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
<?php
    if(is_logado()):
?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown" style="margin-right: 15px">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Adicionar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#modal-movimentacao">Movimentação</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#modal-conta">Conta</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#modal-categoria">Categoria</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline mr-auto mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Procurar...">
            </form>
            <ul class="navbar-nav my-2 my-lg-0 ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Movimentação <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categoria</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuUsuarioLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Claudio Acioli
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Conta</a>
                        <a class="dropdown-item" href="#">Configurações</a>
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
<?php
    endif;
    if(!is_logado()):
?>
        <form action="login.php" method="post" class="form-inline">
            <!--
            form-control-sm
            btn-sm
            -->
            <input class="form-control mr-sm-2" type="text" placeholder="email" name="email" />
            <input class="form-control mr-sm-2" type="password" placeholder="senha" name="senha" />
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Entrar</button>
        </form>
<?php
    endif;
?>
    </div>
</nav><!-- Navbar Top -->

<!-- Body of page -->
<div class="container" style="padding-top: 70px;">