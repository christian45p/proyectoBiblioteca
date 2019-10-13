<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               //extendemos CI_Model
class ejemplar_model extends CI_Model{
	public function __construct(){
			parent::__construct();
		}
		function read(){
			$query=$this->db->get('ejemplar');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}
		function insert(){
			$data = [
				'ejem_titulo'=>$this->input->post('titulo'),
				'ejem_editorial'=>$this->input->post('editorial'),
				'ejem_paginas'=>$this->input->post('paginas'),
				'ejem_isbn'=>$this->input->post('isbn'),
				'ejem_idioma'=>$this->input->post('idioma'),

			];
			$this->db->insert('ejemplar',$data);
		}
		function update(){
			$id=$this->input->post('id');
			$data = [
				'ejem_titulo'=>$this->input->post('titulo'),
				'ejem_editorial'=>$this->input->post('editorial'),
				'ejem_paginas'=>$this->input->post('paginas'),
				'ejem_isbn'=>$this->input->post('isbn'),
				'ejem_idioma'=>$this->input->post('idioma'),
			];
			$this->db->where('ejem_id',$id);
			$this->db->update('ejemplar',$data);
		}
		function delete($id){
			$this->db->where('ejem_id',$id);
			$this->db->delete('ejemplar');
		}
		function getById($id){
			$this->db->where('ejem_id', $id);
			$query=$this->db->get('ejemplar');	
			if($query->num_rows()>0){
				return $query->row();
			}else{
				return false;
			}
		}
}
?>