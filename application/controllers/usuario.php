<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {
	public function index()
	{
		$this->load->view('Usuarios/header');
		$this->load->view('Usuarios/footer');
	}
}
