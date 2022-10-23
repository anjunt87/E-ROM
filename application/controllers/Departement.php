<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends CI_Controller {

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

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
	
		// $data['record'] = $this->Request_model->tampildata();
		// $data['record'] =  $this->Rom_model->get_data('t_request')->result();
		// $data['record']=  $this->model_kgb->get_data("user");

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('index/index_Departement', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function positionIndex()
	{
		$data['title'] = 'Departement Setting';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result_array();
		
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('position/index_departement', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	function tambah()
	{
		$this->form_validation->set_rules('n_departement', 'Nama Departement', 'required|min_length[3]');
		$this->form_validation->set_message('required', '%s masih kosong', 'silahkan isi terlebi dahulu');
		$this->form_validation->set_message('min_length', '%s minimal 3 karakter');

		$this->form_validation->set_error_delimiters('<span class="help-block"></span>');

		if($this->form_validation->run() == FALSE)
		{
             // $this->template->load('template','bagian/form_input', $data);
		}
		else
		{
			$tambah_departement = array (
				'n_departement' => htmlspecialchars($this->input->post('n_departement'))
			);

			$this->Rom_model->insert_data($tambah_departement, 't_departement');
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Simpan</div>');
			redirect('Departement/positionIndex');
		}
	}

	function edit() 
	{
		if(isset($_POST['submit'])){
			$id       =  htmlspecialchars($this->input->post('id_departement',true));
			$n_departement      =  htmlspecialchars($this->input->post('n_departement',true));

			$edit_departement =  array(
				'n_departement' => $n_departement
			);
			$where = array ('id_departement' => $id);
			$this->Rom_model->update_data("t_departement", $edit_departement, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('Departement/positionIndex');
		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id'=>$id);            
			$data['Departement']= $this->Rom_model->find_data($param, "t_departement")->row_array();
		}
	}


	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id_departement', $id);
		$this->db->delete('t_departement');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('Departement/positionIndex');
	}
}