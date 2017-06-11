<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 11/06/17
 * Time: 11:11
 */
class Empresa
{
    private $id;
    private $nome;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

}