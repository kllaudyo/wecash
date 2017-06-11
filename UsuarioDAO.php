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

    public function buscarUsuario($email, $senha)
    {
        $database_query = "
          select u.id_usuario,
                 u.nm_usuario,
                 u.nm_email,
                 u.id_empresa
            from tb_usuarios u 
           where u.nm_email = ?
             and u.nm_senha = ? ";

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

    public function buscarUsuarios($empresa)
    {
        if(!$empresa instanceof Empresa){
            throw new Exception("O parametro precisa ser um objeto Empresa");
        }

        $database_query = "
          select u.id_usuario,
                 u.nm_usuario,
                 u.nm_email
            from tb_usuarios u 
           where u.id_empresa = ? ";

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

}