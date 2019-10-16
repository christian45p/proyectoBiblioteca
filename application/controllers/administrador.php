<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ejemplar_model','pm');
		$this->load->model('usuario_model');
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
	  	$datos['titulo']="Dashboard!";

		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){

		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/dashboard');
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		} 

	}	

	public function ejemplar(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
	  $datos['titulo']="Ejemplar!";
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
	public function usuario(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
	  $datos['titulo']="Usuario!";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
			$data = [
				'usuario'=> $this->usuario_model->read()
			];

		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/listado_usuario',$data);
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		} 

	}
	//Usuario.........
		public function add_usuario(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario=$this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/formulario_usuario');
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		} 
	}
	public function insert_usuario(){
	$data = [
				'usua_codigo'=>$this->input->post('codigo'),
				'usua_nombres'=>$this->input->post('nombres'),
				'usua_apellidos'=>$this->input->post('apellidos'),
				'usua_direccion'=>$this->input->post('direccion'),
				'usua_email'=>$this->input->post('email'),
				'usua_telefono'=>$this->input->post('telefono'),

			];
			$this->db->insert('usuario',$data);
		redirect(base_url('index.php/Administrador/usuario'));
	}
	public function edit_usuario($id){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			
			$data=[
			'usuario'=> $this->usuario_model->getById($id)
		];
		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/editar_usuario',$data);
		$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'index.php/Login');
		}	
	}
	public function update_usuario(){
		$this->usuario_model->update();
		redirect(base_url('index.php/administrador/'));
	}
	public function delete_usuario($id){
      	$this->usuario_model->delete_usuario($id);
		redirect(base_url('index.php/administrador/usuario'));
	}
	//Ejemplar........
	public function add(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
	  $datos['titulo']="Registrar!";
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
