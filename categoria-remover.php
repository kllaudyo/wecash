<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 20:40
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
            $dao = new CategoriaDAO($database_connection);
            $dao->remover($dao->buscarPorId($id));
        }
    }

    header("Location: categoria-lista.php");

