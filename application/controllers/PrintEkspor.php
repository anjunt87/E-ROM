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

    // Print Cetak
    public function printoutRequest($id)
        {   
        $data['record'] = $this->Rom_model->queryRequest($id);  
        $data['lampiran'] = $this->Rom_model->queryGetRequestImage($id);

        $this->load->view('request/print_ekspor', $data);
    }

    // Ekspor PDF
    public function exportPdfRequest($id)
    {   
        $this->load->library('dompdf_gen');
        
        $data['record'] = $this->Rom_model->queryRequest($id);  
        $data['lampiran'] = $this->Rom_model->queryGetRequestImage($id);            

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