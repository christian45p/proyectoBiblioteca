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
		function insert_autor(){
			$data = [
				'auto_nombres'=>$this->input->post('aut_nombres'),
				'auto_apellidos'=>$this->input->post('aut_apellidos')
			];
			$this->db->insert('usuario',$data);
		}
		function update_autor(){
			$id=$this->input->post('id');
			$data = [
				'auto_nombres'=>$this->input->post('aut_nombres'),
				'auto_apellidos'=>$this->input->post('aut_apellidos')
			];
			$this->db->where('auto_id',$id);
			$this->db->update('autor',$data);
		}
		function delete_usuario($id){
			$this->db->where('auto_id',$id);
			$this->db->delete('autor');
		}
		function getById($id){
			$this->db->where('auto_id', $id);
			$query=$this->db->get('autor');	
			if($query->num_rows()>0){
				return $query->row();
			}else{
				return false;
			}
		}
}
?>