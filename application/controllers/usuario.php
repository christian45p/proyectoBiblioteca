<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	//Copia este codigo este codigo de abajo antes de escribir código en un NUEVO METODO!!!
/*->  $tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			
			Escribe CODIGO acá......

		}else{
			redirect(base_url().'index.php/Login');
		}          <- NO BORRES ESTE COMENTARIO PARA PODER USAR EL CODIGO SIEMPRE*/
	public function index()
	{
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  $nombreDelUsuario=$this->session->userdata('usua_nombres');
	  $datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			
			$this->load->view('Usuarios/header',$datos);
			$this->load->view('Usuarios/footer');

		}else{
			redirect(base_url().'Login');
		}
		
	}
	public function salir()
	{	//NO COPIES ACÁ EL CODIGO
		$this->session->unset_userdata('usua_login');
		redirect(base_url().'Login');
	}
}
