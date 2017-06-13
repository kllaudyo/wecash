<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 21:15
     */

    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";

    controle_acesso();

    $url = str_replace($_SERVER["HTTP_ORIGIN"] ."/", "", $_SERVER["HTTP_REFERER"]);

    if(isset($_POST))
    {
        $dao = new ContaDAO($database_connection);

        $conta = new Conta();
        $conta->setEmpresa(empresa());
        $conta->setDescricao($_POST["descricao"]);
        if($_POST["id"]!="0")
        {
            $conta->setId($_POST["id"]);
            $dao->alterar($conta);
        }
        else
        {
            $dao->adicionar($conta);
        }
    }

    header("Location: $url");