<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 21:30
     */

    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";
    controle_acesso();

    if(isset($_POST["id"]))
    {
        $id = trim($_POST["id"]);
        if(strlen($id)>0)
        {
            $dao = new ContaDAO($database_connection);
            $dao->remover($dao->buscarPorId($id));
        }
    }

    header("Location: conta-lista.php");
