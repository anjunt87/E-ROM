<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

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
		$data['title'] = 'Unit Cabang Setting';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		$data['unit'] =  $this->Rom_model->queryKorwilCabangUnit();
		$data['korwil'] =  $this->Rom_model->get_data('t_korwil')->result_array();
		$data['cabang'] =  $this->Rom_model->get_data('t_cabang')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('area/index_unit', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function get_cabang()
	{
		$id_korwil = htmlspecialchars($this->input->post('id_korwil', TRUE));
		$data = $this->Rom_model->find_data(array('korwil_id' => $id_korwil), "t_cabang")->result();
		echo json_encode($data); 
	}

	function tambah(){
		if(isset($_POST['submit'])){
			$n_unit      	=  htmlspecialchars($this->input->post('n_unit',true));
			$korwil_id     =  htmlspecialchars($this->input->post('id_korwil',true));
			$cabang_id     =  htmlspecialchars($this->input->post('id_cabang',true));
			$alamat      	=  htmlspecialchars($this->input->post('alamat',true));
			$telp_unit    =  htmlspecialchars($this->input->post('telp_unit',true));
			$hp_unit      =  htmlspecialchars($this->input->post('hp_unit',true));

			$tambah_unit =  array(
				'n_unit' => $n_unit,
				'korwil_id' => $korwil_id,
				'cabang_id' => $cabang_id,
				'alamat' => $alamat,
				'telp_unit' => $telp_unit,
				'hp_unit' => $hp_unit

			);
			$this->Rom_model->insert_data($tambah_unit, 't_unit_cabang');
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Input</div>');
			redirect('unit');
		}else{
			echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Belum Berhasil Di Input</div>');
			redirect('unit');
		}
	}

	function edit() 
	{
		if(isset($_POST['submit'])){
			$id       	 =  htmlspecialchars($this->input->post('id_cabang',true));
			$n_unit      	=  htmlspecialchars($this->input->post('n_unit',true));
			$korwil_id     =  htmlspecialchars($this->input->post('id_korwil',true));
			$cabang_id     =  htmlspecialchars($this->input->post('id_cabang',true));
			$alamat      	=  htmlspecialchars($this->input->post('alamat',true));
			$telp_unit    =  htmlspecialchars($this->input->post('telp_unit',true));
			$hp_unit      =  htmlspecialchars($this->input->post('hp_unit',true));

			$edit_unit =  array(
				'n_unit' => $n_unit,
				'korwil_id' => $korwil_id,
				'cabang_id' => $cabang_id,
				'alamat' => $alamat,
				'telp_unit' => $telp_unit,
				'hp_unit' => $hp_unit
			);

			$where = array ('id_unit' => $id);
			$this->Rom_model->update_data("t_unit_cabang", $edit_unit, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('unit');

		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id_unit'=>$id);            
			$data['unit']= $this->Rom_model->find_data($param, "t_unit_cabang")->row_array();
			$data['unit'] =  $this->Rom_model->queryKorwilCabang();

		}
	}

	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id_unit', $id);
		$this->db->delete('t_unit_cabang');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('unit');
	}
}