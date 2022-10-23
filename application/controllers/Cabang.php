<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

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
		$data['title'] = 'Cabang Setting';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		$data['cabang'] =  $this->Rom_model->queryKorwilCabang();
		$data['korwil'] =  $this->Rom_model->get_data('t_korwil')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('area/index_cabang', $data);
		$this->load->view('template/dashboard/footer');
	}

	function tambah(){
		if(isset($_POST['submit'])){
			$n_cabang      	=  htmlspecialchars($this->input->post('n_cabang',true));
			$korwil_id     =  htmlspecialchars($this->input->post('id_korwil',true));
			$alamat      	=  htmlspecialchars($this->input->post('alamat',true));
			$telp_cabang    =  htmlspecialchars($this->input->post('telp_cabang',true));
			$hp_cabang      =  htmlspecialchars($this->input->post('hp_cabang',true));

			$tambah_cabang =  array(
				'n_cabang' => $n_cabang,
				'korwil_id' => $korwil_id,
				'alamat' => $alamat,
				'telp_cabang' => $telp_cabang,
				'hp_cabang' => $hp_cabang

			);
			$this->Rom_model->insert_data($tambah_cabang, 't_cabang');
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Input</div>');
			redirect('cabang');
		}else{
			echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Belum Berhasil Di Input</div>');
			redirect('cabang');
		}
	}

	function edit() 
	{
		if(isset($_POST['submit'])){
			$id       	 =  htmlspecialchars($this->input->post('id_cabang',true));
			$n_cabang    =  htmlspecialchars($this->input->post('n_cabang',true));
			$korwil_id     =  htmlspecialchars($this->input->post('id_korwil',true));
			$alamat      =  htmlspecialchars($this->input->post('alamat',true));
			$telp_cabang =  htmlspecialchars($this->input->post('telp_cabang',true));
			$hp_cabang   =  htmlspecialchars($this->input->post('hp_cabang',true));

			$edit_cabang =  array(
				'n_cabang' => $n_cabang,
				'korwil_id' => $korwil_id,
				'alamat' => $alamat,
				'telp_cabang' => $telp_cabang,
				'hp_cabang' => $hp_cabang

			);
			$where = array ('id_cabang' => $id);
			$this->Rom_model->update_data("t_cabang", $edit_cabang, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('cabang');

		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id_cabang'=>$id);            
			$data['cabang']= $this->Rom_model->find_data($param, "t_cabang")->row_array();
			$data['cabang'] =  $this->Rom_model->queryKorwilCabang();

		}
	}

	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id_cabang', $id);
		$this->db->delete('t_cabang');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('cabang');
	}
}