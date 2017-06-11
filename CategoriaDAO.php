<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 11/06/17
 * Time: 11:17
 */
class CategoriaDAO
{
    private $database_connection;

    public function __construct($database_connection)
    {
        $this->database_connection = $database_connection;
    }
}