<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {
	public function index()
	{
		$this->load->view('Administrador/header');
		$this->load->view('Administrador/footer');
	}
}
