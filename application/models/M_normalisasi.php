<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_normalisasi extends CI_Model {
	
	public $table 	= 'tb_normal';
	public $id 		= 'id_normal';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function get_all(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function cek(){
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	
	function get_by_id($id){
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}
	function get_join(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('data_siswa', 'data_siswa.id_siswa = tb_normal.id_siswa');
		$query = $this->db->get();
		return $query->result();
	}
	
	function save($data){
		$result = $this->db->insert($this->table, $data);
		return $result;
	}
		
	function hapus($id) {
		$this->db->where($this->id, $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
}
