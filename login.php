<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 19:41
     */

    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $dao = new UsuarioDAO($database_connection);
    $usuario = $dao->buscarPorEmailSenha($email, $senha);

    if($usuario != null)
    {
        login($usuario);
        header("Location: categoria-lista.php");
        die();
    }

    controle_acesso();
