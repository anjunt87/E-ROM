<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('session');
    /*load Model*/
    $this->load->helper('url');
    $this->load->library('encryption');
    $this->load->model('Rom_model');
    if ($this->session->userdata('nik') == "") {
      redirect('auth/loginIndex');
    }
  } 

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] =  $this->Rom_model->dataAccount1();
    $data['record'] =  $this->Rom_model->dataAccount2();
    
    $this->load->view('template/dashboard/header', $data);
    $this->load->view('template/dashboard/sidebar', $data);
    $this->load->view('template/dashboard/topbar', $data);
    $this->load->view('index/index_Users', $data);
    $this->load->view('template/dashboard/footer');
  }
}
