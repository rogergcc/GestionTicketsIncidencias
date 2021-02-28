<?php
    if ($_SESSION["rol_id"]==1){
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\NuevoTicket\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Nuevo Incidencia</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\ConsultarTicket\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Consultar Incidencias</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }else{
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\MntMarca\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mantenimiento Marca</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\MntEquipo\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mantenimiento Equipo</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\MntDepartamento\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mantenimiento Departamento</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="..\MntUsuario\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mantenimiento Usuario</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\MntTrabajador\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mantenimiento Trabajador</span>
                        </a>
                    </li>

                    
                    <li class="blue-dirty">
                        <a href="..\ConsultarTicket\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Consultar Incidencias</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }
?>
