<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>DECOMIXADOS ADMIN</title>

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon/logos.png">
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/iconos/icomoon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">
</head>
<body class="">



<div class="container">
<br><br><br><br><br>
<div class="row d-flex justify-content-center ">
  
  <div class="col-lg-4">
      <form id="frm_login" action="<?php echo base_url().'login/start'; ?>" method="post">
      <div id="resp_log" class="col-12 mb--20">
          <label id="resp_msg_log" class="text-danger"></label>
        </div>
      <h3 class="text-center">INICIO DE SESIÓN</h3>
      <div class="form-group">
        <label for="exampleInputEmail1">Correo</label>
        <input type="text" id="log_user" type="text" class="form-control" placeholder="Correo" aria-describedby="emailHelp" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input id="log_password" type="password" class="form-control" placeholder="Contraseña" id="exampleInputPassword1" required>
      </div>
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
  </div>
</div>

<input id="base_url" type="text" value="<?= base_url() ?>" hidden>

</div>

<script>
      $(function(){

        const base_url = $('#base_url').val();
        $('#resp_reg').hide();
        $('#resp_log').hide();
  
        $('#frm_login').submit((e) => {
          e.preventDefault();
          let errors = 0;
          let pass = $('#log_password').val();
          let usr = $('#log_user').val();
          
          if(pass.length > 0 && usr.length > 0){
            if(pass.length < 8){
              alert('La contraseña debe tener al menos 8 digítos.');
              e.preventDefault();
              errors++;
            } else if(usr.length < 8){
              alert('Verifica que tu usuario o correo sea valido.');
              e.preventDefault();
              errors++;
            } else {
              errors = 0;
            }
          } else {
            alert('Completa los campos.');
            errors++;
          }

          if(errors == 0){
            const newUser = {
              log_user: $('#log_user').val(),
              log_password: $('#log_password').val(),
            };
            $.post(
              $('#frm_login').attr('action'),
              newUser,
              (response) => {
                console.log(response)
                if(response == 'ok'){
                  $('#frm_login').trigger('reset');
                  $(location).attr('href',base_url+'sales');
                } else {
                  $('#resp_log').show();
                  $('#resp_msg_log').text(response);
                } 
              }
            );
          }
        });
      });
    </script>

</body>

</html>