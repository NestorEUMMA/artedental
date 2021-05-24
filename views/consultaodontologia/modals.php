
<!-- MODAL CARGAR CONSULTA -->
<div class="modal inmodal" id="modalCargarConsulta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id='modaltabconsultamedicatitulo1'>FICHA GENERAL DE CONSULTA</h4>
                <small id='modaltabconsultamedicatitulo2'>FICHA DE CONSULTA</small>
            </div>
            <div class="modal-body">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#MDLCONSULT1" id='modaltabconsultamedica1'>FICHA</a></li>
                    </ul>
                    <form class="form-horizontal">
                        <div class="tab-content">
                            <div id="MDLCONSULT1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="form-group hidden">
                                        <div class="col-sm-5"><input type="text" name="txtIdConsulta" id="idconsulta"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica7'>Paciente</label></div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" class="form-control" disabled="disabled" id="pacientes" name="txtPaciente" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica8'>Medico</label></div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                <input type="text" class="form-control" disabled="disabled" id="medicos" name="txtMedico" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica9'>Especialidad</label></div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                <input type="text" class="form-control" disabled="disabled" id="modulos" name="txtMedico" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica10'>Fecha</label></div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control" disabled="disabled" id="fechas" name="txtfecha" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modalCargarDiente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id='modaltabconsultamedicatitulo1'>PROCEDIMIENTO</h4>
                <small id=''></small>

            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" action="../../views/consultaodontologia/actualizarortogramadetalle.php" id="demo-form" data-parsley-validate="">
                <div class="form-group">
                    <div class="hidden">
                        IDPERSONA
                        <textarea type="text" rows="4" class="form-control" name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                    </div>
                    <div class="hidden">
                        IDCONSULTA
                        <textarea type="text" rows="4" class="form-control" name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                    </div>
                    <div class="hidden">
                        IDDIENTEORTOGRAMA
                        <textarea type="text" rows="4" class="form-control" name="txtIdDienteOrtograma"> <?php echo $IdDienteOrtograma ?> </textarea>
                    </div>
                    <div class="hidden">
                        IDDIENTEORTOGRAMADETALLE
                        <textarea type="text" rows="4" class="form-control" id='modaldientetitulo2' name="txtidortogramadetalle"> </textarea>
                    </div>
                    <div class="col-sm-3"><label for="inputEmail3" class="control-label" id=''>PROCEDIMIENTO</label></div>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            <select class="form-control select2" style="width: 100%;" name="cboProcedimiento">
                                <?php
                                    while ($row = $resultadodienteprocedimiento->fetch_assoc()) {
                                        echo "<option value = '" . $row['IdDienteProcedimiento'] . "'>" . $row['DescripcionProcedimiento'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA GUARDAR PLAN DE TRATAMIENTO -->
<div class="modal inmodal" id="modalGuardarPlantratamiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="../../views/consultaodontologia/guardarplantratamiento.php" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
                    <div class="hidden">
                        IDPERSONA
                        <textarea type="text" rows="4" class="form-control" name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                    </div>
                    <div class="hidden">
                        IDCONSULTA
                        <textarea type="text" rows="4" class="form-control" name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <?php
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th id=''>N°</th>";
                        echo "<th id=''>PROCEDIMIENTO</th>";
                        echo "<th id=''>DIENTE</th>";
                        echo "<th id=''>POSICION</th>";
                        echo "<th id=''>PRECIO</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $nr = 0;
                        while ($row = $resultadotablaplantratamiento->fetch_assoc()) {
                            $nr ++;
                            echo "<tr>";
                            echo "<td> <input type='hidden' name=''>" .$nr. "</td>";
                            echo "<td> <input type='hidden' value='". $row['DescripcionProcedimiento'] ."' name='DescripcionProcedimiento[]'>"  . $row['DescripcionProcedimiento'] . "</td>";
                            echo "<td> <input type='hidden' value='". $row['Diente'] ."' name='Diente[]'>" . $row['Diente'] . "</td>";
                            echo "<td> <input type='hidden' value='". $row['NombrePosicion']."' name='NombrePosicion[]'>" . $row['NombrePosicion'] . "</td>";
                            echo "<td><input type='text'   name='Valor[]' class='form-control name_list'/></td></tr>";
                        }
                        echo "</tr>";
                        echo "</body>  ";
                        ?>
                    </table>
                    <div class="">
                        <textarea type="text" rows="6" id="" class="form-control" name="txtComentarios">  </textarea>
                    </div>                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA CARGAR PLAN DE TRATAMIENTO -->
<div class="modal inmodal" id="modalCargarHistoricoPlanTratamiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>VER PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
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
                <br>
                <div class="">
                        <textarea type="text" rows="6" disabled="disabled" id="comentarioplantratamiento" class="form-control" name="txtComentarios">  </textarea>
                    </div>              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
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
                <i class="fa fa-trash modal-icon"></i>
                <h4 class="modal-title" id=''>ELIMINAR PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="../../views/consultaodontologia/eliminarplantratamiento.php" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
                    <div class="hidden">
                        IDCONSULTA
                        <textarea type="text" rows="4" class="form-control" name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                    </div>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Eliminar</button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA GUARDAR DIAGNOSTICO -->
<div class="modal inmodal" id="modalGuardarDiagnostico" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>FICHA GENERAL DE CONSULTA</h4>
                <small id=''>PACIENTE:</small><small> <?php echo $idpersona; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="../../views/consultaodontologia/actualizarconsulta.php" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
                <div class="form-group">
                        <div class="hidden">
                            <textarea type="text" rows="4" class="form-control" name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                        </div>
                        <div class="hidden">
                            <textarea type="text" rows="4" class="form-control" name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                        </div>
                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id=''>Diagnostico</label></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <textarea type="text" id="diagnostico" rows="1" class="form-control" name="txtDiagnostico" required=""> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id=''>Comentarios</label></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                <textarea type="text" rows="4" id="comentarios" class="form-control" name="txtComentarios" required=""> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label for="inputEmail3" class="control-label" id=''>Proxima Visita</label></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control" id="txtFechaProxima" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaProxima"  required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Guardar Cambios</button>
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
                <small id=''>PACIENTE:</small><small> <?php echo $idpersona; ?></small>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL PARA IMPRIMIR PLAN DE TRATAMIENTO -->
<div class="modal inmodal" id="modalimprimirHistoricoPlanTratamiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-print modal-icon"></i>
                <h4 class="modal-title" id=''>IMPRIMIR PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="../../reports/expediente/plantratamiento"  target="_blank" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
                    <div class="hidden">
                        IDPLANTRATAMIENTO
                        <textarea type="text" rows="4" class="form-control" name="txtplantratamineto" id="plantratamientoimprimir"></textarea>
                    </div>       
                    <center>
                    ¿Desea imprimir este Plan de Tratamiento?
                    </center>      
                </div>
                <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.location.reload()">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Imprimir</button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

