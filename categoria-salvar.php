<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 18:29
     */

    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";

    controle_acesso();

    $url = str_replace($origin = $_SERVER["HTTP_ORIGIN"] ."/", "", $_SERVER["HTTP_REFERER"]);

    if(isset($_POST))
    {
        $dao = new CategoriaDAO($database_connection);

        $categoria = new Categoria();
        $categoria->setDescricao($_POST["descricao"]);
        $categoria->setTipo($_POST["tipo"]);
        $categoria->setEmpresa(empresa());

        if($_POST["id"]!="0")
        {
            $categoria->setId($_POST["id"]);
            $dao->alterar($categoria);
        }
        else
        {
            $dao->adicionar($categoria);
        }
    }

    header("Location: $url");
