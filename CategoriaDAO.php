<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 11:17
     */
    class CategoriaDAO
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
                       c.id_categoria,
                       c.nm_categoria,
                       c.tp_categoria
                  FROM tb_categorias c
                 WHERE c.id_categoria = ?
            ";

            $database_prepare = $this->connection->prepare($database_query);
            $database_prepare->execute(array($id));

            if($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
            {
                $categoria = new Categoria();
                $empresa = new Empresa();

                $categoria->setId($row["id_categoria"]);
                $categoria->setDescricao($row["nm_categoria"]);
                $categoria->setTipo($row["tp_categoria"]);
                $empresa->setId($row["id_empresa"]);
                $categoria->setEmpresa($empresa);

                return $categoria;
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
                       c.id_categoria,
                       c.nm_categoria,
                       c.tp_categoria
                  FROM tb_categorias c
                 WHERE c.id_empresa = ?
            ";

            $database_prepare = $this->connection->prepare($database_query);
            $database_prepare->execute(array($empresa->getId()));

            $categorias = array();

            while($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
            {
                $categoria = new Categoria();
                $empresa = new Empresa();

                $categoria->setId($row["id_categoria"]);
                $categoria->setDescricao($row["nm_categoria"]);
                $categoria->setTipo($row["tp_categoria"]);
                $empresa->setId($row["id_empresa"]);
                $categoria->setEmpresa($empresa);

                array_push($categorias, $categoria);
            }

            return $categorias;
        }

        public function adicionar($categoria)
        {
            if(!$categoria instanceof Categoria)
            {
                throw new Exception("O parametro precisa ser um objeto Categoria");
            }

            $database_query = "
                INSERT INTO tb_categorias
                (id_empresa, nm_categoria, tp_categoria)
                VALUES 
                (?,?,?)
            ";

            $database_prepare = $this->connection->prepare($database_query);
            $database_prepare->execute(array($categoria->getEmpresa()->getId(), $categoria->getDescricao(), $categoria->getTipo()));

            return $database_prepare->rowCount();
        }

        public function alterar($categoria)
        {
            if(!$categoria instanceof Categoria)
            {
                throw new Exception("O parametro precisa ser um objeto Categoria");
            }

            $database_query = "
                UPDATE tb_categorias
                   SET nm_categoria = ?
                      ,tp_categoria = ?
                 WHERE id_categoria = ?
            ";

            $database_prepare = $this->connection->prepare($database_query);
            $database_prepare->execute(array($categoria->getDescricao(), $categoria->getTipo(), $categoria->getId()));

            return $database_prepare->rowCount();
        }

        public function remover($categoria)
        {
            if(!$categoria instanceof Categoria)
            {
                throw new Exception("O parametro precisa ser um objeto Categoria");
            }

            $database_query = "DELETE FROM tb_categorias WHERE id_categoria = ? ";

            $database_prepare = $this->connection->prepare($database_query);
            $database_prepare->execute(array($categoria->getId()));

            return $database_prepare->rowCount();
        }
    }