<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="departamento_id" name="departamento_id">

                    <div class="form-group">
                        <label class="form-label" for="departamento_nombre">Departamento</label>
                        <input type="text" class="form-control" id="departamento_nombre" name="departamento_nombre" placeholder="Ingrese Nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="departamento_descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="departamento_descripcion" name="departamento_descripcion" placeholder="Ingrese Nombre" required>
                    </div>
                    

                  

                    <!-- <div class="form-group">
                        <label class="form-label" for="rol_id">Rol</label>
                        <select class="select2" id="rol_id" name="rol_id">
                            <option value="1">Usuario</option>
                            <option value="2">Soporte</option>
                        </select>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>