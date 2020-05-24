<div class="content">
    <section class="content-header">
    <?php 
        if(!empty($this->session->flashdata("success"))){
        echo '<span class="text-success"><b>'.
        $this->session->flashdata("success")
                    .'</b></span>';
        } else if(!empty($this->session->flashdata("error"))){
        echo '<span class="text-danger"><b>'.
                    $this->session->flashdata("error")
                    .'</b></span>';
        }?>
    </section>

    <section class="content">
        <h2>ADMINISTRAR CATEGORÍAS</h2>
        <p>Nueva categoría</p>
        <div class="row">
            <div class="col-lg-3">
                <form method="POST" action="<?= base_url().'categories/save';?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Nombre *</label>
                        <input type="text" name="catName" class="form-control req irna" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="img_home" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Imagen *</label>
                        <input type="file" name="img_home" class="form-control req irna" required>
                    </div>
                    <!-- btn save -->
                    <div class="form-group">
                        <button id="checkFormAchievement" type="submit" class="btn btn-block btn-success"><b>Guardar</b></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <table class="table table-dark table-hover">
                    <thead class="">
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th style="width: 30%;" class="text-center">Imagen</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($categories)): ?>
                <?php foreach($categories as $category): ?>
                        <tr>
                            <td class="text-center"><?= ucfirst($category->name); ?></td>
                            <td class="text-center"><?= !empty($category->image)?'<img src="'.$category->image.'" style="width:60%; height: 100px; background: gray; border-radius: 5px;">':'NA'; ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning text-white" href="<?= base_url().'categories/edit?idcategories='.$category->idcategories; ?>">editar</a>
                                <a class="btn btn-danger text-white" href="<?= base_url().'categories/delete?idcategories='.$category->idcategories; ?>">eliminar</a>
                            </td>
                        </tr>
                <?php endforeach ?>
                <?php else: ?>
                        <div class="col-lg-12 col-sm-12 mb--30 text-center">
                            <h3>Sin registros.</h3>
                        </div>
                <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
    $(function(){
        $('#li_category').attr('class','active nav-link btn btn-primary text-white');
    })
    function deleteItem() {
        if (window.confirm("¿Seguro qué quieres eliminar este producto?")) { 
            document.getElementById("delete-product-frm").submit(); 
        }
    }
</script>