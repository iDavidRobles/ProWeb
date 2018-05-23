<br>
<br>
<br>
<style>
body{
background: #eee !important;
}
.container-fluid{
  max-width: 680px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);
}
</style>
<form>
  <div class="container-fluid">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombre</label>
      <input type="text" class="form-control" id="nomprod">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Unidad de medida</label>
    <input type="text" class="form-control" id="medprod">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Precio</label>
    <input type="number" min="0" maxlength="10" class="form-control" id="precio">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Cantidad</label>
    <input type="number" min="0" maxlength="10" class="form-control" id="canprod">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Imagen</label>
      <select id="imgprod" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Explorar</label>
    <input type="file" class="form-control-file" id="subprod">
  </div>
</form>
  </div>
  <button id="btnagregarproducto" type="button" class="btn btn-primary">Ingresar</button>
    </div>
</form>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/RegProducto.js" type="text/javascript"></script>
