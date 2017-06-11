<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 19:12
     */

    session_start();

    function login($usuario)
    {
        if(!$usuario instanceof Usuario)
        {
            throw new Exception("O parametro precisa ser um objeto Usuario");
        }
        $_SESSION["usuario"] = $usuario;
    }

    function logout()
    {
        session_destroy();
    }

    function is_logado()
    {
        return isset($_SESSION["usuario"]);
    }

    function usuario()
    {
        return $_SESSION["usuario"];
    }

    function empresa()
    {
        return usuario()->getEmpresa();
    }

    function controle_acesso()
    {
        if(!is_logado()){
            header("Location: index.php?acessoNegado=1");
            die();
        }
    }
