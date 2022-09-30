<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        /*load Model*/
        $this->load->helper('url');
        $this->load->library('encryption');
        $this->load->model('Rom_model');
        $this->load->model('Menu_model');
        if ($this->session->userdata('nik')=="") {
          redirect('auth/loginIndex');
      }
  } 

    // Menu Management
  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] =  $this->Rom_model->dataAccount1();
    $data['record'] =  $this->Rom_model->dataAccount2();
    

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if( $this->form_validation->run() == false){
        $this->load->view('template/dashboard/header', $data);
        $this->load->view('template/dashboard/sidebar', $data);
        $this->load->view('template/dashboard/topbar', $data);
        $this->load->view('menu/menu_management', $data);
        $this->load->view('template/dashboard/footer', $data);	
    } else {
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Menu berhasil ditambahkan
          </div>');
        redirect('menu');
    }
}

function editMenu() 
{
    if(isset($_POST['submit'])){
        $id       =  htmlspecialchars($this->input->post('id',true));
        $menu      =  htmlspecialchars($this->input->post('menu',true));

        $edit_menu =  array(
            'menu' => $menu
        );
        $where = array ('id' => $id);
        $this->Rom_model->update_data("user_menu", $edit_menu, $where);
        echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
        redirect('menu');
    }
    else{

        $id=  $this->uri->segment(3);
        $param  =   array('id'=>$id);            
        $data['menu']= $this->Rom_model->find_data($param, "user_menu")->row_array();
    }
}

public function deleteMenu($id)
{   
    $id=  $this->uri->segment(3);
    $this->db->where('id',$id);
    $this->db->delete('user_menu');

    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
        Data Berhasil di hapus !</div>');
    redirect('menu');
}
    // End Menu

    // Sub Menu Management
public function subMenuManagement()
{
    $data['title'] = 'SubMenu Management';
    $data['user'] =  $this->Rom_model->dataAccount1();
    $data['record'] =  $this->Rom_model->dataAccount2();
    $this->load->model('Menu_model','menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if( $this->form_validation->run() == false){
        $this->load->view('template/dashboard/header', $data);
        $this->load->view('template/dashboard/sidebar', $data);
        $this->load->view('template/dashboard/topbar', $data);
        $this->load->view('menu/sub_menu_management', $data);
        $this->load->view('template/dashboard/footer', $data);

    }else {
       $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
    ];
    $this->db->insert('user_sub_menu', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
    redirect('menu/subMenuManagement');
}
}

function editSubMenuManagement() 
{   
    $data['subMenu'] = $this->Menu_model->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    if(isset($_POST['submit'])){
        $id       =  htmlspecialchars($this->input->post('id',true));
        $menu_id       =  htmlspecialchars($this->input->post('menu_id',true));
        $title      =  htmlspecialchars($this->input->post('title',true));
        $url      =  htmlspecialchars($this->input->post('url',true));
        $icon      =  htmlspecialchars($this->input->post('icon',true));
        $is_active      =  htmlspecialchars($this->input->post('is_active',true));

        $edit_submenu =  array(
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active
        );
        $where = array ('id' => $id);
        $this->Rom_model->update_data("user_sub_menu", $edit_submenu, $where);
        echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
        redirect('menu/subMenuManagement');

    }
    else{

        $id=  $this->uri->segment(3);
        $param  =   array('id'=>$id);            
        $data['subMenu']= $this->Rom_model->find_data($param, "user_sub_menu")->row_array();
    }
}

public function deleteSubMenu($id)
{   
    $id=  $this->uri->segment(3);
    $this->db->where('id',$id);
    $this->db->delete('user_sub_menu');

    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
        Data Berhasil di hapus !</div>');
    redirect('menu/subMenuManagement');
}
}
