<div class="modal fade" id="modal-movimentacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header wecash-modal-bg">
                <h5 class="modal-title" id="exampleModalLabel">Movimentação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="conta-text-input" class="col-2 col-form-label"><strong>Conta:</strong></label>
                    <div class="col-10">
                        <?php
                            if(isset($database_connection)):
                                $dao = new ContaDAO($database_connection);
                                $contas = $dao->buscarPorEmpresa(empresa());
                        ?>
                            <select class="form-control" name="conta">
                                <?php
                                    foreach ($contas as $conta){
                                        print "<option value='{$conta->getId()}'>{$conta->getDescricao()}</option>";
                                    }
                                ?>
                            </select>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label for="categoria-text-input" class="col-2 col-form-label">Categoria:</label>
                    <div class="col-10">
                        <?php
                        if(isset($database_connection)):
                            $dao = new CategoriaDAO($database_connection);
                            $categorias = $dao->buscarPorEmpresa(empresa());
                            ?>
                            <select class="form-control" name="categoria">
                                <?php
                                foreach ($categorias as $categoria){
                                    print "<option value='{$categoria->getId()}'>{$categoria->getDescricao()}</option>";
                                }
                                ?>
                            </select>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label for="descricao-text-input" class="col-2 col-form-label">Descrição:</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Parcela do apartamento" id="descricao-text-input">
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label class="col-2 col-form-label">Datas:</label>
                    <div class="col-5">
                        <input class="form-control" type="text" placeholder="previsto para" id="dataprevisao-date-input">
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" placeholder="confirmado em" id="dataconfirmacao-date-input">
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label for="valor-number-input" class="col-2 col-form-label">Valor</label>
                    <div class="col-10">
                        <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-number-input">
                    </div>
                </div>
            </div>
            <div class="modal-footer wecash-modal-bg">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>