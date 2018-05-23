<?php
class usuarios_model extends CI_Model {

   public function getUsuarios(){
      $this->load->database();
      return $this->db->get("perfil")->result_array();
   }
   public function getUsuario($correo,$contra){
      $this->load->database();
      $this->db->where("email",$correo);
      $this->db->where("password",$contra);
      return $this->db->get("perfil")->result_array();
   }
 }
?>
