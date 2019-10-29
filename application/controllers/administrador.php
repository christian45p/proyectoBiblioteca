<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ejemplar_model');
		$this->load->model('usuario_model');
		$this->load->model('autor_model','aut');
	}

  //Copia este codigo de abajo antes de escribir código en un NUEVO METODO!!!
  /*	$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			Escribe CODIGO acá......
		}else{
			redirect(base_url().'Login');
		} 
  */         
  //NO BORRES ESTE COMENTARIO PARA PODER USAR EL CODIGO SIEMPRE!!!

	public function index(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	 	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Dashboard!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/dashboard');
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}	

	public function ejemplar(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Ejemplar!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$data = [
				'ejemplar'=> $this->ejemplar_model->read()
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado',$data);
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}

	public function autor(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Autor!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$data = [
				'autor' => $this->aut->read()
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado_autor',$data);
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		}
	}

	public function add_autor(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Registrar Autor!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/formulario_autor');
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}

	public function edit_autor($id){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario']=$nombreDelUsuario;
	  	$datos['titulo'] = "Editar Autor!";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
//---------------------------------------------------------------------------------------------
			$this->load->view('Administrador/header',$datos);
			$data=[
				'autor'=> $this->aut->getById($id)
			];
			
			$this->form_validation->set_rules('auto_nombres', 'aut_nombres', 'trim|required');
	        $this->form_validation->set_rules('auto_apellidos', 'aut_apellidos', 'trim|required');
	    if ($this->form_validation->run() == FALSE){
            $this->load->view('Administrador/editar_autor',$data);
        }else{
            $this->update_autor();
        }
			
		$this->load->view('Administrador/footer');


//-------------------------------------------------------------------------------------------
		}else{
			redirect(base_url().'Login');
		}
	}

	public function insert_autor(){
		$data = [
			'auto_nombres' => $this->input->post('aut_nombres'),
			'auto_apellidos' => $this->input->post('aut_apellidos')
		];
		$this->db->insert('autor',$data);
		redirect(base_url('Administrador/autor'));
	}

	public function update_autor(){
		$this->aut->update_autor();
		redirect(base_url('Administrador/autor'));
	}

	public function usuario(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Usuario!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$data = [
				'usuario'=> $this->usuario_model->read()
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado_usuario',$data);
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		}
	}
	
	public function add_usuario(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/formulario_usuario');
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}

	public function insert_usuario(){
		$data = [
			'usua_codigo' => $this->input->post('codigo'),
			'usua_nombres' => $this->input->post('nombres'),
			'usua_apellidos' => $this->input->post('apellidos'),
			'usua_direccion' => $this->input->post('direccion'),
			'usua_email' => $this->input->post('email'),
			'usua_telefono' => $this->input->post('telefono'),
		];
		$this->db->insert('usuario',$data);
		redirect(base_url('Administrador/usuario'));
	}

	public function edit_usuario($id){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario']=$nombreDelUsuario;
	  	$datos['titulo'] = "Editar Usuario!";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
//---------------------------------------------------------------------------------------------
			$this->load->view('Administrador/header',$datos);
			$data=[
				'usuario'=> $this->usuario_model->getById($id)
			];
			
			$this->form_validation->set_rules('usua_codigo', 'Codigo', 'trim|required');
	        $this->form_validation->set_rules('usua_nombres', 'Nombres', 'trim|required');
	        $this->form_validation->set_rules('usua_apellidos', 'Apellidos', 'trim|required');
	        $this->form_validation->set_rules('usua_direccion', 'Direccion', 'trim|required');
	        $this->form_validation->set_rules('usua_login', 'Usuario', 'trim|required');
	        $this->form_validation->set_rules('usua_password', 'Password', 'trim|required');
	        $this->form_validation->set_rules('confirmar', 'Confirmar', 'trim|required');
	        $this->form_validation->set_rules('usua_email', 'E-mail', 'trim|required');
	        $this->form_validation->set_rules('usua_telefono', 'Telefono', 'trim|required');
	        $this->form_validation->set_rules('usua_esadmin', 'Tipo Usuario', 'trim|required');
	        $this->form_validation->set_error_delimiters('<div class="col-md-12 col-md-offset-3"><div class="alert alert-danger alert-dismissible fade show" role="alert">','</div></div>');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('Administrador/editar_usuario',$data);
        }else{
            $this->update_usuario();
        }
			
		$this->load->view('Administrador/footer');


//-------------------------------------------------------------------------------------------
		}else{
			redirect(base_url().'Login');
		}	
	}

	public function update_usuario(){
		$usua_codigo = $this->security->xss_clean($this->input->post('usua_codigo'));
        $usua_nombres = $this->security->xss_clean($this->input->post('usua_nombres'));
        $usua_apellidos = $this->security->xss_clean($this->input->post('usua_apellidos'));
        $usua_direccion = $this->security->xss_clean($this->input->post('usua_direccion'));
        $usua_email = $this->security->xss_clean($this->input->post('usua_email'));
        $usua_telefono = $this->security->xss_clean($this->input->post('usua_telefono'));
        $usua_login = $this->security->xss_clean($this->input->post('usua_login'));
        $usua_esadmin = $this->security->xss_clean($this->input->post('usua_esadmin'));
        $usua_password = $this->security->xss_clean(md5($this->input->post('usua_password')));
        $confirmar = $this->security->xss_clean(md5($this->input->post('confirmar')));

        $id=$this->input->post('id');
        if(md5($usua_password) == md5($confirmar)){
            $insertData = array(
                'usua_codigo'=>$usua_codigo,
                'usua_nombres'=>$usua_nombres,
                'usua_apellidos'=>$usua_apellidos,
                'usua_direccion'=>$usua_direccion,
                'usua_email'=>$usua_email,
                'usua_telefono'=>$usua_telefono,
                'usua_login'=>$usua_login,
                'usua_esadmin'=>$usua_esadmin,
                'usua_password'=>($usua_password),
            );
            $editar_usuario = $this->usuario_model->editar_usuario($insertData,$id);
		//$this->usuario_model->update_usuario();
		redirect(base_url('administrador/usuario'));
		}
	}

	public function delete_usuario($id){
      	$this->usuario_model->delete_usuario($id);
		redirect(base_url('administrador/usuario'));
	}

	//Ejemplar........
	
	public function add(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario=$this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario']=$nombreDelUsuario;
	  	$datos['titulo']="Registrar Ejemplar!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){

			$data=[
				'categoria'=>$this->ejemplar_model->getCategoria()
			];

			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/formulario',$data);
			$this->load->view('Administrador/footer');

		}else{
			redirect(base_url().'Login');
		} 
	}

	public function insert(){
		
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => 0,
			'max_height' => 0,
			'max_width' => 0
			);

		  $this->load->library('upload', $config);
		  if ($this->upload->do_upload('ejem_portada'))
			$data1 =  $this->upload->data("file_name");
		else $data1 = NULL;

		$data = [
			'ejem_titulo'=>$this->input->post('titulo'),
			'ejem_editorial'=>$this->input->post('editorial'),
			'ejem_paginas'=>$this->input->post('paginas'),
			'ejem_portada'=>$data1,
			'ejem_cate_id'=>$this->input->post('categoria'),
			'ejem_isbn'=>$this->input->post('isbn'),
			'ejem_idioma'=>$this->input->post('idioma'),
		];
		$this->ejemplar_model->insert($data);
		redirect(base_url('Administrador/Ejemplar'));
	}

	public function edit($id){ //editar ejemplar
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Editar Ejemplar!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){
			$data = [
				'ejemplar'=> $this->ejemplar_model->getById($id)
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/editar',$data);
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		}
	}

	public function update(){
		$this->ejemplar_model->update();
		redirect(base_url('administrador/ejemplar'));
	}

	public function delete($id){
		$this->ejemplar_model->delete($id);
		redirect(base_url('administrador/'));
	}






	//***************************************************************************************
	public function peticionesDeLibros(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']="Peticiones de Libros";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			$this->load->view('Administrador/header',$datos);
			
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}
	public function librosPrestados(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']="Libros Prestados";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			$this->load->view('Administrador/header',$datos);
			
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}

	public function reportes(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']="Reportes";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			$this->load->view('Administrador/header',$datos);
			
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}

	public function datosDelAdministrador(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']="Datos del Administrador";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			$this->load->view('Administrador/header',$datos);
			
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}


	//***************************************************************************************

	public function salir(){
	  
	  //NO COPIES ACÁ EL CÓDIGO
	
		$this->session->unset_userdata('usua_login');
		redirect(base_url().'Login');
	}
}
