
<div class="content">
  <section class="content">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
          <div class="card-header">
            <h3>Detalles de la venta</h3>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>TOTAL: </b>$<?= (!empty($sale))?ucwords($sale->total):'Woops!'; ?></li>
            <li class="list-group-item"><b>ENVIAR A: </b><?= (!empty($sale))?ucwords($sale->address):'Woops!'; ?></li>
            <li class="list-group-item"><B>ESTADO: </B><?= (!empty($sale))?ucwords($sale->status):'Woops!'; ?></li>

            <?php
                if(strtolower($sale->status) == 'en proceso'){
                  echo '
                <li class="list-group-item">
                <form action="'.base_url().'sales/sendPurchase/'.$sale->idsales.'">
                  <button type="submit" class="btn btn-danger btn-block"><b>Finalizar pedido</b></a>
                </form>
                </li>
                ';
                }
              ?>
              <?php 
              if(!empty($this->session->flashdata("success"))){
              echo '<li class="list-group-item"><b class="text-success">'.$this->session->flashdata("success").'</b></li>';
              } else if(!empty($this->session->flashdata("error"))){
              echo '<li class="list-group-item"><b class="text-danger">'. $this->session->flashdata("error").'</b></li>';
              }?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col" class="text-center">Producto</th>
              <th scope="col" class="text-center">Cantidad</th>
              <th scope="col" class="text-center">Precio</th>
              <th scope="col" class="text-center">Total</th>
              <th scope="col" class="text-center">Imagen</th>
            </tr>
          </thead>
          <tbody>
    <?php if(!empty($products)): ?>
    <?php foreach($products as $product): ?>
            <tr>
                <td class="text-center">
                  <a class="txt-dark" href="<?= base_url().'products/edit/'.$product->idproduct; ?>">
                    <img src="<?= $product->image; ?>" style="width:60px; height: 60px; background: gray; border-radius: 5px;">
                  </a>
                </td>
                <td class="text-center">
                  <a class="text-white" href="<?= base_url().'products/edit/'.$product->idproduct; ?>">
                    <?= strtolower($product->name); ?>
                  </a>
                </td>
                <td class="text-center"><?= ($product->quantity); ?></td>
                <td class="text-center"><?= ($product->price_v); ?></td>
                <td class="text-center"><?= ($product->quantity * $product->price_v); ?></td>
                
            </tr>
    <?php endforeach ?>
    <?php else: ?>
        <div class="col-lg-12 col-sm-12 mb--30 text-center">
            <h3 class="text-danger">ESTE PEDIDO SE CANCELO</h3>
        </div>
    <?php endif ?>
          </tbody>
      </table>
      </div>
    </div>
  </section>

</div>