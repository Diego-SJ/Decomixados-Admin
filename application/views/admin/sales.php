
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
        <h2>ADMINISTRAR VENTAS</h2>
        <div class="row">
            <div class="col-lg-12">
                <table id="" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col" class="text-center">Fecha</th>
                            <th scope="col" class="text-center">Forma de pago</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($sales)): ?>
                <?php foreach($sales as $sale): ?>
                        <tr>
                            <td class="text-center">
                                <?php 
                                if(strtolower($sale->status) == 'cancelado'){
                                    echo '<span class="text-danger">cancelado</span>';
                                } else if(strtolower($sale->status) == 'en proceso'){
                                    echo '<span class="text-warning">en proceso</span>';
                                } else {
                                    echo '<span class="text-primary">finalizado</span>';
                                }
                                ?>
                            </td>
                            <td class="text-center"><?= strtolower($sale->total); ?></td>
                            <td class="text-center"><?= strtolower($sale->date); ?></td>
                            <td class="text-center"><?= strtolower($sale->way2pay); ?></td>
                            <td class="text-center">
                                <a class="btn btn-success" href="<?= base_url().'sales/detail?idsales='.$sale->idsales; ?>">ver</a>
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
        $('#li_sales').attr('class','active nav-link btn btn-primary text-white');
    })
</script>