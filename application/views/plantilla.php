<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" href="assets\imagenes\iconos\favicon.ico" />
    <meta charset="utf-8">
    <title>PROVEMAX</title>
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
  <!-- <a class="nav-link dropdown-toggle" href="/provweb/modulo/productos"id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Productos
  </a> -->
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    <a class="dropdown-item"href="/provweb/modulo/productos">Productos</a>
    <!-- <a class="dropdown-item" href="/provweb/modulo/ingresar">Ingresar</a>
      <a class="dropdown-item" href="/Inventario/login.php">Editar</a> -->
  </div>
</li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/productos">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pedidos/index.php">cotizaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/proveedores">Proveedores</a>
          <!-- </li>
          <li class="nav-item">
            <a class="nav-link" href="/provweb/modulo/nosotros">Nosotros</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/Inventario/login.php">Login</a>
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
<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5 mt-4">

  <div style="background-color: #a09f9c ;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Conéctese con nosotros en las redes sociales!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fa fa-facebook white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fa fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fa fa-google-plus white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fa fa-linkedin white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fa fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">ProveMAX</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>PROVEMAX una organización con los mejores roductos y ervicios para usted.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Navegacion</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="/">Inicio</a>
        </p>
        <p>
          <a class="dark-grey-text" href="/provweb/modulo/producto">Productos</a>
        </p>
        <p>
          <a class="dark-grey-text" href="/provweb/modulo/proveedores">Proveedores</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Nuestras Redes</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Facebook</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Twitter</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Youtube</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Ayuda</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fa fa-home mr-3"></i> Hermosillo Son, 83170, MX</p>
        <p>
          <i class="fa fa-envelope mr-3"></i> consulta@provemax.com</p>
        <p>
          <i class="fa fa-phone mr-3"></i> + 662 2 10 26 50</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
    <a class="dark-grey-text" href="https://mdbootstrap.com/bootstrap-tutorial/"> ProveMAX</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
  </body>
</html>
