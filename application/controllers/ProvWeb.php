<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProvWeb extends CI_Controller {

	public function index()
	{
		$this->load->view('plantilla');
	}
	public function login()
	{
		$this->load->view('inicio');
	}
	public function modulo($modulo)
	{
		$datos = array('modulo' => $modulo);
		$this->load->view('plantilla',$datos);

	}
}
