  <style>
  body{
	background: #eee !important;
  }
  .container-fluid{
    max-width: 380px;
    padding: 15px 35px 45px;
    margin: 0 auto;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.1);
  }
  </style>
  <br>
  <br>
  <br>
  <br>
  <body>
    <div id="FormRegistro" class="container-fluid">
      <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Ingresa correo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="contra" placeholder="Contraseña">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Repetir contraseña</label>
    <input type="password" class="form-control" id="contra2" placeholder="Repetir contraseña">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
  </div>
  <button id="btnagregarusuario" type="button" class="btn btn-primary">Registrate</button>
</form>
</div>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/RegistrarU.js" type="text/javascript"></script>
