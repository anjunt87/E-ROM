<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		/*load Model*/
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model('Rom_model');
		$this->load->model('Request_model');
		if ($this->session->userdata('nik')=="") {
			redirect('auth/loginIndex');
		}
	} 

	// Form Request Users 
	public function Tambah()
	{	
		// memfilter berdasarkan NIK yang Login 
		
		$request = new stdClass();
		$request->id_request = null;
		$request->n_pegawai = $this->input->post('n_pegawai');
		$request->nik_request = $this->input->post('nik_request');
		$request->id_departement = $this->input->post('id_departement');
		$request->id_divisi = $this->input->post('id_divisi');		
		$request->id_jabatan = $this->input->post('id_jabatan');
		$request->id_atasan = $this->input->post('id_atasan');
		$request->k_healt = null;
		$request->rs_dokter = null;
		$request->n_pasien = null;
		$request->ttl_pasien = null;
		$request->ket = null;
		$request->pisa = null;
		$request->d_sakit = null;
		$request->kronologi = null;
		$request->kuitansi = null;
		$request->tgl_kuitansi = null;
		$request->u_berobat = null;
		$request->nominal = null;
		$request->tgl_pengajuan = null;
		// $request->bukti1 = null;
		// $request->bukti2 = null;

		$data = array(
			'page' => 'Tambah',
			'row' => $request
		);

		$data['title'] = 'Tambah Form Request';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('request/form_request', $data);
		$this->load->view('template/dashboard/footer', $data);		
	}

	public function Edit($id)
	{	
		$param  =   array('id_request'=>$id);
		$query = $this->Rom_model->find_data($param, "t_request");
		// $query = $this->Request_model->get($id);
		if($query->num_rows() > 0 ){
			$request = $query->row();
			$data = array(
				'page' => 'Edit',
				'row' => $request
			);

			$data['title'] = 'Edit Form Request';
			$data['user'] =  $this->Rom_model->dataAccount1();
			$data['record'] =  $this->Rom_model->dataAccount2();

			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('request/form_request', $data);
			$this->load->view('template/dashboard/footer', $data);		
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
				Data Berhasil di input</div>');
			redirect ('request/usersRequestHistory');
		}
	}

	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['Tambah'])){
			$this->Request_model->tambah($post);
		}elseif(isset($_POST['Edit'])){
			$this->Request_model->edit($post);
		}

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
				Data Berhasil di input</div>');
		}
		// var_dump($post);
		redirect ('request/usersRequestHistory');
	}

	// History Request Users bisa di akses berdasarkan users yg login
	public function usersRequestHistory()
	{
		$data['title'] = 'Request History';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();

		// memfilter berdasarkan NIK yang Login 
		$where = array ('nik_request' => $this->session->userdata('nik'));
		$data['request']= $this->Rom_model->find_data($where, 't_request');

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('request/request_history', $data);
		$this->load->view('template/dashboard/footer', $data);		
	}

	// Detail Request Users bisa di akses siapa saja
	public function detailRequestUser($id)
	{
		$data['title'] = 'Request Detail';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		
		$id=  $this->uri->segment(3);
		$param  =   array('id'=>$id);

		$data['request'] = $this->Rom_model->queryRequest($id);            
		// $data['request']= $this->Rom_model->find_data($param, "t_request")->row_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('request/detail_request_user', $data);
		$this->load->view('template/dashboard/footer', $data);		
	}

	// Users Request, data Akan muncul hanya di Kep Dev/Div Admin
	public function requestUsers()
	{
		$data['title'] = 'Users Request';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		// $data['record'] = $this->Request_model->tampildata();
		$data['request'] =  $this->Rom_model->get_data('t_request');


		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('request/request_users', $data);
		$this->load->view('template/dashboard/footer', $data);	
	}

	// // Permintaan Request dari Karyawan ke Departement Divisi dan OHC
	public function historyRequestApp()
	{
		$data['title'] = 'Dashboard';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		// $data['record'] = $this->Request_model->tampildata();
		$data['request'] =  $this->Rom_model->get_data('t_request');


		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('request/request_users_approve', $data);
		$this->load->view('template/dashboard/footer', $data);		
	}

	public function requestApprovedDivisi($id){
        $id=  $this->uri->segment(3);
		$this->Rom_model->ApprovedDivisi($id);
		redirect('request/requestUsers');     
	}

	public function requestApprovedDepartement($id){
        $id=  $this->uri->segment(3);
		$this->Rom_model->ApprovedDepartement($id);
		redirect('request/requestUsers');     
	}

	public function requestApprovedOhc($id){
        $id=  $this->uri->segment(3);
		$this->Rom_model->ApprovedOhc($id);
		redirect('request/requestUsers');     
	}

	public function requestApprovedKeuangan($id){
        $id=  $this->uri->segment(3);
		$this->Rom_model->ApprovedKeuangan($id);
		redirect('request/requestUsers');     
	}
}
