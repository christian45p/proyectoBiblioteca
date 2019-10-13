<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('footer');
		$this->load->view('inicio');
	}
}
