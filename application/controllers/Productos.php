<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

  public function getProductos(){
    $this->load->model("productos_model");
    echo json_encode(  $this->productos_model->getProductos());
  }
  public function getProducto(){
    $id=$_POST["id_producto"];
    $this->load->model("productos_model");
    echo json_encode(  $this->productos_model->getProducto($nombre));
  }
  public function setProductos(){
    $this->load->model("productos_model");
    echo json_encode(  $this->productos_model->setProductos($_POST));
  }
}
 ?>
