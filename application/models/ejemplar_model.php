<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               
class ejemplar_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	function read(){
		$query=$this->db->query('SELECT ejem_titulo, cate_nombre, ejem_editorial, ejem_paginas, ejem_isbn, tipo_nombre, ejem_id, GROUP_CONCAT(auto_nombres)as auto_nombres, ejem_portada FROM ejemplar,categoria,ejemplar_tipo,ejemplar_autor, autor WHERE ejem_cate_id=cate_id AND ejem_tipo_id=tipo_id AND ejem_id=rela_ejem_id AND rela_auto_id=auto_id GROUP BY ejem_id ORDER BY ejem_id DESC');
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
		$this->db->delete('ejemplar_autor', array('rela_ejem_id' => $id));
		$this->db->delete('prestamo', array('pres_ejem_id' => $id));
		$this->db->delete('peticion', array('peti_ejem_id' => $id));
		return $this->db->delete('ejemplar', array('ejem_id' => $id)) ? true : false;
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
}
?>