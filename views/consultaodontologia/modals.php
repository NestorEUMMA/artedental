
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA GUARDAR DIAGNOSTICO -->
<div class="modal inmodal" id="modalGuardarDiagnostico" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id=''>PLAN DE TRATAMIENTO</h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
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
                            echo "<td> <input type='hidden' value='". $row['DescripcionProcedimiento'] ."' name='DescripcionProcedimiento[".$nr."]'>"  . $row['DescripcionProcedimiento'] . "</td>";
                            echo "<td> <input type='hidden' value='". $row['Diente'] ."' name='Diente[".$nr."]'>" . $row['Diente'] . "</td>";
                            echo "<td> <input type='hidden' value='". $row['Posicion']."' name='Posicion[".$nr."]'>" . $row['Posicion'] . "</td>";
                            echo "<td contenteditable='true'><input name='Valor' class='form-control'></td></tr>";
                        }
                        echo "</tr>";
                        echo "</body>  ";
                        ?>
                    </table>                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>