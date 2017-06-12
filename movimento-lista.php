<?php
    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 11/06/17
     * Time: 21:41
     */

    require_once "Settings.php";
    require_once "Acesso.php";
    require_once "Database.php";
    controle_acesso();
    require_once "head.php";
?>
    <br />
    <h4>Movimentações</h4>
    <br />
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="#">Janeiro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Fevereiro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Março</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Abril</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Maio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Junho</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Julho</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Agosto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Setembro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Outubro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Novembro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Dezembro</a>
        </li>
    </ul>
    <br />
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Previsão</th>
            <th>Confirmação</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>Habitação</td>
            <td>Parcela do apartamento</td>
            <td>R$ 3.500,00</td>
            <td>11/04/2017</td>
            <td>11/04/2017</td>
        </tr>
        </tbody>
    </table>
<?php
    require_once "foot.php";
?>