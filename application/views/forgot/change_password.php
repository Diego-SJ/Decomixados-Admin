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
    <p class="login-box-msg font-3">Actualizar contraseña</p>

    <form id="recover_password_form" method="post" action="<?= base_url().'login/updatePassword/'.$tokenD;?>">
      <div class="form-group has-feedback">
        <input id="np" type="password" name="new_password" minlength="8" class="form-control font-3" placeholder="Nueva contraseña">
        <span class="icon-lock mt-1 form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="npr" type="password" name="new_password_repeat" minlength="8" class="form-control font-3" placeholder="Repetir contraseña">
        <span class="icon-lock mt-1 form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <button id="sendPassData" type="submit" class="question_hide" hidden="hidden"></button>
        <button id="updtPass" type="button" class="btn btn-p3c4 btn-block btn-flat font-3">Actualizar contraseña</button>
        </div>
      </div>
    </form>
    <p id="test_result"></p>

    <div class="social-auth-links text-center">
      <a class="font-3 txt-p3c4" href="<?php echo base_url();?>">Inicio</a><br>
    </div>
    
  </div>
</div>
  <script type="text/javascript">
    $( function() {
      $("#recover_password_form").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#sendPassData");
        $.ajax({
          type: $(this).attr("method"),
          url: $(this).attr("action"),
          data:$(this).serialize(),
          beforeSend: function(){
            btnEnviar.text("Actualizando");
            btnEnviar.attr("disabled","disabled");
          },complete:function(data){
            btnEnviar.text("Actualizar contraseña");
            btnEnviar.removeAttr("disabled");
          },success: function(data){
            $('#recover_password_form').hide();
            $("#test_result").html(data);
          },error: function(data){
            alert("No hemos podido actualizar tu contraseña en estos momentos, intenta más tarde.");
          }
        });
        return false;
      });

      $("#updtPass").on("click", function (){
          if(checkPassReset()){
            $("#sendPassData").click();
          }
      });
    });
    function checkPassReset(){
      var np  = document.getElementById("np").value;
      var npr = document.getElementById("npr").value;

          if(np.length <= 0 || npr.length <= 0){
              window.alert("Campos obligatorios.");
          } else {
              if(np == npr){
                return true;
            } else {
                window.alert("las contraseñas no coinciden.");
            }
          }
      }
  </script>
</body>

</html>