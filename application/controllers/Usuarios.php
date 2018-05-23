<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

  public function getUsuarios(){
    $this->load->model("usuarios_model");
    echo json_encode(  $this->usuarios_model->getUsuarios());
  }
  public function getUsuario(){
    $email=$_POST["correo"];
    $password=$_POST["clave"];
    $this->load->model("usuarios_model");
    $resp= $this->usuarios_model->getUsuario($email,$password);
    if($resp['ok']){
      echo json_encode($resp['datos']);
    }else{
      echo json_encode(false);
    }
  }
  public function setUsuario(){
    $datos = array(
        'email'=>  $_POST['correo'],
        'password'=>  $_POST['contra']
    );
    $this->load->model("usuarios_model");
    echo json_encode($this->usuarios_model->setUsuario($datos));
  }
}
 ?>
