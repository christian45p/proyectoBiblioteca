<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ejemplar_model','pm');
	}
	public function index(){
		$data = [
				'ejemplar'=> $this->pm->read()
			];

		$this->load->view('Administrador/header');
		$this->load->view('Administrador/listado',$data);
		$this->load->view('Administrador/footer');
	}

	public function add(){
		$this->load->view('Administrador/header');
		$this->load->view('Administrador/formulario');
		$this->load->view('Administrador/footer');
	}
	public function insert(){
		$this->pm->insert();
		redirect(base_url('index.php/Administrador'));
	}
	public function edit($id){
		$data=[
			'ejemplar'=> $this->pm->getById($id)
		];
		$this->load->view('Administrador/header');
		$this->load->view('Administrador/editar',$data);
		$this->load->view('Administrador/footer');
	}
	public function update(){
		$this->pm->update();
		redirect(base_url('index.php/administrador/'));
	}
	public function delete($id){
		$this->pm->delete($id);
		redirect(base_url('index.php/administrador/'));
	}
}
