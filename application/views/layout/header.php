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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/css/dataTable.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/morris.js/morris.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li  class="nav-item">
        <a id="li_sales" class="nav-link" href="<?php echo base_url().'sales'; ?>">Ventas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a id="li_offers" class="nav-link" href="<?php echo base_url().'offers'; ?>">Ofertas</a>
      </li>
      <li class="nav-item">
        <a id="li_products" class="nav-link" href="<?php echo base_url().'products'; ?>">Productos</a>
      </li>
      <li class="nav-item">
        <a id="li_category" class="nav-link" href="<?php echo base_url().'categories'; ?>">Categorias</a>
      </li>
      <li class="nav-item">
        <a id="li_messages" class="nav-link" href="<?php echo base_url().'messages'; ?>">Mensajes</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="<?php echo base_url().'Logout'; ?>" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</a>
    </form>
  </div>
</nav>