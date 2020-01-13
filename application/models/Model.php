<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	
	
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function validate(){
		$where = array(
			'nama_guru'	=> $this->input->post('nama'),
			'sandi'		=> $this->input->post('sandi')
		);
		
		return $this->db->get_where('data_guru', $where);
	}
}
