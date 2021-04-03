<!-- Modal Cliente -->
<div class="modal fade" id="modal_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Insira Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row form-group">
                        <input id="cod_prod" class="form-control" type="hidden">
                        <label>Nome Cliente</label>
                        <input id="name_cliente" class="form-control" type="text">
                        <label>CPF</label>
                        <input id="cpf_cliente" class="form-control" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="adicionar_pedido(document.getElementById('name_cliente').value, document.getElementById('cpf_cliente').value, document.getElementById('cod_prod').value)">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "conn/conn.php";
?>
<!-- Modal pedido -->
<div class="modal fade" id="modal_pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Insira Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <select name="cliente" class="form-control" id="cliente">

                        <?php foreach ($result_tb_cliente as $cliente) { ?>
                            <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="finaliza_compra()">Confirmar</button>
                </div>
        </div>
    </div>
</div>