<div class="modal fade" id="modal-categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="categoria-salvar.php">
        <input type="hidden" name="id" value="0" />
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header wecash-modal-bg">
                    <h5 class="modal-title" id="exampleModalLabel">Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="categoria-descricao-text-input" class="col-2 col-form-label">Descrição:</label>
                        <div class="col-10">
                            <input class="form-control" name="descricao" type="text" placeholder="Habitação" id="categoria-descricao-text-input">
                        </div>
                    </div>
                    <hr />
                    <div class="form-group row">
                        <div  class="col-2"><label>Tipo:</label></div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="tipo" id="gridRadios1" value="C" />
                                    Crédito
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="tipo" id="gridRadios2" value="D" />
                                    Débito
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer wecash-modal-bg">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>