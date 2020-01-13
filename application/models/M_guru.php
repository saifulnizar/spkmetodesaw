<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {
	
	public $table 	= 'data_guru';
	public $id 		= 'id_guru';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function get_all(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function get_by_id($id){
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}
	
	function save($data){
		
		$result = $this->db->insert($this->table, $data);
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
	
	function get_private(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->id, $this->session->userdata('id_guru'));
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_active(){
		$id = 0;
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_guru !=', $this->session->userdata('id_guru'));
		$this->db->where('level ', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_nonactive(){
		$id = 0;
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_guru !=', $this->session->userdata('id_guru'));
		$this->db->where('level !=', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	
}
