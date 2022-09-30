<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_OHC extends CI_Controller {

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
		$this->load->view('index/index_OHC', $data);

		$this->load->view('template/dashboard/footer');
	}
}
