$(document).ready(function(){

    let urlProject = 'http://192.168.64.2/kids/';
    const idLectura = $('.id').val();

    fetchActivities();

    function fetchActivities(){
        $.ajax({
            url: urlProject+'Web/Actividades/getAllReactivesByLecture/'+idLectura,
            type: 'GET',
            success: function(resp){
                let activities = JSON.parse(resp);
                let index = 1;
                let template = "";
                activities.forEach(activity => {
                    template +=`
                    <tr>
                      <td class="text-center">${index}</td>
                      <td class="text-center">${activity.categoria}</td>
                      <td class="text-center">${activity.tipo}</td>
                      <td class="text-center">
                            <button class="btn btn-warning editar_reactivo" data-toggle="modal" data-target="#Visualizar" value="${activity.id}">
                                <span class="fa fa-pencil text-white"></span>
                            </button>
                            <button class="btn btn-danger eliminar_reactivo" data-toggle="modal" data-target="#Visualizar" value="${activity.id}">
                                <span class="fa fa-trash text-white"></span>
                            </button>
                            <button class="btn btn-verde ver_reactivo" data-toggle="modal" data-target="#Visualizar" value="${activity.id}">
                                <span class="fa fa-eye text-white"></span>
                            </button>
                      </td>
                    </tr>`;
                    index++;
                });
                $('#body-activities').html(template);
            }
        });
    }

    console.log(idLectura);
    // add OM
    $('#frm_om').submit(e => {
        e.preventDefault();
        console.log('click');
        if($('#kngOm option:selected').val() == 0){
            alert('Elije una categoría.');
        } else {
            const dataOM = {
                categoria: $('#kngOm option:selected').val(),
                pregunta: $('#fom_pregunta').val(),
                resp1: $('#fom_resp1').val(),
                resp2: $('#fom_resp2').val(),
                resp3: $('#fom_resp3').val(),
                resp4: $('#fom_resp4').val(),
                resp_correct: $('input:radio[name=fom_resp_chk]:checked').val(),
                idLectura: $('.id').val(),
            };
            $.post(
                urlProject+'Web/Actividades/addOpcionMultiple/'+idLectura,
                dataOM,
                (response) => {
                    console.log(response);
                    if(response == 'Ok'){
                        fetchActivities();
                        $('#frm_om').trigger('reset');
                    } else {
                        alert("Algo salió mal, intenta más tarde.");
                    }
                }
            );
        }
    });

    // Add RC
    $('#frm_rc').submit(e => {
        e.preventDefault();
        console.log('click');
        if($('#kngRc option:selected').val() == 0){
            alert('Elije una categoría.');
        } else {
            const dataRC = {
                categoria: $('#kngRc option:selected').val(),
                oracion1: $('#frc_o1').val(),
                oracion2: $('#frc_o2').val(),
                oracion3: $('#frc_o3').val(),
                oracion4: $('#frc_o4').val(),
                res_slc1: $('#frc_slc1 option:selected').val(),
                res_slc2: $('#frc_slc2 option:selected').val(),
                res_slc3: $('#frc_slc3 option:selected').val(),
                res_slc4: $('#frc_slc4 option:selected').val(),
                resp1: $('#frc_r1').val(),
                resp2: $('#frc_r2').val(),
                resp3: $('#frc_r3').val(),
                resp4: $('#frc_r4').val(),
                idLectura: $('.id').val(),
            };
            console.log(dataRC);
            $.post(
                urlProject+'Web/Actividades/addRelacionarColumnas/'+idLectura,
                dataRC,
                (response) => {
                    console.log(response);
                    if(response == 'Ok'){
                        fetchActivities();
                        $('#frm_rc').trigger('reset');
                    } else {
                        console.log(response);
                        alert("Algo salió mal, intenta más tarde.");
                    }
                }
            );
        }
    });

    // add VF
    $('#frm_vf').submit(e => {
        e.preventDefault();
        console.log('click');
        if($('#kngVf option:selected').val() == 0){
            alert('Elije una categoría.');
        } else {
            const dataVF = {
                categoria: $('#kngVf option:selected').val(),
                pregunta: $('#fvf_or').val(),
                resp_correct: $('#fvf_slc option:selected').val(),
                idLectura: $('.id').val(),
            };
            console.log(dataVF);
            $.post(
                urlProject+'Web/Actividades/addVerdaderoFalso/'+idLectura,
                dataVF,
                (response) => {
                    console.log(response);
                    if(response == 'Ok'){
                        fetchActivities();
                        $('#frm_vf').trigger('reset');
                    } else {
                        alert("Algo salió mal, intenta más tarde.");
                    }
                }
            );
        }
    });

    //AJAX para ver reactivo 
    $(document).on('click','.ver_reactivo', function(){
        console.log('click view');
        var id_reactivo = $(this).val();
        $.ajax({
            url: urlProject + 'Web/Actividades/getActividad/' + id_reactivo,
            type: 'POST',
            success: function(resp){
                $('#Visualizar .modal-body').html(resp);
            }
        });
    });

    //AJAX para eliminar un reactivo 
    $(document).on('click','.eliminar_reactivo',function(){
        var id_actividad = $(this).val();
        $.ajax({
            url: urlProject + "Web/Actividades/viewEliminarReactivo/" + id_actividad,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

    //AJAX para editar un reactivo 
    $(document).on('click','.editar_reactivo',function(){
        var id_actividad = $(this).val();
        $.ajax({
            url: urlProject + "Web/Actividades/viewEditarReactivo/" + id_actividad,
            type: "POST",
            success: function(resp){
                $("#Visualizar .modal-body").html(resp);
            }
        });
    });

});