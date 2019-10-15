<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ejemplar_model','pm');
	}


	//Copia este codigo de abajo antes de escribir código en un NUEVO METODO!!!
/*->  $tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
			Escribe CODIGO acá......

		}else{
			redirect(base_url().'index.php/Login');
		}          <- NO BORRES ESTE COMENTARIO PARA PODER USAR EL CODIGO SIEMPRE*/

	public function index(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
			$data = [
				'ejemplar'=> $this->pm->read()
			];

		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/listado',$data);
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		} 

	}

	public function add(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
			$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/formulario');
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		} 
	}
	public function insert(){
		$this->pm->insert();
		redirect(base_url('index.php/Administrador'));
	}
	public function edit($id){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
			$data=[
			'ejemplar'=> $this->pm->getById($id)
		];
		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/editar',$data);
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		}	
	}
	public function update(){
		$this->pm->update();
		redirect(base_url('index.php/administrador/'));
	}
	public function delete($id){
		$this->pm->delete($id);
		redirect(base_url('index.php/administrador/'));
	}
	public function salir()
	{	//NO COPIES ACÁ EL CÓDIGO
		$this->session->unset_userdata('usua_login');
		redirect(base_url().'index.php/Login');
	}
}
