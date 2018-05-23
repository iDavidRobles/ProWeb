<br>
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<div class="container" style="padding-top:40px;">
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Busque su producto" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Busqueda</button>
  </div>
</div>
    <div class="card-columns"id="allprod">
    </div>
  </div>
</div>
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="container-fluid">
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
                <button id="btnagregarproducto" type="button" class="btn btn-primary">Guardar</button>
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
<br>
</div>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/EditProducto.js" type="text/javascript"></script>
