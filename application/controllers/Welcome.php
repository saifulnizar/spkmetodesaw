<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('Model');
	}
	
	
	public function index()
	{
		
		$this->load->view('welcome_message');
	}
	
	function login(){
		$where = array(
			'nama_guru'	=> $this->input->post('nama'),
			'sandi'		=> $this->input->post('sandi')
		);
		$validate = $this->Model->validate('data_guru', $where);
   
	   if($validate->num_rows() > 0){
			 $data  = $validate->row_array();
			 
        $id_guru	= $data['id_guru'];
		$name		= $data['nama_guru'];
		$ket		= $data['keterangan'];
        $sandi 		= $data['sandi'];
        $level 		= $data['level'];
        $sesdata = array(
			'id_guru'	=> $id_guru,
            'username'  => $name,
			'keterangan'=> $ket,
            'sandi'     => $sandi,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
			if($level === '1'){
				redirect('admin');
	 
				}elseif ($level === '0'){
				redirect('user');
			}else{
				echo $this->session->set_flashdata('msg','Akun anda belum di aktifkan');
			redirect('welcome');
			}
		}else{
			echo $this->session->set_flashdata('msg','Username or Password is Wrong');
			redirect('welcome');
		}
	}
	
	function logout(){
      $this->session->sess_destroy();
      redirect('welcome');
  }
 
}
