/*=================================================
        ACCIONES PARA COMPONENTES GENERALES
=================================================*/
$(".question_hide").hide();

/*=================================================
        ACCIONES PARA COMPONENTES DE LOGIN
=================================================*/
$("#sendPass").hide();
$("#pwac").hide();
$("#status_enabled_lecture").hide();

$('.msg-alert').on('click', function(){
    $(this).hide();
    $(this).attr('hidden','hidden');
});

$("#btnUpdPass").on("click", function(){
    var pa = $("#pwac").val();
    var pr = $("#inputPassActual").val();
    var pn = $("#inputPassNew").val();
    var pc = $("#inputPassConfirm").val();

    if(pa!='' && pr!='' && pn!='' && pc!=''){
        if(pn==pc){
            $("#sendPass").click();
        } else {
            alert("las contraseñas no coinciden");
        }
    } else {
        alert("completa todos los campos");
    }  
});

$("#table_products").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ productos",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar producto",
        "info": "productos de _START_ al _END_ de un total de  _TOTAL_",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#table_offers").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ ofertas",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar oferta",
        "info": "ofertas de _START_ al _END_ de un total de  _TOTAL_",
        "infoEmpty": "No has agregado ninguna oferta",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#table_categories").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ categorías",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar categoría",
        "info": "categorías de _START_ al _END_ de un total de  _TOTAL_",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#table_users").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ usuarios",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar usuario",
        "info": "usuarios de _START_ al _END_ de un total de  _TOTAL_",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

$("#table_sales").DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ ventas",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar venta",
        "info": "ventas de _START_ al _END_ de un total de  _TOTAL_",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});


$("#gen_ninio").on("click", function(){
    $("#frm_genero").val("masculino");
});
$("#gen_ninia").on("click", function(){
    $("#frm_genero").val("femenino");
});

//GENERAR USUARIO Y PASS A PARTIR DE CAMPOS INGRESADOS

//VERIFICAR QUE LOS CAMPOS NO ESTE VACIOS
$(".reg-alumno").on("click", function(){
    $("#btn-ana-success").attr("disabled", "disabled");
    $("#desc_na").show();
});
var check,nombre, paterno, materno, grado, grupo, dataAlumno;

$("#form_rna .req").keyup(function() {
    var form = $(this).parents("#form_rna");
    check = checkCampos(form);
});

function checkInputsNewAlumno(){
    if($("#rna_nombre").val() == '' || 
    $("#rna_paterno").val() == '' || 
    $("#rna_materno").val() == '' || 
    $("#rna_grado").val() == '' || 
    $("#rna_grupo").val() == '' ||
    $('#frm_genero').val() == ''){
        return false;
    } else {
        return true;
    }
}

$("#rna_clickhere").on("click", function (){
    if(checkInputsNewAlumno()){
        nombre = $("#rna_nombre").val();
        paterno = $("#rna_paterno").val();
        materno = $("#rna_materno").val();

        var keyuser = quitarEspacios(nombre)+"_"+paterno.charAt(0)+materno.charAt(0)+crearUUID();
        $("#btn-ana-success").removeAttr("disabled");
        $("#rna_nombre").attr("readonly",true);
        $("#rna_paterno").attr("readonly",true);
        $("#rna_materno").attr("readonly",true);
        $("#rna_grado").attr("readonly",true);
        $("#rna_grupo").attr("readonly",true);
        $("#rna_usuario").val(keyuser);
        $("#rna_password").val(keyuser);
        alert("Guarda para continuar.");
    } else {
        alert("Completa todos los campos.");
    }
});

$("#reset-frm-na").on("click", function(){
    $("#rna_nombre").removeAttr("readonly");
    $("#rna_paterno").removeAttr("readonly");
    $("#rna_materno").removeAttr("readonly");
    $("#rna_grado").removeAttr("readonly");
    $("#rna_grupo").removeAttr("readonly");
    $('#form_rna').trigger('reset');
});

/*=================================================
        FUNCIONES PARA COMPONENTES GENERALES
=================================================*/

function crearUUID(){
    var str = uuid.v4();
    var res = str.substring(3, 7);
    return res;
}

function quitarEspacios(cadena){
    return cadena.replace(/ /g,'');
}

/*=================================================
        VACIAR FORMULARIOS
=================================================*/

function clear_form1() {document.getElementById("frm_om").reset();}
function clear_form2() {document.getElementById("frm_rc").reset();}
function clear_form3() {document.getElementById("frm_vf").reset();}

function checkPassReset(){
var np  = document.getElementById("np").value;
var npr = document.getElementById("npr").value;

    if(np.length <= 0 || npr.length <= 0){
        window.alert("Campos obligatorios.");
    } else {
        if(np == npr){
          return true;
      } else {
          window.alert("las contraseñas no coinciden.");
      }
    }
}

/*=================================================
                   INPUT FILE
=================================================*/



