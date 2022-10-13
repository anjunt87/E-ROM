<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Korwil extends CI_Controller {

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
		$data['korwil'] =  $this->Rom_model->get_data('t_korwil')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('area/index_korwil', $data);
		$this->load->view('template/dashboard/footer');
	}

	function tambah(){
		if(isset($_POST['submit'])){
			$n_korwil      	=  htmlspecialchars($this->input->post('n_korwil',true));
			$n_korwil2      =  htmlspecialchars($this->input->post('n_korwil2',true));
			$alamat      	=  htmlspecialchars($this->input->post('alamat',true));
			$telp_korwil    =  htmlspecialchars($this->input->post('telp_korwil',true));
			$hp_korwil      =  htmlspecialchars($this->input->post('hp_korwil',true));

			$tambah_korwil =  array(
				'n_korwil' => $n_korwil,
				'n_korwil2' => $n_korwil2,
				'alamat' => $alamat,
				'telp_korwil' => $telp_korwil,
				'hp_korwil' => $hp_korwil

			);
			$this->Rom_model->insert_data($tambah_korwil, 't_korwil');
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Input</div>');
			redirect('korwil');
		}
	}

	function edit() 
	{
		if(isset($_POST['submit'])){
			$id       	 =  htmlspecialchars($this->input->post('id_korwil',true));
			$n_korwil    =  htmlspecialchars($this->input->post('n_korwil',true));
			$n_korwil2   =  htmlspecialchars($this->input->post('n_korwil2',true));
			$alamat      =  htmlspecialchars($this->input->post('alamat',true));
			$telp_korwil =  htmlspecialchars($this->input->post('telp_korwil',true));
			$hp_korwil   =  htmlspecialchars($this->input->post('hp_korwil',true));

			$edit_departement =  array(
				'n_korwil' => $n_korwil,
				'n_korwil2' => $n_korwil2,
				'alamat' => $alamat,
				'telp_korwil' => $telp_korwil,
				'hp_korwil' => $hp_korwil

			);
			$where = array ('id_korwil' => $id);
			$this->Rom_model->update_data("t_korwil", $edit_departement, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('korwil');

		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id_korwil'=>$id);            
			$data['korwil']= $this->Rom_model->find_data($param, "t_korwil")->row_array();
		}
	}

	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id_korwil', $id);
		$this->db->delete('t_korwil');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('korwil');
	}
}