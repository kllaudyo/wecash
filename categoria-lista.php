<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 17:33
     */
    require_once "Settings.php";
    require_once "Acesso.php";
    controle_acesso();

    require_once "Database.php";
    require_once "head.php";

    $dao = new CategoriaDAO($database_connection);
    $categorias = $dao->buscarPorEmpresa(empresa());
?>
    <br />
    <h4>Categoria</h4>
    <br />
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
                <td><img src="images/close-circle.png" /></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>

<?php
    require_once "foot.php";
?>
