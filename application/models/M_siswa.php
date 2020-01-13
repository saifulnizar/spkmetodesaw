<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {
	
	public $table 	= 'data_siswa';
	public $id 		= 'id_siswa';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function get_nim($id){
		$query = $this->db->get_where('data_siswa', array('nisn' => $id));
        return $query;
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
	
		function get_by_nisn($x){
		$this->db->where('nisn',$x);
		return $this->db->get($this->table)->row();
	}
	
	function get_by_id_coba($i){
		$this->db->where($this->id,$i);
		return $this->db->get($this->table)->row();
	}
	
	function get_siswa(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_guru', $this->session->userdata('id_guru'));
		$query = $this->db->get();
		return $query->result();
		
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
	
	function get_info($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('data_guru', 'data_guru.id_guru = data_siswa.id_guru');
		$this->db->where($this->id, $id);
		$query = $this->db->get();
		return $query->result();
	}
}
