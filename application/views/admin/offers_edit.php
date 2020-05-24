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
        <h2>ADMINISTRAR OFERTAS</h2>
        <p>Editar oferta</p>
        <div class="row">
            <div class="col-lg-6">
                <img src="<?= (!empty($offer->image))?$offer->image:''; ?>" style="width:100%; height: 100%; background: #eee; border-radius: 5px;">
            </div>
            <div class="col-lg-6">
                <form method="POST" action="<?= base_url().'Offers/update/'.$offer->id_offer;?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Nombre oferta *</label>
                        <input type="text" id="fspName" name="fspName" class="form-control req irna" value="<?= (!empty($offer))?$offer->name:''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Producto al que aplica *</label>
                        <select id="fspProduct" name="fspProduct" class="form-control select-ach" required>
                        <?php if(!empty($products)){
                            foreach($products as $p){
                                echo'
                                <option value="'.$p->idproduct.'" '.(($p->idproduct == $offer->idproduct)?'selected':'').'>'.$p->name.'</option>';
                            }
                        } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="achDescription" class="col-form-label"><i class="fa fa-file-text text-azuld"></i> Descripción *</label>
                        <input type="text" id="fspDescription" name="fspDescription" class="form-control req irna" value="<?= (!empty($offer))?$offer->description:''; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Imagen </label>
                        <input type="file" id="fileUpload" name="fileUpload" class="form-control req irna">
                    </div>
                    <!-- btn save -->
                    <div class="form-group">
                        <button id="checkFormAchievement" type="submit" class="btn btn-warning text-white">Actualizar oferta</button>
                    </div>
                </form>
            </div>
            
        </div>
    </section>
</div>
<script>
    $(function(){
        $('#li_offers').attr('class','active nav-link btn btn-primary text-white');
    })
</script>