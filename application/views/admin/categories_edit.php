
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
        <p>Editar categoría</p>
        <div class="row">
            <div class="col-lg-6">
            <?= !empty($category->image)?'<img src="'.$category->image.'" style="width:100%; height: 100%; background: gray; border-radius: 5px;">':'NA'; ?>
            </div>
            <div class="col-lg-6">
                <form method="POST" action="<?= base_url().'categories/update/'.$category->idcategories;?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Nombre *</label>
                        <input value="<?= $category->name; ?>" type="text" name="catName" class="form-control req irna" required>
                    </div>
                    <div class="form-group">
                        <label for="img_home" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Imagen </label>
                        <input type="file" name="img_home" class="form-control req irna">
                    </div>
                    <!-- btn save -->
                    <div class="form-group">
                        <button id="checkFormAchievement" type="submit" class="btn btn-block btn-warning text-white"><b>Actualizar</b></button>
                    </div>
                </form>
            </div>
            
        </div>
    </section>
</div>
<script>
    $(function(){
        $('#li_category').attr('class','active nav-link btn btn-primary text-white');
    })
</script>