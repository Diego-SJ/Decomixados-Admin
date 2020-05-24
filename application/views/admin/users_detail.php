<div class="content-wrapper" style="min-height: 916.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a class="txt-p1c2" href="<?php echo base_url().'users'; ?>"><span class="icon-users"></span> Usuarios (clientes)</a>  / detalle
      </h1>
    </section>

    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'assets/img/admin/admin.png'; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= (!empty($user))?ucwords($user->name.' '.$user->lname):'Woops!'; ?></h3>

              <p class="text-muted text-center"><?= (!empty($user))?ucwords($user->user):'Woops!'; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><span class="icon-phone"></span> Telefono</b> <a class="pull-right txt-p4c1"><?= (!empty($user))?ucwords($user->phone):'sin registrar'; ?></a>
                </li>
                <li class="list-group-item">
                  <b><span class="icon-email"></span> Correo</b> <a class="pull-right txt-p4c1"><?= (!empty($user))?ucwords($user->email):'Woops!'; ?></a>
                </li>
              </ul>

              <form action="<?= ($user->status == 1)?base_url().'users/downUser/'.$user->iduser:base_url().'users/upUser/'.$user->iduser; ?>">
                <button type="submit" class="btn bg-p4c1 btn-block"><b><?= ($user->status == 1)?'Desactivar cuenta':'Activar cuenta'; ?></b></a>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#sales" data-toggle="tab"><span class="icon-shopping-cart"></span> Compras realizadas</a></li>
              <li><a href="#saves" data-toggle="tab"><span class="icon-heart"></span> Guardados</a></li>
              <li><a href="#address" data-toggle="tab"><span class="icon-location-pin"></span> Direcciones</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="sales">
                <div class="">
                  <?php if(!empty($sales)): ?>
                  <?php $i = 1; ?>
                  <?php foreach($sales as $sale): ?>
                  <div class="col-md-4">
                    <form class="timeline-item">
                        <h3 class="timeline-header">
                            <div class="bg-white btn-xs" style="width:100%;font-size:15px;"><span class="icon-calendar"></span> Fecha: <?= strtolower($sale->date); ?></div> 
                            <div class="bg-white btn-xs" style="width:100%;font-size:15px;"><span class="icon-credit"></span> Total: <?= strtolower($sale->total); ?></div>
                            <div class="bg-white btn-xs" style="width:100%;font-size:15px;"><span class="icon-info"></span> Estado: <?= strtolower($sale->status); ?></div>
                            <a href="<?= base_url().'sales/detail/'.$sale->idsales ?>" class="btn bg-p4c1 btn-xs" style="width:100%;font-size:15px;"><span class="icon-info"></span> Ver detalles</a>
                        </h3>
                    </form>
                  </div>
                  <?php $i++; ?>
                  <?php endforeach ?>
                  <?php else: ?>
                    <h3>
                      <strong><span class="icon-info"></span> Aún no hay registros</strong>
                    </h3>
                  <?php endif ?>
                  </div>
              </div>
              
              <div class="tab-pane" id="saves">
                <div class="">
                  <?php if(!empty($wishlist)): ?>
                  <?php $i = 1; ?>
                  <?php foreach($wishlist as $row): ?>
                    <div class="col-md-6">
                      <div class="timeline-item">
                          <h3 class="timeline-header">
                              <div class="bg-white btn-xs" style="width:100%;font-size:15px;"><span class="icon-calendar"></span> Producto: <?= strtolower($row->name); ?></div> 
                              <div class="bg-white btn-xs" style="width:100%;font-size:15px;"><span class="icon-credit"></span> Precio: <?= ucwords($row->price_v); ?></div>
                              <div class="bg-white btn-xs" style="width:100%;font-size:15px;"><span class="icon-info"></span> Disponnibles: <?= ucwords($row->stock); ?></div>
                              <a href="<?= base_url().'products/edit/'.$row->idproduct; ?>" type="submit" class="btn bg-p4c1 btn-xs" style="width:100%;font-size:15px;"><span class="icon-info"></span> Ver producto</a>
                          </h3>
                      </div>
                    </div>
                  <?php $i++; ?>
                  <?php endforeach ?>
                  <?php else: ?>
                    <h3>
                      <strong><span class="icon-info"></span> Aún no hay registros</strong>
                    </h3>
                  <?php endif ?>
                  </div>
              </div>

              <div class="tab-pane" id="address">
                <ul class="timeline">
                  <?php if(!empty($addresses)): ?>
                  <?php $i = 1; ?>
                  <?php foreach($addresses as $address): ?>
                    <li>
                      <div class="timeline-item">
                          <h3 class="timeline-header">
                              <span class="btn bg-p4c1 btn-xs">
                              <strong><span class="icon-location-pin"></span> </strong>
                              Dirección <?= $i; ?>:</span><br><br> <?= $address->address; ?>
                          </h3>
                      </div>
                    </li>
                  <?php $i++; ?>
                  <?php endforeach ?>
                  <?php else: ?>
                    <h3>
                      <strong><span class="icon-info"></span>  Aún no hay registros</strong>
                    </h3>
                  <?php endif ?>
                </ul>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
</div>
<script>
    $(function(){
        $('#nhl-6').attr('class','active');
    })
</script>