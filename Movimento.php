<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 11/06/17
 * Time: 11:08
 */
class Movimento
{
    private $id;
    private $conta;
    private $categoria;
    private $descricao;
    private $data_previsao;
    private $data_confirmacao;
    private $valor;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getConta()
    {
        return $this->conta;
    }

    public function setConta($conta)
    {
        $this->conta = $conta;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDataPrevisao()
    {
        return $this->data_previsao;
    }

    public function setDataPrevisao($data_previsao)
    {
        $this->data_previsao = $data_previsao;
    }

    public function getDataConfirmacao()
    {
        return $this->data_confirmacao;
    }

    public function setDataConfirmacao($data_confirmacao)
    {
        $this->data_confirmacao = $data_confirmacao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }


}