<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ejemplar_model');
		$this->load->model('autor_model','aut');
		$this->load->model('usuario_model');}
		//sdfbkdsfhbdkasjhfkashfkjashfkljhfkdjshfkjas

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
		if(!$this->session->userdata('usua_login') || $tipoDeUsuario != 1)
			redirect(base_url().'Login');
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/dashboard');
			$this->load->view('Administrador/footer');
	}	

	public function ejemplar(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Ejemplar!";
		if(!$this->session->userdata('usua_login') || $tipoDeUsuario != 1)
			redirect(base_url().'Login');

			$data = [
				'ejemplar'=> $this->ejemplar_model->read(),
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado',$data);
			$this->load->view('Administrador/footer');

	}

	//Ejemplar........
	
	public function add(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario=$this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario']=$nombreDelUsuario;
	  	$datos['titulo']="Registrar Ejemplar!";
		if($this->session->userdata('usua_login') && $tipoDeUsuario == 1){

			$data=[
				'categoria'=>$this->ejemplar_model->getCategoria(),
				'autores'=>$this->db->query("SELECT * FROM autor")->result(),
				'tipo'	=>$this->db->query("SELECT * FROM ejemplar_tipo")->result(),
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
		  if ($this->upload->do_upload	('ejem_portada'))
			$data1 =  $this->upload->data("file_name");
		else $data1 ="imagen.jpg";


		$data = [
			'ejem_portada'=>$data1,
			'ejem_titulo'=>$this->input->post('titulo'),
			/*'ejem_autor'=>$this->input->post('autores'),*/
			'ejem_tipo_id' => $this->input->post('tipo'),
			'ejem_editorial'=>$this->input->post('editorial'),
			'ejem_paginas'=>$this->input->post('paginas'),
			'ejem_cate_id'=>$this->input->post('categoria'),
			'ejem_isbn'=>$this->input->post('isbn'),
			'ejem_anio'=>$this->input->post('año'),
			'ejem_idioma'=>$this->input->post('idioma'),
			'ejem_resumen'=>$this->input->post('resumen'),
		];
		$this->ejemplar_model->insert($data);
		$id = $this->db->insert_id();
		$autores = $this->input->post('autores');
		foreach($autores as $autor){
			$this->db->insert('ejemplar_autor',array('rela_auto_id'=>$autor,'rela_ejem_id'=>$id));
		}
		redirect(base_url('Administrador/Ejemplar'));
	}

	public function edit($id){ //editar ejemplar
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Editar Ejemplar!";
		if(!$this->session->userdata('usua_login') || $tipoDeUsuario != 1)
			redirect(base_url().'Login');

		$data = [
			'ejemplar'=> $this->ejemplar_model->getById($id),
			'categoria'=>$this->ejemplar_model->getCategoria(),
			'autores'=>$this->db->query("SELECT * FROM autor")->result(),
			'autores_sel'=>$this->db->query("SELECT * FROM ejemplar_autor WHERE rela_ejem_id={$id}")->result(),
			'tipo'=>$this->db->query("SELECT * FROM ejemplar,ejemplar_tipo WHERE ejem_id={$id}")->result()
		];



		///print_r($data);
		$this->load->view('Administrador/header',$datos);
		$this->load->view('Administrador/editar',$data);
		$this->load->view('Administrador/footer');

	}

	public function update(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Editar Ejemplar!";
		if(!$this->session->userdata('usua_login') || $tipoDeUsuario != 1)
			redirect(base_url().'Login');
		$id=$this->input->post('id');
		$config = array('upload_path' => "./uploads/",
			                  'allowed_types' => "gif|jpg|png|jpeg|pdf|mp3",
			                  'overwrite' => TRUE,
			                  'max_size' => 0,
			                  'max_height' => 0,
			                  'max_width' => 0
			                  );

		 	$this->load->library('upload', $config);
                if ($this->upload->do_upload('new_ejem_portada'))
                  $data1 =  $this->upload->data("file_name");
              	else $data1 = $this->input->post('ejem_portada');

		$data = [
			'ejem_titulo'=>$this->input->post('titulo'),
			'ejem_editorial'=>$this->input->post('editorial'),
			'ejem_portada'=>$data1,
			'ejem_cate_id'=>$this->input->post('categoria'),
			'ejem_tipo_id'=>$this->input->post('tipo'),
			'ejem_paginas'=>$this->input->post('paginas'),
			'ejem_isbn'=>$this->input->post('isbn'),
			'ejem_anio'=>$this->input->post('año'),
			'ejem_idioma'=>$this->input->post('idioma'),
			'ejem_resumen'=>$this->input->post('resumen'),
		];
		$autores = $this->input->post('autores');
		$this->ejemplar_model->update($id,$data);

		$this->db->query("DELETE FROM ejemplar_autor WHERE rela_ejem_id='{$id}'");
		foreach($autores as $autor){
			$this->db->insert('ejemplar_autor',array('rela_auto_id'=>$autor,'rela_ejem_id'=>$id));
		}
		redirect(base_url('administrador/ejemplar'));
	}

	public function delete($id){
		$this->ejemplar_model->delete($id);
		redirect(base_url('administrador/'));
	}


	public function autor(){
		$tipoDeUsuario = $this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario = $this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario'] = $nombreDelUsuario;
	  	$datos['titulo'] = "Autor";
		if(!$this->session->userdata('usua_login') || $tipoDeUsuario != 1)
			redirect(base_url().'Login');
			$data = [
				'autor' => $this->aut->read()
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado_autor',$data);
			$this->load->view('Administrador/footer');

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
	public function insert_autor(){
		$data = [
			'auto_nombres' => $this->input->post('aut_nombres'),
			'auto_apellidos' => $this->input->post('aut_apellidos'),
			'auto_biografia' => $this->input->post('auto_biografia')

		];
		if($this->db->insert('autor',$data)){
			redirect(base_url('Administrador/autor'));
		}else{

			redirect(base_url('Administrador/add_autor'));
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
	        $this->form_validation->set_rules('auto_biografia', 'auto_biografia', 'trim|required');
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

	public function delete_autor($id){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			$this->aut->delete_autor($id);
			redirect(base_url('administrador/autor'));
		}else{
			redirect(base_url().'Login');
		} 
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

	





	//***************************************************************************************

	

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

		$usuarioId=$this->session->userdata('usua_id');
    	$data=[
				'usuario'=> $this->usuario_model->getById($usuarioId)
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
            $this->load->view('Administrador/editar_administrador',$data);
        }else{
            $this->evaluaActualizarDatos();
        }
			

			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}
	public function evaluaActualizarDatos(){
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
	        $usuarioId=$this->session->userdata('usua_id');
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
	            $editar_usuario = $this->usuario_model->editar_usuario($insertData,$usuarioId);

	            if($editar_usuario){
	            	echo "<script>alert(\"La actualización fue un exito!\");</script>";
	            	redirect(base_url('administrador/index'));
	            }else{
	            	redirect(base_url('administrador/datosDelAdministrador'));
	            }
			//$this->usuario_model->update_usuario();
			
			}
	}


	//***************************************************************************************
	public function peticionesDeLibros(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']="Peticiones de Libros";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){

			$data = [
				'ejemplar'=> $this->ejemplar_model->getPeticion(),
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado_pedidos',$data);
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}
	public function aceptarPedido($id){

		$datos=$this->ejemplar_model->getPeticionPorId($id);
		$idEjem=$datos->peti_ejem_id;
		$dias=$datos->peti_dias;
		$idUsuario=$datos->peti_usua_id;
		$fechaPrestamo=$datos->peti_fechareg;
		$hoy = date("Y-m-d H:i:s");
		$hoydia=date(date("d")+03);	
		$devolucion= date("Y-m-".$hoydia." H:i:s");

		$insertData = [
			'pres_usua_id'=> $idUsuario,
			'pres_ejem_id'=> $idEjem,
			'pres_fechareg'=> $hoy,
			'pres_dias'=> $dias,
			'pres_fechaprestamo'=>$fechaPrestamo,
			'pres_fechadevolucion'=>$devolucion,
		];

		
		$insertar=$this->db->insert('prestamo',$insertData);
		$eliminar=$this->ejemplar_model->deletePeticion($id);
		if($insertar && $eliminar){
			redirect(base_url('Administrador/peticionesDeLibros'));
		}

	}
	public function declinarPedido($id){
		$eliminar=$this->ejemplar_model->deletePeticion($id);
		if($eliminar){
			redirect(base_url('Administrador/peticionesDeLibros'));
		}
	}
	public function librosPrestados(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']="Libros Prestados";
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==1){
			$data =[
				'prestados'=> $this->ejemplar_model->getPrestados(),
			];
			$this->load->view('Administrador/header',$datos);
			$this->load->view('Administrador/listado_prestados',$data);
			$this->load->view('Administrador/footer');
		}else{
			redirect(base_url().'Login');
		} 
	}

	public function reportarDevolucion($id){
		$eliminar=$this->ejemplar_model->reportarDevolucion($id);
		if($eliminar){
			redirect(base_url('Administrador/librosPrestados'));
		}
	}

	public function salir(){
	  
	  //NO COPIES ACÁ EL CÓDIGO
	
		$this->session->unset_userdata('usua_login');
		redirect(base_url().'Login');
	}
}
