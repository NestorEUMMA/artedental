<script type="text/javascript">
   $(document).ready(function() {
      $('#modalCargarDiente').on('show.bs.modal', function(e) {
         var id = $(e.relatedTarget).data('id');
         $("#modaldientetitulo2").text(id);
      });


      $(".btn-histver").click(function() {
         var id = $(this).attr("id").replace("btn", "");

         var myData = {
            "id": id
         };
         //alert(myData);
         $.ajax({
            url: "../../views/consultaodontologia/cargarplantratamientoterminado.php",
            type: "POST",
            data: myData,
            dataType: "JSON",
            beforeSend: function() {
               $(this).html("Cargando");
            },
            success: function(data) {
               var htmlText = "";
               var nr = 0;
            for ( var key in data ) {
               nr ++;
               htmlText += "<tr class=''>"; 
               htmlText += "<td>" + data[ key ].Diente + "</td>";
               htmlText += "<td>" + data[ key ].Procedimiento + "</td>";
               htmlText += "<td>" + data[ key ].Posicion + "</td>";
               htmlText += "<td> $" + data[ key ].Precio + "</td>";
               htmlText += "</tr> ";
          }
                  $( "#DataResult" ).append( htmlText );
                  $("#comentarioplantratamiento").val(data[ key ].Comentarios);   
                  $("#modalCargarHistoricoPlanTratamiento").modal("show");
               }
               
         });
      });


      $(".btn-cargarconsulta").click(function() {
         var id = $(this).attr("id").replace("btn", "");
         var myData = {
            "id": id
         };
         //alert(id);
         $.ajax({
            url: "../../views/consultaodontologia/cargarconsulta.php",
            type: "POST",
            data: myData,
            dataType: "JSON",
            beforeSend: function() {
               $(this).html("Cargando");
            },
            success: function(data) {
               $("#cargardiagnostico").val(data.diagnostico);
               $("#cargarcomentarios").val(data.comentarios);
               $("#cargartxtFechaProxima").val(data.FechaProxVisita);
               $("#modalCargarDiagnostico").modal("show");
            }
         });
      });

      $(".btn-btnconsulta").click(function() {
         var id = <?php echo $idconsulta ?>;
         var myData = {
            "id": id
         };
         //alert(id);
         $.ajax({
            url: "../../views/consultaodontologia/cargarconsulta.php",
            type: "POST",
            data: myData,
            dataType: "JSON",
            beforeSend: function() {
               $(this).html("Cargando");
            },
            success: function(data) {
               $("#diagnostico").val(data.diagnostico);
               $("#comentarios").val(data.comentarios);
               $("#txtFechaProxima").val(data.FechaProxVisita);
               $("#modalGuardarDiagnostico").modal("show");
            }
         });
      });

      $('#txtFechaProxima').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "yyyy-mm-dd"
            });


      $(".btn-histeli").click(function() {
         var id = $(this).attr("id").replace("btn", "");
         var myData = {
            "id": id
         };
         $("#plantratamiento").text(id);
         $("#modalEliminarHistoricoPlanTratamiento").modal("show");
         
      });

      $(".btn-imprimir").click(function() {
         var id = $(this).attr("id").replace("btn", "");
         var myData = {
            "id": id
         };
         $("#plantratamientoimprimir").text(id);
         $("#modalimprimirHistoricoPlanTratamiento").modal("show");
         
      });
      


      $('#demo-form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);

         })
         .on('form:submit', function() {
            return true;
         });


      <?php if ($_SESSION['IdIdioma'] == 1) { ?>

         $.post("../../views/consultaodontologia/historicoesp.php", {
               IdFactor: "2",
               IdPersona: "<?php echo $idpersonaid; ?>"
            })
            .done(function(data) {
               $("#historialclinico").html(data);

            });
         $.post("../../views/consultaodontologia/historicoesp.php", {
               IdFactor: "3",
               IdPersona: "<?php echo $idpersonaid; ?>"
            })
            .done(function(data) {
               $("#vacunacion").html(data);

            });

            $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "4",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#gestacion").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "5",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#nacimiento").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "6",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#infancia").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "7",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#amamantamiento").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "8",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#alimentacion").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "9",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#endulzantes").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "10",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#alimentacionnocturna").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "11",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#higienenocturna").html(data);
         });

         $.post( "../../views/consultaodontologia/historicoesp.php", { IdFactor: "12",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#primeravisita").html(data);
         });

         // ENCABEZADO, PRIMER TAB Y BOTON DE FINALIZAR CONSULTA
         $("#encabezadoform1").text('INGRESO DE CONSULTA');
         $("#encabezadoform2").text('INGRESE LOS DATOS REQUERIDOS');
         $("#tabgeneral1").text('CONSULTA');
         $("#tabgeneral2").text('EXPEDIENTE');
         $("#tabgeneral3").text('HISTORIAL');
         $("#tabgeneral4").text('CONSULTA DE MEDICAMENTOS');
         $("#btnfinalizarconsulta").text('FINALIZAR CONSULTA');

         // TAB DE INGRESO DE CONSULTA - FICHA DE CONSULTA

         $("#tab1signosvitales1").text('FICHA DE CONSULTA');
         $("#tab1signosvitales2").text('DATOS GENERALES');
         $("#tab1signosvitales3").text('USO GINECOLOGICO');
         $("#tab1signosvitales4").text('USO PEDIATRICO');
         $("#tab1signosvitales5").text('OTROS');
         $("#tab1signosvitales6").text('DATOS MEDICOS');
         $("#tab1tab1paciente").text('Paciente');
         $("#tab1tab1medico").text('Medico');
         $("#tab1tab1especialidad").text('Especialidad');
         $("#tab1tab1fecha").text('Fecha');
        


         // TAB EXPEDIENTE DATO GENERAL
         $("#tabexpediente19").text('DATO GENERAL');
         $("#tabexpediente20").text('RESPONSABLE');
         $("#tabexpediente21").text('DATO MEDICO');
         $("#tabexpediente22").text('HISTORIAL CLINICO');
         $("#tabexpediente23").text('VACUNACION');
         $("#tabexpediente1").text('Nombres');
         $("#tabexpediente2").text('Apellidos');
         $("#tabexpediente3").text('F. Nacimiento');
         $("#tabexpediente4").text('Genero');
         $("#tabexpediente5").text('Estado Civil');
         $("#tabexpediente6").text('Dui');
         $("#tabexpediente7").text('Direccion');
         $("#tabexpediente8").text('Telefono');
         $("#tabexpediente9").text('Celular');
         $("#tabexpediente10").text('Correo');


         // TAB EXPEDIENTE RESPONSABLE
         $("#tabexpediente11").text('Nombres');
         $("#tabexpediente12").text('Apellidos');
         $("#tabexpediente13").text('Parentesco');
         $("#tabexpediente14").text('Dui Responsable');
         $("#tabexpediente15").text('Telefono');


         // TAB HISTORIAL CONSULTAS
         $("#tab2historial1").text('CONSULTAS');


         // TABLA HISTORIAL CONSULTAS
         $("#tab2historialconsultabla6").text('CONSULTAS PREVIAS');
         $("#tab2historialconsultabla1").text('Fecha');
         $("#tab2historialconsultabla2").text("Nombre de Paciente");
         $("#tab2historialconsultabla3").text('Nombre de Medico');
         $("#tab2historialconsultabla4").text('Especialidad');
         $("#tab2historialconsultabla5").text('Accion');

         // MODAL PARA AGREGAR LA CONSULTA MEDICA DEL DIA
         $("#modaltabnuevaconsultamedica1").text('DATOS MEDICOS');

         $("#modaltabnuevaconsultamedica13").text("FICHA GENERAL DE CONSULTA");
         $("#modaltabnuevaconsultamedica14").text('FICHA DE CONSULTA:');
         $("#modaltabnuevaconsultamedica15").text("Cerrar");
         $("#modaltabnuevaconsultamedica16").text('Guardar Cambios');



      <?php } else { ?>

         $.post("../../views/consultaodontologia/historicoing.php", {
               IdFactor: "2",
               IdPersona: "<?php echo $idpersonaid; ?>"
            })
            .done(function(data) {
               $("#historialclinico").html(data);

            });
         $.post("../../views/consultaodontologia/historicoing.php", {
               IdFactor: "3",
               IdPersona: "<?php echo $idpersonaid; ?>"
            })
            .done(function(data) {
               $("#vacunacion").html(data);

            });

         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "4",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#gestacion").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "5",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#nacimiento").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "6",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#infancia").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "7",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#amamantamiento").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "8",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#alimentacion").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "9",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#endulzantes").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "10",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#alimentacionnocturna").html(data);
         });
      
         $.post( "../../views/consultaodontologia/historicoing.php", { IdFactor: "11",
               IdPersona: "<?php echo $idpersonaid; ?>"})
         .done(function( data ) {
            $("#higienenocturna").html(data);
         });
         // ENCABEZADO, PRIMER TAB Y BOTON DE FINALIZAR CONSULTA
         $("#encabezadoform1").text("ENTRY OF TODAY'S MEDICAL VISIT");
         $("#encabezadoform2").text('ENTER THE DATA REQUIRED');
         $("#tabgeneral1").text("TODAY'S VISIT");
         $("#tabgeneral2").text('PATIENT/FAM HISTORY');
         $("#tabgeneral3").text('PREVIOUS VISITS');
         $("#tabgeneral4").text('INVENTORY OF MEDICINES');
         $("#btnfinalizarconsulta").text('FINISH');

         // TAB DE INGRESO DE CONSULTA - FICHA DE CONSULTA
         $("#tab1signosvitales1").text('DATE OF VISIT');
         $("#tab1signosvitales2").text('GENERAL INFO');
         $("#tab1signosvitales3").text('OB-GYN INFO');
         $("#tab1signosvitales4").text('PEDIATRIC INFO');
         $("#tab1signosvitales5").text('OTHER');
         $("#tab1signosvitales6").text('MEDICAL INFO');
         $("#tab1tab1paciente").text("Patient's name");
         $("#tab1tab1medico").text('Physician');
         $("#tab1tab1especialidad").text('Type of visit');
         $("#tab1tab1fecha").text('Date');
         $("#tab1tab2peso").text('Weight');
         $("#tab1tab2altura").text('Height');
         $("#tab1tab2temperatura").text('Temperature');
         $("#tab1tab2fr").text('Respiration');
         $("#tab1tab2pulso").text('Pulse');
         $("#tab1tab2presion").text('Blood Pressure');
         $("#tab1tab2glucotex").text('Glucose');
         $("#tab1tab3menstruacion").text('Last Menstrua.');
         $("#tab1tab3pap").text('Last PAP');
         $("#tab1tab3ofc").text('OFC - Occipital Frontal Circumference.');
         $("#tab1tab3hl").text('Height/length');
         $("#tab1tab3w").text('Weight');
         $("#tab1tab5observaciones").text('Observations');
         $("#tab1tab5motivo").text('Reason for Visit');
         $("#btnmodalsignoscerrar").text('Close');


         $("#tab1consultamedica1").text('Illnesses');
         $("#tab1consultamedica2").text('Nutritional state');
         $("#tab1consultamedica3").text('Allergies');
         $("#tab1consultamedica4").text('Previous surgeries');
         $("#tab1consultamedica5").text('Current medications');
         $("#tab1consultamedica6").text('Physical exam');
         $("#tab1consultamedica7").text('Diagnosis');
         $("#tab1consultamedica8").text('Comments');
         $("#tab1consultamedica9").text('Other');
         $("#tab1consultamedica10").text('Treatment plan');
         $("#tab1consultamedica11").text('Next visit');


         $("#tblexamenasignado").text('ORDERS FOR LAB / IMAGING')
         $("#tblexamenasignadoexamen").text('Type of Exam or Image');
         $("#tblexamenasignadomedico").text('Physician');
         $("#tblexamenasignadoindicacion").text('Special instructions');
         $("#tblexamenasignadoaccion").text('Action');

         // TAB EXPEDIENTE DATO GENERAL
         $("#tabexpediente19").text('GENERAL INFORMATION');
         $("#tabexpediente20").text('PARENT/GUARDIAN');
         $("#tabexpediente21").text('MEDICAL INFORMATION');
         $("#tabexpediente22").text('PATIENT/FAMILY HIST');
         $("#tabexpediente23").text('VACCINATIONS');
         $("#tabexpediente1").text("Patient's given names");
         $("#tabexpediente2").text("Patient's last name(s)");
         $("#tabexpediente3").text('Date of Birth');
         $("#tabexpediente4").text('Sex');
         $("#tabexpediente5").text('Civil status');
         $("#tabexpediente6").text('DUI/Government I.D. #');
         $("#tabexpediente7").text('Address');
         $("#tabexpediente8").text('Telephone');
         $("#tabexpediente9").text('Celular');
         $("#tabexpediente10").text('E-mail');

         // TAB EXPEDIENTE RESPONSABLE
         $("#tabexpediente11").text('Given name(s)');
         $("#tabexpediente12").text('Last name(s)');
         $("#tabexpediente13").text('Relationship');
         $("#tabexpediente14").text('DUI/Government I.D. #');
         $("#tabexpediente15").text('Telephone');

         // TAB EXPEDIENTE DATO MEDICO
         $("#tabexpediente16").text('Illnesses');
         $("#tabexpediente17").text('Allergies');
         $("#tabexpediente18").text('Current medications');

         // TAB HISTORIAL CONSULTAS
         $("#tab2historial1").text('PREVIOUS MEDICAL VISIT');
         $("#tab2historial2").text('EXAMS');
         $("#tab2historial3").text('PROCEDURE');

         // TABLA HISTORIAL CONSULTAS
         $("#tab2historialconsultabla6").text('PREVIOUS VISITS');
         $("#tab2historialconsultabla1").text('Date');
         $("#tab2historialconsultabla2").text("Patient's name");
         $("#tab2historialconsultabla3").text('Treated by');
         $("#tab2historialconsultabla4").text('Department');
         $("#tab2historialconsultabla5").text('Action');


      <?php } ?>

   });

    //AQUI COMIENZA CADA ACCION QUE SE REALIZA EN EL ORTOGRAMA
    var arrayPuente = [];
    $(document).ready(function() {
         //createOdontogram();
        //CREACION DE ORTOGRAMA
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 1, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#tr").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 2, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#tl").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 5, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#tlr").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 6, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#tll").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 8, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#blr").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 7, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#bll").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 4, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#br").html(data);
       });
   
       $.post( "../../views/consultaodontologia/ortograma.php", { posicion: 3, IdPersona: "<?php echo $idpersonaid; ?>"})
       .done(function( data ) {
         $("#bl").html(data);
       });
   
    });
</script>