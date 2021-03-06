<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               
class ejemplar_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	function read(){
		$query=$this->db->query('SELECT ejem_titulo, cate_nombre, ejem_editorial, ejem_paginas, ejem_isbn, tipo_nombre, ejem_id,ejem_anio,ejem_resumen,ejem_cate_id, GROUP_CONCAT(auto_nombres)as auto_nombres, ejem_portada FROM ejemplar,categoria,ejemplar_tipo,ejemplar_autor, autor WHERE ejem_cate_id=cate_id AND ejem_tipo_id=tipo_id AND ejem_id=rela_ejem_id AND rela_auto_id=auto_id GROUP BY ejem_id ORDER BY ejem_id DESC');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	function obtiene_ejemplar_categoria(){
        return $this->db->get('categoria')->result();
    }
    function favorito(){
        return $this->db->get('favorito')->result();
    }
	function obtiene_favorito(){
	    return $this->db->order_by('favo_ejem_id DESC')
	    				->select('*')
	    				->join('ejemplar', 'ejemplar.ejem_id = favorito.favo_ejem_id')
	    				->get('favorito')
	    				->result();
    }
    function insertarFavorito($id,$uid){
    	$this->db->insert('favorito', array('favo_ejem_id' => $id, 'favo_usua_id' => $uid));
    }
    function eliminarFavorito($id,$uid)
	{
		return $this->db->delete('favorito', array('favo_ejem_id' => $id, 'favo_usua_id' => $uid)) ? true: false;
	}
	function obtener_usuario_por_id($id)
	{
		$this->db->select('*');
		$this->db->like('usua_id', $id);
		$qry = $this->db->get('usuario');
		$rs = $qry->result_array();
		return $rs[0];
	}	
	function insert($data){
		
		$this->db->insert('ejemplar',$data);
	}
	function insertHistorial($data){
		$this->db->insert('historial',$data);
	}
	function deleteHistorial($id){
		return $this->db->delete('historial', array('histo_id' => $id)) ? true:false;
	}
	function buscarLibro($data,$categoria){

		$query=$this->db->query("SELECT * FROM ejemplar,categoria WHERE ejem_cate_id AND cate_id AND cate_id='{$categoria}' AND (ejem_titulo LIKE '%$data%' OR ejem_resumen like '%$data%' OR ejem_editorial like '%$data%')");
	
			return $query->result();
	
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

	function getPeticion(){
		$query=$this->db->query('SELECT peti_id,peti_fechareg,peti_usua_id,peti_ejem_id,ejem_id,ejem_portada,ejem_titulo,usua_id,usua_nombres FROM ejemplar,usuario,peticion WHERE peti_ejem_id=ejem_id AND peti_usua_id=usua_id');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getPeticionPorId($id){
		$query=$this->db->query("SELECT * FROM peticion WHERE peti_id='{$id}'");
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return false;
		}
	}

	function deletePeticion($id){
		return $this->db->delete('peticion', array('peti_id' => $id)) ? true:false;
	}
	function getPrestados(){
		$query=$this->db->query('SELECT pres_id,pres_usua_id,usua_nombres,ejem_portada,ejem_titulo,pres_fechareg,pres_dias,pres_fechaprestamo,pres_fechadevolucion FROM ejemplar,usuario,prestamo WHERE pres_ejem_id=ejem_id AND pres_usua_id=usua_id');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	function reportarDevolucion($id){
		return $this->db->delete('prestamo', array('pres_id' => $id)) ? true:false;
	}

	function getHistorial(){
		$query=$this->db->query('SELECT * FROM historial');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}
?>