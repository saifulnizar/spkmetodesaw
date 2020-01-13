<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model {
	
	public $table 	= 'tb_kriteria';
	public $id 		= 'id_kriteria';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function get_all(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function get(){
		return $this->db->get($this->table)->num_rows();
	}
	
	function get_by_id($id){
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}
	
	function get_by_id_coba($i){
		$this->db->where($this->id,$i);
		return $this->db->get($this->table)->row();
	}
	
	function save($array){

		$result = $this->db->insert($this->table, $array);
		return $result;
	}
	
	function update($id, $data){
		$this->db->where($this->id, $id);
		$result = $this->db->update($this->table, $data);
        return $result;
	}
	
	function hapus($id) {
		$this->db->where($this->id, $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
	
	function simpan($data){
		$result = $this->db->insert($this->table, $data);
		return $result;
	}
}
