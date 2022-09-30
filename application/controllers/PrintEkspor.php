<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintEkspor extends CI_Controller {

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
		// $this->load->view('template/dashboard/header');
		// $this->load->view('template/dashboard/sidebar');
		// $this->load->view('template/dashboard/topbar');
		// $this->load->view('admin/index');
		// $this->load->view('template/dashboard/footer');		
  }

	// Print Cetak
  function printoutRequest($id)
  {   
    $data['record'] = $this->Rom_model->queryRequest($id);            

    // $id=  $this->uri->segment(3);
    // $param  =   array('id'=>$id);            
    // $data['record']= $this->Request_model->find_data($param, "t_request")->row_array();

    $this->load->view('request/print_ekspor', $data);
}

    // Ekspor PDF
public function exportPdfRequest($id)
{   
    $this->load->library('dompdf_gen');
    
    $data['record'] = $this->Rom_model->queryRequest($id);            

    // $id=  $this->uri->segment(3);
    // $param  =   array('id'=>$id);            
    // $data['record']= $this->Request_model->find_data($param, "t_request")->row_array();

    $this->load->view('request/print_ekspor', $data);
    $paper_size = 'A4';
    $orientation = 'portrait';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Report  Rembursement Of Medical.pdf", array('Attachment' => 0));
}
}