
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
        <h2>ADMINISTRAR PRODUCTOS</h2>
        <p>Agregar nuevo producto</p>
        <div class="row">
            <div class="col-lg-3">
                <form id="frmSubmitAch" method="POST" action="<?php echo site_url('products/saveProduct')?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="achName" class="col-form-label">Nombre</label>
                        <input type="text" id="achName" name="fspName" class="form-control req irna" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label">Precio</label>
                        <input type="number" id="achName" name="fspPriceV" class="form-control req irna" placeholder="$0.0" required>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label">Stock</label>
                        <input type="number" min="1" id="achName" name="fspStock" class="form-control req irna" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label for="achDescription" class="col-form-label">Descripción</label>
                        <input type="text" id="achDescription" name="fspDescription" class="form-control req irna" placeholder="Características del producto." required/>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Categoría</label>
                        <select id="slctIcon" name="fspCategory" class="form-control select-ach" required>
                            <option id="ic_0" value="1" selected>- selecciona una categoría -</option>
                        <?php if(!empty($categories)){
                            foreach($categories as $category){
                                echo'
                                <option value="'.$category->idcategories.'">'.$category->name.'</option>';
                            }
                        } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label">Imagen</label>
                        <input class="input-file form-control" id="fileUpload" name="fileUpload" type="file" required>
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
                            <th scope="col" class="text-center">Imagen</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Stock</th>
                            <th scope="col" class="text-center">Precio</th>
                            <th scope="col" class="text-center">Categoría</th>
                            <th scope="col" class="text-center" style="width: 30%;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($products)): ?>
                <?php foreach($products as $product): ?>
                        <tr>
                            <td class="text-center"><img src="<?= $product->image; ?>" style="width:100px; height: 100px; background: gray; border-radius: 5px;"></td>
                            <td class="text-center"><?= strtolower($product->name); ?></td>
                            <td class="text-center"><?= strtolower($product->stock); ?></td>
                            <td class="text-center"><?= strtolower($product->price_v); ?></td>
                            <td class="text-center"><?= strtolower($product->category); ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning text-white" href="<?= base_url().'products/edit?idproduct='.$product->idproduct; ?>">editar</a>
                                <a class="btn btn-danger text-white" href="<?= base_url().'products/delete?idproduct='.$product->idproduct; ?>">eliminar</a>
                            </td>
                        </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <div class="col-lg-12 col-sm-12 mb--30 text-center">
                        <h3>No hay productos</h3>
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
        $('#li_products').attr('class','active nav-link btn btn-primary text-white');
    })
</script>