<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 12:12
     */

    function import($class_name)
    {
        include($class_name.".php");
    }

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    spl_autoload_register("import");