<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		/*load Model*/
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model('Rom_model');
		if ($this->session->userdata('nik')=="") {
			redirect('auth/loginIndex');
		}
	} 

	public function positionIndex()
	{
		$data['title'] = 'Dashboard';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		// $data['divisi'] =  $this->Rom_model->queryDivisiDepartement();
		$data['jabatan'] =  $this->Rom_model->get_data('t_jabatan')->result_array();
		
		
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('position/index_jabatan', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	function tambah() 
    {
        if(isset($_POST['submit'])){
			$n_jabatan      	=  htmlspecialchars($this->input->post('n_jabatan',true));

			$tambah_jabatan =  array(
				'n_jabatan' => $n_jabatan
			);
			$this->Rom_model->insert_data($tambah_jabatan, 't_jabatan');
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Input</div>');
			redirect('jabatan/positionIndex');
		}
    }

	function edit() 
	{
		if(isset($_POST['submit'])){
			$id       =  htmlspecialchars($this->input->post('id_jabatan',true));
			$n_jabatan      =  htmlspecialchars($this->input->post('n_jabatan',true));

			$edit_jabatan =  array(
				'n_jabatan' => $n_jabatan
			);
			$where = array ('id_jabatan' => $id);
			$this->Rom_model->update_data("t_jabatan", $edit_jabatan, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('jabatan/positionIndex');
		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id_jabatan'=>$id);            
			$data['jabatan']= $this->Rom_model->find_data($param, "t_jabatan")->row_array();
		}
	}

	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id_jabatan', $id);
		$this->db->delete('t_jabatan');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('jabatan/positionIndex');
	}
}