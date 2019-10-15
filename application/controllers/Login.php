<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginModelo');
		
	}
	public function index()
	{
    $this->load->view('header');
    $data['titulo']= 'Ingresar Datos Login';
    $this->load->view('Login/loginHeader',$data);
    $this->load->view('Login/loginView');
    $this->load->view('Login/loginFooter');
    $this->load->view('footer');
	}
  
	public function evaluaAcceso()
	{
		$this->form_validation->set_rules('usua_login', 'Usuario', 'trim|required');
    	$this->form_validation->set_rules('usua_password', 'Password', 'trim|required');
    	$this->form_validation->set_rules('usua_esadmin', 'Tipo Usuario', 'trim|required');
    	if ($this->form_validation->run()){
    		$usua_login=$this->input->post('usua_login');
    		$usua_password=$this->input->post('usua_password');
    		$usua_esadmin=$this->input->post('usua_esadmin');
 			$resultado = $this->loginModelo->obtener_usuario($usua_login, $usua_password, $usua_esadmin);
 		if($this->loginModelo->acceso_correcto($usua_login,$usua_password,$usua_esadmin)){

 			$sessionData=array(
 				'usua_login' => $resultado[0]->usua_login, 
                'usua_id' => $resultado[0]->usua_id, 
                'usua_esadmin' => $resultado[0]->usua_esadmin, 
                'usua_nombres' => $resultado[0]->usua_nombres, 
                'usua_apellidos' => $resultado[0]->usua_apellidos, 
                'usua_codigo' => $resultado[0]->usua_codigo,  
                'usua_password' => md5($resultado[0]->usua_password),  
                'currently_logged_in' => 1 
 			);
 			$this->session->set_userdata($sessionData);
 			if($resultado[0]->usua_esadmin==1){
 				redirect(base_url().'index.php/administrador');
 			}else if($resultado[0]->usua_esadmin==0){
 				redirect(base_url().'index.php/usuario');
 			}
 			
 		}else{
 			$this->session->set_flashdata('error','Invalido usuario y password');
 			redirect(base_url().'index.php/Login');
 		}

    	}else{
    		$this->index();
    	}
	}

	public function Registro()
	{	
		$data['titulo']= 'Registro de Usuario';
		$this->load->view('Login/loginHeader',$data);
		
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
      $this->load->view('Login/registroView');
   	 }
    else
    {

		$this->evaluaRegistro();
	}
    }
	public function evaluaRegistro()
	{

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
      
      //$options = array("cost"=>3);
      //$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
      if (md5($usua_password)==md5($confirmar)) {
          $insertData = array('usua_codigo'=>$usua_codigo,
                'usua_nombres'=>$usua_nombres,
                'usua_apellidos'=>$usua_apellidos,
                'usua_direccion'=>$usua_direccion,
                'usua_email'=>$usua_email,
                'usua_telefono'=>$usua_telefono,
                'usua_login'=>$usua_login,
                'usua_esadmin'=>$usua_esadmin,
                'usua_password'=>($usua_password),
              );
          $insertar_ejemplar = $this->loginModelo->insertar_usuarios($insertData);
          redirect(base_url()."index.php/Login");

         /* $verifica_doble = $this->loginModelo->verifica_doble($usua_login);
          if($verifica_doble == 0){
            $insertar_ejemplar = $this->loginModelo->insertar_usuarios($insertData);
       
            if($insertar_ejemplar)
            {
              $this->session->set_flashdata('successMsg', 'Usuario registrado correctamente');
              redirect('home');
            }
            else
            {
              $data['errorMsg'] = 'Error al guardar usuario, intente otra vez';
              $this->load->view('admin/adduser_view', $data);
            }
          }            else
            {
              $data['errorMsg'] = 'Codigo y/o nombre de usuario repetido , ingrese de nuevo';
        
               $this->load->view('registroView', $data);
            }*/
        }
      else
      {
        /*$data['errorMsg'] = 'Error al guardar usuario, intente otra vez';
              $this->load->view('registroView', $data);*/
              redirect(base_url()."index.php/Login");
      }
    }     	

}
