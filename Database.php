<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 12:00
     */

    try {
        $database_connection = new PDO("sqlite:wecash.db");
    }
    catch (PDOException $e)
    {
        print "Não foi possível conectar no banco de dados. " . $e->getMessage();
        die();
    }