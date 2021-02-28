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
                    <input type="hidden" id="equipo_id" name="equipo_id">

                    <div class="form-group">
                        <label class="form-label" for="codigo_bien">Codigo Bien</label>
                        <input type="text" class="form-control" id="codigo_bien" name="codigo_bien" placeholder="Ingrese Nombre" required>
                    </div>

                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleInput">Marca</label>
                        <select id="marca_id" name="marca_id" class="form-control">

                        </select>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleInput">Personal</label>
                        <select id="personal_id" name="personal_id" class="form-control">

                        </select>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleInput">Equipo</label>
                        <select id="tipoequipo_id" name="tipoequipo_id" class="form-control">

                        </select>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleInput">Area</label>
                        <select id="area_id" name="area_id" class="form-control">

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