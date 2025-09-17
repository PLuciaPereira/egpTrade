
<div class="modal" id="modalAdvertencia<?php echo $row['nroCliente']?>" tabindex="-1" style="font-size: 20px; font-family: Poppins;">
    <div class="modal-dialog"   style="border: 3px; border-color:red">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <p>¿Está seguro que desea eliminar este cliente?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form action="eliminar-cliente.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $row['nroCliente']; ?>">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>
        </div>
    </div>
</div>  