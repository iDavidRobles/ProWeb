<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion extends CI_Controller {
  public function solicitarCotizacion(){
    $this->load->database();
    $productos = $_POST["productos"];
    $total = 0;
    foreach ($productos as $key => $value) {
      $this->db->where("id_producto",$value["id"]);
      $producto = $this->db->get("productos")->result_array()[0];

      $temp[$key] = array(
        "id"=>$producto["id_producto"],
        "cantidad"=>$value["cantidad"],
        "unidad"=>$producto["unidad_medida_producto"],
        "uniprecio"=>$producto["precio_producto"],
        "nombre"=>$producto["nombre_producto"],
        "subtotal"=>($value["cantidad"]*$producto["precio_producto"])
      );
      $total += $temp[$key]["subtotal"];

    }
    $res["detalles"]=$temp;
    $res["fecha"]=date('m/d/Y g:ia');
    $res["total"]=$total;
    echo json_encode($res);

  }
}
?>
