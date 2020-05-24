$( document ).ready(function() {
    let urlProject = "http://192.168.64.2/kids/"; 
    let edit = false;
    fetchCategories();

    $('#catForm').submit(e => {
        e.preventDefault();
        const dataCategory = {
            name: $('#catName').val(),
            description: $('#catDescription').val(),
            id: $('#catId').val(),
        };
        const url = edit === false ? urlProject+'Web/admin/Indicadores/save' : urlProject+'Web/admin/Indicadores/update';
        $.post(url, dataCategory, (response) => {
            console.log(response);
            console.log(url);
            // $('#deletesuccess').show();
            setTimeout(function() {
                $("#deletesuccess").fadeIn(500);
            },0);
            $('.response').html(response);
            setTimeout(function() {
                $("#deletesuccess").fadeOut(500);
            },2500);
            $('#catForm').trigger('reset');
            fetchCategories();
            edit = false;
            $('#checkFormCategory').text('Guardar');
        });
    });

    $(document).on('click','.editCategory', function(e) {
        $('#checkFormCategory').text('Actualziar');
        const id = $(this).val();
        $.post(urlProject+'Web/admin/Indicadores/edit', {id}, (response) => {
            const task = JSON.parse(response);
            console.log(task.nombre);
            $('#catName').val(task.nombre);
            $('#catDescription').val(task.descripcion);
            $('#catId').val(task.idCategoria);
            edit = true;
        });
        e.preventDefault();
    });

    $(document).on('click','.delete-category', function (){
        let id = $(this).val();
        console.log(id);
        let template =`
        <div class="row">
            <div id="fila-actualizar-agregar-pagina" class="col-md-12">
            <div id="contenido-columna-pagina" class="box box-danger">
                <!-- /.box-header -->
                <div class="box-body pad">
                <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-red"><b><i class="fa fa-pie-chart"></i> ELIMINAR CATEGORÍA</b></h4>
                </div>
                <form id="modalDelCat" method="post" action="${urlProject+'Web/admin/Indicadores/delete/'+id}">
                    <blockquote>
                    ¿Deseas eliminar está categoría?
                    </blockquote> 
                    <button type="submit" class="btn btn-info" value="Aceptar"><i class="fa fa-check-circle"></i> Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
                </form>
                </div>
            </div>
            </div>
        </div>`;
        $('#body-modal-delete-cat').html(template);
        $('#modal-delete-category').modal('show');
    });

    function fetchCategories(){
        $.ajax({
            url: urlProject+'Web/admin/Indicadores/getAllCategories',
            type: 'GET',
            success: function (resp){
                let json  = JSON.parse(resp);
                let template = '';
                let index = 1;
                json.forEach(category => {
                    template +=`
                    <tr>
                        <td class="text-center">${index}</td>
                        <td class="text-center">${category.nombre}</td>
                        <td class="text-center">${category.descripcion}</td>
                        <td class="text-center">
                            <button class="editCategory btn bg-yellow" value="${category.id}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger delete-category" value="${category.id}">
                                <span class="fa fa-trash"></span>
                            </button>
                        </td>
                    </tr>`;
                    index++;
                });
                $('#body-cat').html(template);
            }
        });
    }
});