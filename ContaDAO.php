<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 11/06/17
 * Time: 11:17
 */
class ContaDAO
{
    private $connection;

    public function __construct($connection)
    {
        if(!$connection instanceof PDO)
        {
            throw new Exception("O parametro precisa ser um objeto PDO");
        }
        $this->connection = $connection;
    }

    public function buscarPorId($id)
    {
        $database_query = "
            SELECT c.id_empresa,
                   c.id_conta,
                   c.nm_conta
              FROM tb_contas c
             WHERE c.id_conta = ?
        ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($id));

        if($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
        {
            $conta = new Conta();
            $empresa = new Empresa();

            $conta->setId($row["id_conta"]);
            $conta->setDescricao($row["nm_conta"]);
            $empresa->setId($row["id_empresa"]);
            $conta->setEmpresa($empresa);

            return $conta;
        }
        return null;
    }

    public function buscarPorEmpresa($empresa)
    {
        if(!$empresa instanceof Empresa)
        {
            throw new Exception("O parametro precisa ser um objeto Empresa");
        }

        $database_query = "
            SELECT c.id_empresa,
                   c.id_conta,
                   c.nm_conta
              FROM tb_contas c
             WHERE c.id_empresa = ?
        ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($empresa->getId()));

        $contas = array();

        while($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
        {
            $conta = new Conta();
            $empresa = new Empresa();

            $conta->setId($row["id_conta"]);
            $conta->setDescricao($row["nm_conta"]);
            $empresa->setId($row["id_empresa"]);
            $conta->setEmpresa($empresa);

            array_push($contas, $conta);
        }

        return $contas;
    }

    public function adicionar($conta)
    {
        if(!$conta instanceof Conta)
        {
            throw new Exception("O parametro precisa ser um objeto Conta");
        }

        $database_query = "
            INSERT INTO tb_contas
            (id_empresa, nm_conta)
            VALUES 
            (?,?)
        ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($conta->getEmpresa()->getId(), $conta->getDescricao()));

        return $database_prepare->rowCount();
    }

    public function alterar($conta)
    {
        if(!$conta instanceof Conta)
        {
            throw new Exception("O parametro precisa ser um objeto Conta");
        }

        $database_query = "
            UPDATE tb_contas
               SET nm_conta = ?
             WHERE id_conta = ?
        ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($conta->getDescricao(), $conta->getId()));

        return $database_prepare->rowCount();
    }

    public function remover($conta)
    {
        if(!$conta instanceof Conta)
        {
            throw new Exception("O parametro precisa ser um objeto Conta");
        }

        $database_query = "DELETE FROM tb_contas WHERE id_conta = ? ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($conta->getId()));

        return $database_prepare->rowCount();
    }
}