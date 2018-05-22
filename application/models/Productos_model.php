<?php
class Productos_model extends CI_Model {

   public function getProductos(){
      $this->load->database();
      return $this->db->get("productos")->result_array();
   }
   public function getProducto($id_producto){
      $this->load->database();
      $this->db->where("id_producto",$id_producto);
      return $this->db->get("productos")->result_array();
   }
   public function setProductos($datos){
      $this->load->database();
      return $this->db->insert("productos",$datos);
   }
   public function updateProducto($datos,$id_producto){
      $this->load->database();
      $this->db->where("id",$id_producto);
      return $this->db->update("productos",$datos);
   }
   public function deleteProducto($id_producto){
      $this->load->database();
      $this->db->where("id",$id_producto);
      return $this->db->delete("productos");
   }
 }
?>
