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
                    <input type="hidden" id="tick_id" name="tick_id">

                    <div class="form-group">
                        <label class="form-label" for="tick_titulo">Incendencia</label>
                        <input type="text" disabled class=" form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese Nombre" required>
                    </div>
                   


                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleInput">Cuan Satisfeho esta de la atencion de su incidencia </label>
         
                        <select id="puntuacion" name="puntuacion" class="form-control">
                            <option  value="0">Eliga un calificacion</option>
                            <option value="5">5. Muy Satisfecho</option>
                            <option value="4">4. Satisfecho</option>
                            <option value="3">3. Ni satisfech ni insatisfecho</option>
                            <option value="2">2. Insatisfecho</option>
                            <option value="1">1. Muy insatisfecho</option>
                        </select>
                    </fieldset>


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