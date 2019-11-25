<?php
defined('BASEPATH') OR exit('No direct script access allowed');
               //extendemos CI_Model
class usuario_model extends CI_Model{
	public function __construct(){
			parent::__construct();
		}
	public function obtiene_ejemplares(){
		$this->db->select('*');
		$this->db->from('ejemplar_autor');
		$this->db->join('ejemplar', 'ejemplar.ejem_id = ejemplar_autor.rela_ejem_id');
		$this->db->join('autor', 'autor.auto_id = ejemplar_autor.rela_auto_id');
		/*$this->db->join('ejemplar_categoria', 'ejemplar_categoria.cate_id = ejemplar.ejem_cate_id');*/
		$query = $this->db->get();
		return $query->result();
   		}
		function read(){
			$query=$this->db->get('usuario');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
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