<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 12:12
     */

    function debug($resource)
    {
        print "<pre>";
        print_r($resource);
        print "</pre>";
    }

    function server()
    {
        debug($_SERVER);
    }

    function get()
    {
        debug($_GET);
    }

    function post()
    {
        debug($_POST);
    }

    function session()
    {
        debug($_SESSION);
    }

    function cookie()
    {
        debug($_COOKIE);
    }

    function import($class_name)
    {
        include($class_name.".php");
    }

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    spl_autoload_register("import");