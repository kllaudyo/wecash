<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 11/06/17
 * Time: 11:17
 */
class MovimentoDAO
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
            SELECT mov.id_movimento,
                   mov.ds_movimento,
                   mov.dt_previsao,
                   mov.dt_confirmacao,
                   mov.vl_movimento,
                   cat.id_categoria,
                   cat.nm_categoria,
                   cnt.id_conta,
                   cnt.nm_conta
              FROM tb_movimentos mov
                  ,tb_categorias cat
                  ,tb_contas cnt
             WHERE mov.id_conta = cnt.id_conta
               AND mov.id_categoria = cat.id_categoria
               AND mov.id_movimento = ?
            ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($id));

        if($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
        {
            $movimento = new Movimento();
            $categoria = new Categoria();
            $conta = new Conta();

            $categoria->setId($row["id_categoria"]);
            $categoria->setDescricao($row["nm_categoria"]);

            $conta->setId($row["id_conta"]);
            $conta->setDescricao($row["nm_conta"]);

            $movimento->setId($row["id_movimento"]);
            $movimento->setDescricao($row["ds_movimento"]);
            $movimento->setDataPrevisao($row["dt_previsao"]);
            $movimento->setDataConfirmacao($row["dt_confirmacao"]);
            $movimento->setValor($row["vl_movimento"]);
            $movimento->setCategoria($categoria);
            $movimento->setConta($conta);

            return $movimento;
        }
        return null;
    }

    public function buscarPorEmpresaMesAno($empresa, $mes, $ano)
    {
        if(!$empresa instanceof Empresa)
        {
            throw new Exception("O parametro precisa ser um objeto Empresa");
        }

    }

    public function adicionar($movimento)
    {
        if(!$movimento instanceof Movimento)
        {
            throw new Exception("O parametro precisa ser um objeto Movimento");
        }

        $database_query = "
                INSERT INTO tb_movimentos
                (id_conta, id_categoria, ds_movimento, dt_previsao, dt_confirmacao, vl_movimento)
                VALUES 
                (?,?,?,?,?,?)
            ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(
            array(
                $movimento->getConta()->getId(),
                $movimento->getCategoria()->getId(),
                $movimento->getDescricao(),
                $movimento->getDataPrevisao(),
                $movimento->getDataConfirmacao(),
                $movimento->getValor()
            )
        );

        return $database_prepare->rowCount();
    }

    public function alterar($movimento)
    {
        if(!$movimento instanceof Movimento)
        {
            throw new Exception("O parametro precisa ser um objeto Movimento");
        }

        $database_query = "
                UPDATE tb_movimentos
                   SET id_conta = ?, 
                       id_categoria = ?, 
                       ds_movimento = ?, 
                       dt_previsao = ?, 
                       dt_confirmacao = ?, 
                       vl_movimento = ?
                 WHERE id_movimento = ?
            ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(
            array(
                $movimento->getConta()->getId(),
                $movimento->getCategoria()->getId(),
                $movimento->getDescricao(),
                $movimento->getDataPrevisao(),
                $movimento->getDataConfirmacao(),
                $movimento->getValor(),
                $movimento->getId()
            )
        );

        return $database_prepare->rowCount();
    }

    public function remover($movimento)
    {
        if(!$movimento instanceof Movimento)
        {
            throw new Exception("O parametro precisa ser um objeto Movimento");
        }

        $database_query = "DELETE FROM tb_movimentos WHERE id_movimento = ? ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($movimento->getId()));

        return $database_prepare->rowCount();
    }
}