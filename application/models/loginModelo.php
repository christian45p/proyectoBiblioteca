<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginModelo extends CI_Model {

    function acceso_correcto($usua_login,$usua_password,$usua_esadmin) {  
  
        $this->db->where('usua_login', $usua_login);  
        $this->db->where('usua_password', md5($usua_password));
        $this->db->where('usua_esadmin', $usua_esadmin);  
        //$this->db->select('*');
        $query = $this->db->get('usuario');  
  
        if ($query->num_rows() >0)  
        {  
            return true;  
        } else {  
            return false;  
        }  
  
    }  
    
    function obtener_usuario($login, $password, $admin)
    {
        $this->db->where('usua_login', $login);
        $this->db->where('usua_password', md5($password));
        $this->db->where('usua_esadmin', ($admin));
        $query = $this->db->get('usuario');
        return $query->result();
    }  
        function verifica_doble( $usua_login)
    {
        $this->db->select('usua_login');
        $this->db->from('usuario');
        $this->db->like('usua_login', $usua_login);
        return $this->db->count_all_results();
    }
    
    function insertar_usuarios($data)
    {
        if($this->db->insert('usuario', $data))
        {
            return  $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }
   
}   