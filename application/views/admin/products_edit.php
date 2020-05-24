
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
        <p>Editar producto</p>
        <div class="row">
            <div class="col-lg-6">
                <img src="<?= (!empty($product->image))?$product->image:base_url().'assets/img/favicon/unknow.png'; ?>" style="width:70%; height: 70%; background: #eee; border-radius: 5px;">
            </div>
            <div class="col-lg-6">
                <form id="frmSubmitAch" method="POST" action="<?= base_url().'Products/updateProduct/'.$product->idproduct;?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Nombre producto</label>
                        <input value="<?= (!empty($product))?$product->name:''; ?>" type="text" id="achName" name="fspName" class="form-control req irna" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Precio</label>
                        <input value="<?= (!empty($product))?$product->price_v:''; ?>" type="number" id="achName" name="fspPriceV" class="form-control req irna" placeholder="$0.0" required>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Stock</label>
                        <input value="<?= (!empty($product))?$product->stock:''; ?>" type="number" id="achName" name="fspStock" class="form-control req irna" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label for="achDescription" class="col-form-label"><i class="fa fa-file-text text-azuld"></i> Descripción</label>
                        <input value="<?= (!empty($product))?$product->description:''; ?>" type="text" id="achDescription" name="fspDescription" class="form-control req irna" placeholder="Características del producto." required/>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Categoría</label>
                        <select id="slctIcon" name="fspCategory" class="form-control select-ach" required>
                            <option id="ic_0" value="1" selected>- selecciona una categoría -</option>
                        <?php if(!empty($categories)){
                            foreach($categories as $category){
                                echo'
                                <option value="'.$category->idcategories.'" '.(($category->idcategories == $product->idcategories)?'selected':'').'>'.$category->name.'</option>';
                            }
                        } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label">Imagen</label>
                        <input class="input-file form-control" id="fileUpload" name="fileUpload" type="file">
                    </div>
                    <!-- btn save -->
                    <div class="form-group">
                        <button id="checkFormAchievement" type="submit" class="btn btn-block btn-success"><b>Actualizar</b></button>
                    </div>
                </form>
            </div>
            
        </div>
    </section>
</div>
<script>
    $(function(){
        $('#li_products').attr('class','active nav-link btn btn-primary text-white');
    })
    function deleteItem() {
        if (window.confirm("¿Seguro qué quieres eliminar este producto?")) { 
            document.getElementById("delete-product-frm").submit(); 
        }
    }
</script>