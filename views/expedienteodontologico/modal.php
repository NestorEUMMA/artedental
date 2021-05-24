

<!-- MODAL PARA CARGAR PLAN DE TRATAMIENTO -->
<div class="modal inmodal" id="modalCargarHistoricoPlanTratamiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>VER PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $nombrecompleto; ?></small>
            </div>
            
                <div class="modal-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Procedimiento</th>
                        <th>Diente</th>
                        <th>Posicion</th>
                        <th>Precio</th>
                    </tr>
                    </thead>
                    <tbody id="DataResult">
                    
                    </tbody>
                </table>
                <div class="">
                        <textarea type="text" rows="6" disabled="disabled" id="comentarioplantratamiento" class="form-control" name="txtComentarios">  </textarea>
                    </div>               
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>

<!-- MODAL PARA ELIMINAR PLAN DE TRATAMIENTO -->
<div class="modal inmodal" id="modalEliminarHistoricoPlanTratamiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>ELIMINAR PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $nombrecompleto; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="../../views/consultaodontologia/eliminarplantratamiento.php" id="demo-form" data-parsley-validate="">
                <div class="modal-body">

                    <div class="hidden">
                        IDPLANTRATAMIENTO
                        <textarea type="text" rows="4" class="form-control" name="txtplantratamineto" id="plantratamiento"></textarea>
                    </div>       
                    <center>
                    ¿Desea eliminar este Plan de Tratamiento?
                    </center>      
                </div>
                <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Eliminar</button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA CARGAR DIAGNOSTICO -->
<div class="modal inmodal" id="modalCargarDiagnostico" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>FICHA GENERAL DE CONSULTA</h4>
                <small id=''>PACIENTE:</small><small> <?php echo $nombrecompleto; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
                <div class="form-group">
                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id=''>Diagnostico</label></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <textarea type="text" id="cargardiagnostico" disabled="disabled" rows="1" class="form-control" name="txtDiagnostico" required=""> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id=''>Comentarios</label></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                <textarea type="text" rows="10" id="cargarcomentarios" disabled="disabled" class="form-control" name="txtComentarios" required=""> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id=''>Proxima Visita</label></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control" id="cargartxtFechaProxima" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaProxima"  required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>