<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('ejemplar_model');
		}

  //Copia este codigo de abajo antes de escribir código en un NUEVO METODO!!!
  /*	$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			Escribe CODIGO acá......
		}else{
			redirect(base_url().'Login');
		} 
  */         
  //NO BORRES ESTE COMENTARIO PARA PODER USAR EL CODIGO SIEMPRE!!!

	public function index(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
	  	$nombreDelUsuario=$this->session->userdata('usua_nombres');
	  	$datos['nombreDelUsuario']=$nombreDelUsuario;
	  	$datos['titulo']='Portada';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			$datos['resultado']  = $this->ejemplar_model->read();
			$datos['grado'] = $this->session->userdata('usua_login');
			$datos['categoria']  = $this->ejemplar_model->obtiene_ejemplar_categoria();
			$datos['favorito']  = $this->ejemplar_model->favorito();
			$this->load->view('Usuarios/header',$datos);
			$this->load->view('Usuarios/dashboard');			
			$this->load->view('Usuarios/footer');
		}else{
			redirect(base_url().'Login');
		}		
	}
	public function contenido(){
		$datos['resultado']  = $this->ejemplar_model->read();
		$this->load->view('Usuarios/contenido',$datos);
	}
	public function buscarLibro(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']='Busqueda de Libros';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
		
   
		$this->load->view('Usuarios/header',$datos);
		$valor = $this->input->post('valor');
		
		
		$IdUsuario=$this->session->userdata('usua_id');
	 	$dato=[
	 		'histo_usua_id'=>$IdUsuario,
	 		'histo_termino'=>$valor,
	 		'histo_fechareg'=>date("Y-m-d H:i:s"),
	 	];
	 	if ($valor != '') {
	 	$this->ejemplar_model->insertHistorial($dato);
	 	}
		$categoria = $this->input->post('categoria');
		$data=[
			'resultado'=>$this->ejemplar_model->buscarLibro($valor,$categoria),
		];
		$this->load->view('Usuarios/buscar_libro',$data);
		$this->load->view('Usuarios/footer');

		}else{
			redirect(base_url().'Login');
		} 
	}
	
	 	

	

	public function misLibrosFavoritos(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']='Libros Favoritos';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			$this->load->view('Usuarios/header',$datos);
			 $datos['resultado'] = $this->ejemplar_model->obtiene_favorito();
			$this->load->view('Usuarios/librosFavoritos',$datos);
			$this->load->view('Usuarios/footer');
		}else{
			redirect(base_url().'Login');
		} 
		
	}

	public function historialDeBusqueda(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']='Historial de Búsqueda';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){


			$data=[
				'historial'=>$this->ejemplar_model->getHistorial(),
			];


			$this->load->view('Usuarios/header',$datos);
			$this->load->view('Usuarios/historial',$data);
			$this->load->view('Usuarios/footer');
		}else{
			redirect(base_url().'Login');
		} 
		
	}
	public function delete_historial($id){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']='Historial de Búsqueda';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){


			$this->ejemplar_model->deleteHistorial($id);


			$this->load->view('Usuarios/header',$datos);
			$this->load->view('Usuarios/footer');
		}else{
			redirect(base_url().'Login');
		}
			
			$this->load->view('Usuarios/footer');
	}


	public function datosDeUsuario(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']='Datos de Usuario';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			$this->load->view('Usuarios/header',$datos);
			$this->load->view('Usuarios/footer');
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
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Usuarios/datos_usuario',$data);
            
        }
        else
        {
        	
        	$this->evaluaActualizarDatos();
        }
        

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
	            	redirect(base_url('usuario/index'));
	            }else{
	            	redirect(base_url('usuario/datosDeUsuario'));
	            }
			//$this->usuario_model->update_usuario();
			
			}
	}

	public function salir(){
	  //NO COPIES ACÁ EL CODIGO
		$this->session->unset_userdata('usua_login');
		redirect(base_url().'Login');
	}
	public function agregarFavorito($id){
            $uid = $this->session->userdata('usua_id');
            $insertar_favorito = $this->ejemplar_model->insertarFavorito($id, $uid);
			redirect(base_url().'usuario/index/');
        
    }
    public function eliminarFavoritoPortada($id)
    {		
    		$uid = $this->session->userdata('usua_id');
            $this->ejemplar_model->eliminarFavorito($id,$uid);
            redirect(base_url().'usuario/index/');
     }

	public function pedir(){
		$ide = $this->input->post('ide');
		$fecha = $this->input->post('fecha');
		$idu = $this->session->userdata('usua_id');
		$dias=$this->input->post('peti_dias');

		$this->db->query("INSERT INTO peticion(peti_ejem_id,peti_usua_id,peti_fechareg,peti_dias)
			VALUES('{$ide}','{$idu}','{$fecha}','{$dias}')");
		
		redirect(base_url().'usuario/index/');
	}

	public function librosPrestados(){
		$tipoDeUsuario=$this->session->userdata('usua_esadmin');
		$nombreDelUsuario=$this->session->userdata('usua_nombres');
		$datos['nombreDelUsuario']=$nombreDelUsuario;
		$datos['titulo']='Libros Prestados';
		if($this->session->userdata('usua_login')&&$tipoDeUsuario==0){
			$data =[
				'prestados'=> $this->ejemplar_model->getPrestados(),
			];
			$this->load->view('Usuarios/header',$datos);
			$this->load->view('Usuarios/libros_prestados',$data);
			$this->load->view('Usuarios/footer');
		}else{
			redirect(base_url().'Login');
		} 

	}
}
