<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               
class autor_model extends CI_Model{
	public function __construct(){
			parent::__construct();
		}
		function read(){
			$query=$this->db->get('autor');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}
		function insert_usuario(){
			$data = [
				''=>$this->input->post('codigo'),
				'NOMBRES_AUT'=>$this->input->post('nombres'),
				'APELLIDOS_AUT'=>$this->input->post('apellidos'),
			];
			$this->db->insert('usuario',$data);
		}
		function update_usuario(){
			$id=$this->input->post('id');
			$data = [
				'usua_codigo'=>$this->input->post('codigo'),
				'usua_nombres'=>$this->input->post('nombres'),
				'usua_apellidos'=>$this->input->post('apellidos'),
				'usua_direccion'=>$this->input->post('direccion'),
				'usua_email'=>$this->input->post('email'),
				'usua_telefono'=>$this->input->post('telefono'),
			];
			$this->db->where('usua_id',$id);
			$this->db->update('usuario',$data);
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
}
?>