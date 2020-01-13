<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rank extends CI_Model {
	
	public $table 	= 'tb_rank';
	public $id 		= 'id_hasil';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function get_all(){
		$this->db->order_by('nilai', $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function join_siswa(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('data_siswa', 'data_siswa.id_siswa = tb_rank.id_siswa');
		$this->db->order_by('nilai', $this->order);
		$query = $this->db->get();
		return $query->result();
	}
	
	function join_siswa_private(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('data_siswa', 'data_siswa.id_siswa = tb_rank.id_siswa');
		$this->db->where('id_guru', $this->session->userdata('id_guru'));
		$this->db->order_by('nilai', $this->order);
		$query = $this->db->get();
		return $query->result();
	}
	
	function cek(){
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	
	function get_by_id($id){
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}
	
	
	function save($save){
		$result = $this->db->insert($this->table, $save);
		return $result;
	}
		
	function hapus($y) {
		$this->db->where($this->id, $y);
		$result = $this->db->delete($this->table);
		return $result;
	}
}
