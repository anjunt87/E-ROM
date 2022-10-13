<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		/*load Model*/
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model('Rom_model');
		$this->load->model('Request_model');
		if ($this->session->userdata('nik') == '') {
			redirect('auth/loginIndex');
		}
	} 

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		// $data['record'] =  $this->Rom_model->get_data('t_request')->result();
		
		// $data['record'] = $this->Request_model->tampildata();
		// $data['record']=  $this->model_kgb->get_data("user");

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('index/index_Divisi', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function positionIndex()
	{
		$data['title'] = 'Divisi Setting';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		$data['divisi'] =  $this->Rom_model->queryDivisiDepartement();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result_array();
		
		
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('position/index_divisi', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	function tambah()
    {	
    	if(isset($_POST['submit'])){
			$id_departement       =  htmlspecialchars($this->input->post('id_departement',true));
			$n_divisi      =  htmlspecialchars($this->input->post('n_divisi',true));

			$tambah_divisi =  array(
				'departement_id' => $id_departement,
				'n_divisi' => $n_divisi
			);
			$this->Rom_model->insert_data($tambah_divisi, 't_divisi');
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Input</div>');
			redirect('divisi/positionIndex');
		}
    }

	function edit() 
	{	
		$data['divisi'] =  $this->Rom_model->queryDivisiDepartement();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result_array();

		if(isset($_POST['submit'])){
			$id       =  htmlspecialchars($this->input->post('id_divisi',true));
			$id_departement       =  htmlspecialchars($this->input->post('id_departement',true));
			$n_divisi      =  htmlspecialchars($this->input->post('n_divisi',true));

			$edit_divisi =  array(
				'departement_id' => $id_departement,
				'n_divisi' => $n_divisi
			);
			$where = array ('id_divisi' => $id);
			$this->Rom_model->update_data("t_divisi", $edit_divisi, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('divisi/positionIndex');
		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id_divisi'=>$id);            
			$data['divisi']= $this->Rom_model->find_data($param, "t_divisi")->row_array();
		}
	}


	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id_divisi', $id);
		$this->db->delete('t_divisi');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('divisi/positionIndex');
	}
}
