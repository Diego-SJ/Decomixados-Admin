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
        <div class="row">
            <div class="col-lg-4">
                <form id="frmSubmitAch" method="POST" action="<?php echo site_url('offers/save')?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Nombre oferta *</label>
                        <input type="text" id="fspName" name="fspName" class="form-control req irna" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Producto al que aplica *</label>
                        <select id="fspProduct" name="fspProduct" class="form-control select-ach" required>
                        <?php if(!empty($products)){
                            foreach($products as $p){
                                echo'
                                <option value="'.$p->idproduct.'">'.$p->name.'</option>';
                            }
                        } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="achDescription" class="col-form-label"><i class="fa fa-file-text text-azuld"></i> Descripción *</label>
                        <input type="text" id="fspDescription" name="fspDescription" class="form-control req irna" placeholder="" required/>
                    </div>
                    <div class="form-group">
                        <label for="achName" class="col-form-label"><i class="fa fa-flag text-azuld"></i> Imagen *</label>
                        <input type="file" id="fileUpload" name="fileUpload" class="form-control req irna" placeholder="" required>
                    </div>
                    <!-- btn save -->
                    <div class="form-group">
                        <button id="checkFormAchievement" type="submit" class="btn btn-success">Guardar oferta</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <table class="table table-dark table-hover">
                    <thead class="">
                        <tr>
                            <th scope="col" class="text-center">Nombre oferta</th>
                            <th scope="col" class="text-center">Descripción</th>
                            <th scope="col" class="text-center">Producto</th>
                            <th scope="col" class="text-center">Imagen</th>
                            <th scope="col" class="text-center" style="width:30%;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($offer)): ?>
                <?php foreach($offer as $m): ?>
                        <tr>
                            <td class="text-center"><?= $m->name ?></td>
                            <td class="text-center"><?= $m->description ?></td>
                            <td class="text-center"><?= $m->product ?></td>
                            <td class="text-center"><img src="<?= $m->image ?>" style="width:100px; height: 50px; background: gray; border-radius: 5px;"></td>
                            <td class="text-center">
                                <a class="btn btn-warning text-white" href="<?= base_url().'offers/edit?id_offer='.$m->id_offer; ?>">editar</a>
                                <a class="btn btn-danger" href="<?= base_url().'offers/delete?id_offer='.$m->id_offer; ?>">eliminar</a>
                            </td>
                        </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"><strong>No hay ofertas</strong></td>
                    </tr>
                <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
    $(function(){
        $('#li_offers').attr('class','active nav-link btn btn-primary text-white');
    })
</script>