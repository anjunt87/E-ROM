<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends CI_Controller {

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
		$data['title'] = 'Dashboard';
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
    	$data['divisi'] =  $this->Rom_model->queryDivisiDepartement();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result_array();

        $this->form_validation->set_rules('id_departement', 'Id Departement');
        $this->form_validation->set_rules('n_divisi', 'Nama Divisi', 'required|min_length[3]');
        $this->form_validation->set_message('required', '%s masih kosong', 'silahkan isi terlebi dahulu');
        $this->form_validation->set_message('min_length', '%s minimal 3 karakter');

        $this->form_validation->set_error_delimiters('<span class="help-block"></span>');

        if($this->form_validation->run() == FALSE)
        {
             // $this->template->load('template','bagian/form_input', $data);
        	
        }
        else
        {
            $tambah_divisi = array (
                'id_departement' => htmlspecialchars($this->input->post('id_departement')),
                'n_divisi' => htmlspecialchars($this->input->post('n_divisi'))
            );

            // var_dump($tambah_divisi);
            $this->Rom_model->insert_data($tambah_divisi, 't_divisi');
            echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Simpan</div>');
            redirect('Division');
        }
    }

	function edit() 
	{	
		$data['divisi'] =  $this->Rom_model->queryDivisiDepartement();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result_array();

		if(isset($_POST['submit'])){
			$id       =  htmlspecialchars($this->input->post('id',true));
			$id_departement       =  htmlspecialchars($this->input->post('id_departement',true));
			$n_divisi      =  htmlspecialchars($this->input->post('n_divisi',true));

			$edit_divisi =  array(
				'id_departement' => $id_departement,
				'n_divisi' => $n_divisi
			);
			$where = array ('id' => $id);
			$this->Rom_model->update_data("t_divisi", $edit_divisi, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('Division');
		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('id'=>$id);            
			$data['divisi']= $this->Rom_model->find_data($param, "t_divisi")->row_array();
		}
	}


	function delete()
	{
		$id=  $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('t_divisi');

		echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Data Berhasil Di Hapus</div>');
		redirect('Division');
	}
}
