<?php

/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 11/06/17
 * Time: 11:16
 */
class UsuarioDAO
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
          SELECT u.id_usuario,
                 u.nm_usuario,
                 u.nm_email,
                 u.id_empresa
            FROM tb_usuarios u 
           WHERE u.id_usuario = ? ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($id));

        if($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
        {
            $usuario = new Usuario();
            $empresa = new Empresa();
            $empresa->setId($row["id_empresa"]);
            $usuario->setId($row["id_usuario"]);
            $usuario->setNome($row["nm_usuario"]);
            $usuario->setEmail($row["nm_email"]);
            $usuario->setEmpresa($empresa);
            return $usuario;
        }

        return null;
    }

    public function buscarPorEmailSenha($email, $senha)
    {
        $database_query = "
          SELECT u.id_usuario,
                 u.nm_usuario,
                 u.nm_email,
                 u.id_empresa
            FROM tb_usuarios u 
           WHERE u.nm_email = ?
             AND u.nm_senha = ? ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($email, $senha));

        if($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
        {
            $usuario = new Usuario();
            $empresa = new Empresa();
            $empresa->setId($row["id_empresa"]);
            $usuario->setId($row["id_usuario"]);
            $usuario->setNome($row["nm_usuario"]);
            $usuario->setEmail($row["nm_email"]);
            $usuario->setEmpresa($empresa);
            return $usuario;
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
          SELECT u.id_usuario,
                 u.nm_usuario,
                 u.nm_email
            FROM tb_usuarios u 
           WHERE u.id_empresa = ? ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($empresa->getId()));
        $usuarios = array();

        while($row = $database_prepare->fetch(PDO::FETCH_ASSOC))
        {
            $usuario = new Usuario();
            $usuario->setId($row["id_usuario"]);
            $usuario->setNome($row["nm_usuario"]);
            $usuario->setEmail($row["nm_email"]);
            $usuario->setEmpresa($empresa);

            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    public function adicionar($usuario)
    {
        if(!$usuario instanceof Usuario)
        {
            throw new Exception("O parametro precisa ser um objeto Usuario");
        }

        $database_query = "
            INSERT INTO tb_usuarios
            (id_empresa, nm_usuario, nm_email, nm_senha) 
            VALUES
            (?, ?, ?, ?)            
        ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($usuario->getEmpresa()->getId(), $usuario->getNome(), $usuario->getEmail(), $usuario->getSenha()));

        return $database_prepare->rowCount();
    }

    public function alterar($usuario)
    {
        if(!$usuario instanceof Usuario)
        {
            throw new Exception("O parametro precisa ser um objeto Usuario");
        }

        $database_query = "
            UPDATE tb_usuarios u
               SET u.nm_usuario = ?
                  ,u.nm_email = ?
                  ,u.nm_senha = ?
             WHERE u.id_usuario = ?
        ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($usuario->getNome(), $usuario->getEmail(), $usuario->getSenha(), $usuario->getId()));

        return $database_prepare->rowCount();
    }

    public function remover($usuario)
    {
        if(!$usuario instanceof Usuario)
        {
            throw new Exception("O parametro precisa ser um objeto Usuario");
        }

        $database_query = "DELETE FROM tb_usuarios WHERE id_usuario = ? ";

        $database_prepare = $this->connection->prepare($database_query);
        $database_prepare->execute(array($usuario->getId()));

        return $database_prepare->rowCount();
    }

}