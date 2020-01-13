<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {
	
	public $table 	= 'tb_nilai';
	public $id 		= 'id_nilai';
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
	
	function get_nilai($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_siswa', $id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function save($data){
		$result = $this->db->insert_batch($this->table, $data);
		return $result;
	}
	
	function update($id, $data){
		$this->db->where($this->id, $id);
		$result = $this->db->update($this->table, $data);
        return $result;
	}
	
	function hapus($id) {
		$this->db->where('id_siswa', $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
	
	function hapus_nilai($id) {
		$this->db->where($this->id, $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
	
	function get_normalisasi($j, $x){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_siswa', $j);
		$this->db->where('id_kriteria', $x);
		$query = $this->db->get();
		return $query->row();
	}
	
	function nilai_max($x){
		$this->db->select_max('nilai', 'data_max');
		$this->db->where('id_kriteria', $x);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	
	function join_nilai(){
	
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('data_siswa', 'data_siswa.id_siswa = tb_nilai.id_siswa');
		$this->db->join('data_guru', 'data_guru.id_guru = data_siswa.id_guru');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_coba_normalisasi($j, $i){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_siswa', $j);
		$this->db->where('id_kriteria', $i);
		$query = $this->db->get();
		return $query->row();
	}
	
	function nilai_coba_max($i){
		$this->db->select_max('nilai', 'data_max');
		$this->db->where('id_kriteria', $i);
		$query = $this->db->get($this->table);
		return $query->row();
	}
}
