<div class="content-wrapper" style="min-height: 916.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <span class="icon-home"></span> Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-p4c1">
                <div class="inner">
                <h3><?= (!empty($products))?$products->total:'0'; ?></h3>
                <p>Total productos</p>
                </div>
                <div class="icon">
                <span class="icon-shopping-basket"></span>
                </div>
                <a href="<?php echo base_url().'products'; ?>" class="small-box-footer">Más información <span class="icon-info-with-circle"></span></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-p4c2">
                <div class="inner">
                <h3><?= (!empty($sales))?$sales->total:'0'; ?></h3>
                <p>Ventas totales</p>
                </div>
                <div class="icon">
                <span class="icon-price-tag"></span>
                </div>
                <a href="<?php echo base_url().'sales'; ?>" class="small-box-footer">Más información <span class="icon-info-with-circle"></span></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-p4c3">
                <div class="inner">
                <h3><?= (!empty($categories))?$categories->total:'0'; ?></h3>
                <p>Total categorías</p>
                </div>
                <div class="icon">
                <span class="icon-archive"></span>
                </div>
                <a href="<?php echo base_url().'categories'; ?>" class="small-box-footer">Más información <span class="icon-info-with-circle"></span></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-p4c4">
                <div class="inner">
                <h3><?= (!empty($users))?$users->total:'0'; ?></h3>
                <p>Total usuarios</p>
                </div>
                <div class="icon">
                <span class="icon-users"></span>
                </div>
                <a href="<?php echo base_url().'users'; ?>" class="small-box-footer">Más información <span class="icon-info-with-circle"></span></a>
            </div>
        </div>
        </div>

    </section>
    <!-- /.content -->
  </div>

  <script>
      $(function(){
          $('#nhl-1').attr('class','active');
      })
  </script>