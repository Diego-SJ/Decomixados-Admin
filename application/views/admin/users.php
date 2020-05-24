<div class="content-wrapper" style="min-height: 916.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <span class="icon-users"></span> Usuarios (clientes)
      </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="table_users" class="table table-bordered table-hover">
                                <thead class="">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Teléfono</th>
                                        <th class="text-center">Imagen</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php if(!empty($users)): ?>
                            <?php $i = 1; ?>
                            <?php foreach($users as $user): ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= ucwords($user->name.' '.$user->lname); ?></td>
                                        <td class="text-center"><?= strtolower($user->user); ?></td>
                                        <td class="text-center"><?= strtolower($user->email); ?></td>
                                        <td class="text-center"><?= strtolower($user->phone); ?></td>
                                        <td class="text-center"><img src="<?php echo base_url().'assets/img/admin/admin.png'; ?>" style="width:60px; height: 60px; background: gray; border-radius: 5px;"></td></td>
                                        <td class="text-center">
                                            <form id="edit-product-frm" method="post" action="<?= base_url().'users/detail/'.$user->iduser; ?>">
                                                <button type="submit" class="btn bg-p2c4">
                                                    <span class="icon-eye"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php $i++; ?>
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
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function(){
        $('#nhl-6').attr('class','active');
    })
</script>