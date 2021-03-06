<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               //extendemos CI_Model
class usuario_model extends CI_Model{
	public function __construct(){
			parent::__construct();
		}
	
		function read(){
			$query=$this->db->get('usuario');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}
		 function obtiene_ejemplar_tipo(){
        return $this->db->get('ejemplar_tipo')->result();
    			}	
		function obtiene_ejemplar_area(){
        return $this->db->get('ejemplar_area')->result();
    			}
		function insert_usuario(){
			$data = [
				'usua_codigo'=>$this->input->post('codigo'),
				'usua_nombres'=>$this->input->post('nombres'),
				'usua_apellidos'=>$this->input->post('apellidos'),
				'usua_direccion'=>$this->input->post('direccion'),
				'usua_email'=>$this->input->post('email'),
				'usua_telefono'=>$this->input->post('telefono'),

			];
			$this->db->insert('usuario',$data);
		}
		function editar_usuario($data,$id){
			
			if($this->db->update('usuario', $data, 'usua_id = '.$id))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function delete_usuario($id){
			$this->db->where('usua_id',$id);
			$this->db->delete('usuario');
		}
		
		function getById($id){
			$this->db->where('usua_id', $id);
			$query=$this->db->get('usuario');	
			if($query->num_rows()>0){
				return $query->row();
			}else{
				return false;
			}
		}

		function obtenerUsuarioPorId($id){
				$this->db->select('*');
				$this->db->like('usua_id', $id);
				$qry = $this->db->get('usuario');
				$rs = $qry->result_array();
				return $rs[0];	
		}

		public function resultado($valor){
        return $this->db->like('ejem_titulo',$valor)
        				->get('ejemplar')
        				->result();
    			}    
}
?>