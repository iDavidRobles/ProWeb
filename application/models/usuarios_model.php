<?php
class usuarios_model extends CI_Model {

   public function getUsuarios(){
      $this->load->database();
      return $this->db->get("perfil")->result_array();
   }
   public function getUsuario($correo,$clave){
      $this->load->database();
      $this->db->where("email",$correo);
      $this->db->where("password",$clave);
      $resp = $this->db->get("perfil");
      if($resp){
        return ['ok'=>true,'datos'=>$resp->result_array()];

      }else{
        return ['ok'=>false];
      }
   }
 }
?>
