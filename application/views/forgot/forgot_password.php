<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Casageek | Log in</title>

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon/logo.png">
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/iconos/icomoon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a class="font-1"><b>Casa</b>Geek</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg font-3">Recuperar contraseña</p>

    <form id="reset_password_form" action="<?php echo base_url().'login/resetLink';?>" method="post">
      <div class="form-group has-feedback">
        <input id="email_in" type="email" name="email_reset" class="form-control font-3" placeholder="Correo eléctronico">
        <span class="icon-email mt-1 form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button id="sendLinkReset" type="submit" class="btn btn-p3c3 btn-block btn-flat font-3">Enviar correo de recuperación</button>
        </div>
      </div>
    </form>

    <p id="test_result"></p>

    <div class="social-auth-links text-center">
      <a class="font-3 txt-p3c3" href="<?php echo base_url();?>">Regresar</a><br>
    </div>
    
  </div>
</div>
  <script type="text/javascript">
    $( function() {
      $("#reset_password_form").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#sendLinkReset");
        $.ajax({
          type: $(this).attr("method"),
          url: $(this).attr("action"),
          data:$(this).serialize(),
          beforeSend: function(){
            btnEnviar.text("Enviando link");
            btnEnviar.val("Enviando");
            // Para input de tipo button
            btnEnviar.attr("disabled","disabled");
            $("#email_in").attr("disabled","disabled");
          },complete:function(data){
            btnEnviar.val("Enviar correo de recuperación");
            btnEnviar.removeAttr("disabled");
          },success: function(data){
            $("#test_result").html(data);
            $('#reset_password_form').hide();
          },error: function(data){
            alert("Problemas al tratar de enviar el formulario");
            btnEnviar.val("Enviar formulario");
            btnEnviar.removeAttr("disabled");
          }
        });
        return false;
      });

    });
  </script>
</body>

</html>