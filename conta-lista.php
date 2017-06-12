<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 20:59
     */
    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";
    controle_acesso();
    require_once "head.php";

    $dao = new ContaDAO($database_connection);
    $contas = $dao->buscarPorEmpresa(empresa());

?>
    <br />
    <h4>Contas</h4>
    <br />
<?php
    if(count($contas) == 0):
?>
    <p class="alert alert-warning" role="alert">
        <strong>Ops...</strong> Ainda não há contas cadastradas, registre um agora mesmo clicando em adicionar
    </p>
<?php
    else:
?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th colspan="3">Descrição</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($contas as $conta):
        ?>
            <tr>
                <td class="col-sm-7"><?=$conta->getDescricao();?></td>
                <td><img src="images/pencil.png" /></td>
                <td>
                    <form class="form-inline" method="post" action="conta-remover.php">
                        <input type="hidden" name="id" value="<?=$conta->getId();?>" />
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
