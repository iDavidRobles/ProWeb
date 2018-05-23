<?php
class usuarios_model extends CI_Model {

   public function getUsuarios(){
      $this->load->database();
      return $this->db->get("Perfil")->result_array();
   }
   public function setUsuario($datos){
      $this->load->database();
      return $this->db->insert("perfil",$datos);
   }
 }
?>
