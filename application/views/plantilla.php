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
        <img src="/assets/imagenes/logo2.png" alt="" width="100px" height="40px">
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
    <a class="dropdown-item" href="/provweb/modulo/ingresar">Ingresar</a>
      <a class="dropdown-item" href="/provweb/modulo/Editar">Editar</a>
  </div>
</li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/cotizaciones">cotizaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/proveedores">Proveedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/nosotros">Nosotros</a>
          </li>
        </ul>
        <span class="navbar-text">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Login
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="container-fluid">
              <form>
          <div class="form-group">
            <style media="screen">
              .exampleInputEmail1{
              font-size: 30px;
              };
            </style>
            <label for="exampleInputEmail1">Correo electronico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa correo">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
          </div>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ingresar</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
        </span>
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
  </body>
</html>
