
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-stethoscope modal-icon"></i>
                <h4 class="modal-title" id='modaltabconsultamedicatitulo1'>PROCEDIMIENTO</h4>
                <small id='modaldientetitulo2'></small>

            </div>
            <div class="modal-body">
                <select class="form-control select2" style="width: 100%;" name="cboEnfermedad">
                    <?php
                        while ($row = $resultadodienteprocedimiento->fetch_assoc()) {
                            echo "<option value = '" . $row['IdDienteProcedimiento'] . "'>" . $row['DescripcionProcedimiento'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="">Guardar</button>
            </div>
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
                <h4 class="modal-title" id='modaltabnuevaconsultamedica13'></h4>
                <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
            </div>
            <form class="form-horizontal" method="POST" action="../../views/consultamedico/actualizarconsulta.php" id="demo-form" data-parsley-validate="">
                <div class="modal-body">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#MDLDIAGNOSTICOMEDICO1" id='modaltabnuevaconsultamedica1'></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="MDLDIAGNOSTICOMEDICO1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#MDLDIAGMED1">PANEL 1</a></li>
                                            <li class=""><a data-toggle="tab" href="#MDLDIAGMED2">PANEL 2</a></li>
                                            <li class=""><a data-toggle="tab" href="#MDLDIAGMED3">PANEL 3</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="MDLDIAGMED1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="hidden">
                                                            <textarea type="text" rows="4" class="form-control" name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                                                        </div>
                                                        <div class="hidden">
                                                            <textarea type="text" rows="4" class="form-control" name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                                                        </div>
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica2'></label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                                <textarea type="text" rows="1" class="form-control" id="enfermedads" name="txtDiagnostico" required="">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica3'> </label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" class="form-control" id="estadonutricions" name="txtEstadoNutriconal" required="">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica4'></label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" id="alergiass" class="form-control" name="txtAlergiass" required="">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica5'> </label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" id="cirugiaspreviass" class="form-control" name="txtCirugiasPrevias" required="">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="MDLDIAGMED2" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica6'> </label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" id="medicamentotomados" class="form-control" name="txtMedicamentosTomados">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica7'> Fisica</label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" id="examenfisicas" class="form-control" name="txtExamenFisica">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica8'></label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <select class="form-control select2" style="width: 100%;" name="cboEnfermedad">
                                                                    <?php
                                                                    if ($_SESSION['IdIdioma'] == 1) {
                                                                        while ($row = $resultadotablaenfermedad->fetch_assoc()) {
                                                                            echo "<option value = '" . $row['IdEnfermedad'] . "'>" . $row['Nombre'] . "</option>";
                                                                        }
                                                                    } else {
                                                                        while ($row = $resultadotablaenfermedad2->fetch_assoc()) {
                                                                            echo "<option value = '" . $row['IdEnfermedad'] . "'>" . $row['Nombre'] . "</option>";
                                                                        }
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica9'></label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="5" class="form-control" id="comentarioss" name="txtComentarios"" >  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="MDLDIAGMED3" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica10'> </label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" class="form-control" id="otross" name="txtOtros" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica11'></label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <textarea type="text" rows="2" id="plantratamientos" class="form-control" name="txtPlanTratamiento">  </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica12'> </label></div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaProxima" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="guardarConsulta">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>