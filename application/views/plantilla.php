<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> titulo</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
<style>
  body{
    background: #eee !important;
  }
</style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img  src="/assets/imagenes/logo2.png" href="/" alt="" width="100px" height="40px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="/provweb/modulo/productos"id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Productos
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    <a class="dropdown-item"href="/provweb/modulo/productos">Productos</a>
    <!-- <a class="dropdown-item" href="/provweb/modulo/ingresar">Ingresar</a>
      <a class="dropdown-item" href="/Inventario/login.php">Editar</a> -->
  </div>
</li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pedidos/index.php">cotizaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/proveedores">Proveedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/nosotros">Nosotros</a>
          </li>
        </ul>
      </div>
    </nav>
    <?php
    if (empty($modulo)) {
      $this->load->view('inicio');
    }else {
       $this->load->view($modulo);
    }
    ?>
<script src="/assets/js/jquery-3.3.1.min.js" integrity=""></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/IngresarUsu.js" type="text/javascript"></script>
  </body>
</html>
