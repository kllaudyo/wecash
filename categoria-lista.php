<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 17:33
     */
    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";
    controle_acesso();
    require_once "head.php";

    $dao = new CategoriaDAO($database_connection);
    $categorias = $dao->buscarPorEmpresa(empresa());

?>
    <br />
    <h4>Categoria</h4>
    <br />
<?php
    if(count($categorias) == 0):
?>
    <p class="alert alert-warning" role="alert">
        <strong>Ops...</strong> Ainda não há categorias cadastradas, registre um agora mesmo clicando em adicionar
    </p>
<?php
    else:
?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th colspan="4">Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($categorias as $categoria):
            ?>
            <tr>
                <td>
                <?php
                    if($categoria->getTipo()=="C"){
                        print "<img src=\"images/redo.png\" />";
                    }elseif($categoria->getTipo()=="D"){
                        print "<img src=\"images/undo.png\" />";
                    }
                ?>
                </td>
                <td class="col-sm-6"><?=$categoria->getDescricao();?></td>
                <td><img src="images/pencil.png" /></td>
                <td>
                    <form class="form-inline" method="post" action="categoria-remover.php">
                        <input type="hidden" name="id" value="<?=$categoria->getId();?>" />
                        <input type="image" src="images/close-circle.png" />
                    </form>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
<?php
    endif;
    require_once "foot.php";
?>
