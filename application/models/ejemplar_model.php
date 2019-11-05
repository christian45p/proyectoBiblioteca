<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               
class ejemplar_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	function read(){
		$query=$this->db->query('SELECT * FROM ejemplar,autor,ejemplar_autor,categoria WHERE ejem_id=rela_ejem_id AND rela_auto_id=auto_id AND ejem_cate_id=cate_id');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	
	function insert($data){
		
		$this->db->insert('ejemplar',$data);
	}

	function update($id,$data){
		
		$this->db->where('ejem_id',$id);
		$this->db->update('ejemplar',$data);
	}

	function delete($id){
		$this->db->where('ejem_id',$id);
		$this->db->delete('ejemplar');
	}

	function getById($id){
		//$this->db->where('ejem_id', $id);
		$query=$this->db->query("SELECT * FROM ejemplar,categoria where ejem_cate_id=cate_id and ejem_id='{$id}'");	
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
	}

	function getCategoria(){
		$query=$this->db->query('SELECT * FROM categoria');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
		function getAutor(){
		$query=$this->db->query('SELECT * FROM autor');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}
?>