$(function () {

    $('#aNombre').on('click', function(){
      if($(this).prop('checked')){
        $('#opt1').removeAttr('hidden');
        $(this).attr('value','true'); 
      } else {
        $('#opt1').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aApellP').on('click', function(){
      if($(this).prop('checked')){
        $('#opt2').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt2').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aApellM').on('click', function(){
      if($(this).prop('checked')){
        $('#opt3').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt3').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aUsuario').on('click', function(){
      if($(this).prop('checked')){
        $('#opt4').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt4').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aPassword').on('click', function(){
      if($(this).prop('checked')){
        $('#opt5').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt5').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aGrado').on('click', function(){
      if($(this).prop('checked')){
        $('#opt6').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt6').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aGrupo').on('click', function(){
      if($(this).prop('checked')){
        $('#opt7').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt7').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aLecturas').on('click', function(){
      if($(this).prop('checked')){
        $('#opt8').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt8').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aAciertos').on('click', function(){
      if($(this).prop('checked')){
        $('#opt9').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt9').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aIncorrectos').on('click', function(){
      if($(this).prop('checked')){
        $('#opt10').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt10').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#aPromedio').on('click', function(){
      if($(this).prop('checked')){
        $('#opt11').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#opt11').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });

    $('#pdfAlumnosForm').submit(function(e) {
        if($('#alumnoFiltro option:selected').val() == 0){
          alert("Selecciona un filtro.");
          e.preventDefault();
        } else {
          $('.create-pdf').attr('disabled','true');
          $('.create-pdf').text('Creando PDF...');
          $('.cancel-pdf').attr('disabled','true');
        }
    });

    //REPORT PROGRESS STUDENTS

    $('#apLecturas').on('click', function(){
      if($(this).prop('checked')){
        $('#optp1').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#optp1').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#apAciertos').on('click', function(){
      if($(this).prop('checked')){
        $('#optp2').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#optp2').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#apIncorrectos').on('click', function(){
      if($(this).prop('checked')){
        $('#optp3').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#optp3').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });
    $('#apPromedio').on('click', function(){
      if($(this).prop('checked')){
        $('#optp4').removeAttr('hidden');
        $(this).attr('value','true');
      } else {
        $('#optp4').attr('hidden','hidden');
        $(this).removeAttr('value'); 
      }
    });

    $('#pdfAlumnosProgressForm').submit(function(e) {
        if($('#alumnopFiltro option:selected').val() == 0){
          alert("Selecciona un filtro.");
          e.preventDefault();
        } else {
          $('.create-pdf').attr('disabled','true');
          $('.create-pdf').text('Creando PDF...');
          $('.cancel-pdf').attr('disabled','true');
        }
    });

    //REPORT LECTURAS
    $('#lTtitulo').on('click', function(){
        if($(this).prop('checked')){
            $('#opt1l').removeAttr('hidden');
            $(this).attr('value','true'); 
        } else {
            $('#opt1l').attr('hidden','hidden');
            $(this).removeAttr('value'); 
        }
    });
    $('#lAutor').on('click', function(){
        if($(this).prop('checked')){
            $('#opt2l').removeAttr('hidden');
            $(this).attr('value','true'); 
        } else {
            $('#opt2l').attr('hidden','hidden');
            $(this).removeAttr('value'); 
        }
    });

    $('#lDescripcion').on('click', function(){
        if($(this).prop('checked')){
            $('#opt3l').removeAttr('hidden');
            $(this).attr('value','true'); 
        } else {
            $('#opt3l').attr('hidden','hidden');
            $(this).removeAttr('value'); 
        }
    });

    $('#lFecha').on('click', function(){
        if($(this).prop('checked')){
            $('#opt4l').removeAttr('hidden');
            $(this).attr('value','true'); 
        } else {
            $('#opt4l').attr('hidden','hidden');
            $(this).removeAttr('value'); 
        }
    });

    $('#lTipo').on('click', function(){
        if($(this).prop('checked')){
            $('#opt5l').removeAttr('hidden');
            $(this).attr('value','true'); 
        } else {
            $('#opt5l').attr('hidden','hidden');
            $(this).removeAttr('value'); 
        }
    });
    
    $('#lReactivos').on('click', function(){
        if($(this).prop('checked')){
            // $('#opt6l').removeAttr('hidden');
            $(this).attr('value','true'); 
        } else {
            // $('#opt6l').attr('hidden','hidden');
            $(this).removeAttr('value'); 
        }
    });

    $('#pdfLecturasForm').submit(function(e) {
        if($('#lecturasFiltro option:selected').val() == 0){
          alert("Selecciona un filtro.");
          e.preventDefault();
        } else {
          $('.create-pdf').attr('disabled','true');
          $('.create-pdf').text('Creando PDF...');
          $('.cancel-pdf').attr('disabled','true');
        }
    });

    //PDF ALUMNO DETAIL

    $('#adLogros').on('click', function(){
        if($(this).prop('checked')){
            $(this).attr('value','true'); 
        } else {
            $(this).removeAttr('value'); 
        }
    });
    $('#adDetalles').on('click', function(){
        if($(this).prop('checked')){
            $(this).attr('value','true'); 
            // $('.more_detail').removeAttr('hidden');
        } else {
            $(this).removeAttr('value'); 
            // $('.more_detail').attr('hidden','hidden');
            // $('#adResultados').removeAttr('value'); 
            // $('#adAprovechamiento').removeAttr('value'); 
            // $('#adResultados').prop('checked',false); 
            // $('#adAprovechamiento').prop('checked',false); 
        }
    });
    // $('#adResultados').on('click', function(){
    //     if($(this).prop('checked')){
    //         $(this).attr('value','true'); 
    //     } else {
    //         $(this).removeAttr('value'); 
    //     }
    // });
    // $('#adAprovechamiento').on('click', function(){
    //     if($(this).prop('checked')){
    //         $(this).attr('value','true'); 
    //     } else {
    //         $(this).removeAttr('value'); 
    //     }
    // });

    $('#pdfAlumnoForm').submit(function(e) {
        if($('#adidAlumno option:selected').val() == 0){
          alert("Selecciona un alumno.");
          e.preventDefault();
        } else {
          $('.create-pdf').attr('disabled','true');
          $('.create-pdf').text('Creando PDF...');
          $('.cancel-pdf').attr('disabled','true');
        }
    });

    // PDF LECTURA DETAIL

    $('#ldAlumnos').on('click', function(){
        if($(this).prop('checked')){
            $(this).attr('value','true'); 
        } else {
            $(this).removeAttr('value'); 
        }
    });

    $('#ldInforeact').on('click', function(){
        if($(this).prop('checked')){
            $(this).attr('value','true'); 
        } else {
            $(this).removeAttr('value'); 
        }
    });

    $('#ldCuestionario').on('click', function(){
        if($(this).prop('checked')){
            $(this).attr('value','true'); 
        } else {
            $(this).removeAttr('value'); 
        }
    });

    $('#ldCuestionarioResuelto').on('click', function(){
        if($(this).prop('checked')){
            $(this).attr('value','true'); 
        } else {
            $(this).removeAttr('value'); 
        }
    });

    $('#pdfLecturaForm').submit(function(e) {
        if($('#ldidLectura option:selected').val() == 0){
          alert("Selecciona una lectura.");
          e.preventDefault();
        } else {
          $('.create-pdf').attr('disabled','true');
          $('.create-pdf').text('Creando PDF...');
          $('.cancel-pdf').attr('disabled','true');
        }
    });

  })
