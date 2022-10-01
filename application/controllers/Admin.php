<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		/*load Model*/
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model('Rom_model');
		if ($this->session->userdata('nik')=="") {
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
		$this->load->view('index/index_Admin', $data);
		$this->load->view('template/dashboard/footer', $data);
	}


	public function usersManagement()
	{
		$data['title'] = 'Users Management';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		$data['usersManagement'] = $this->Rom_model->queryGetUserProfile();


        // if ($this->input->post('keyword') ) {
        // $data['usersManagement'] = $this->Rom_model->CariallUser();
        // }

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('admin/users_management', $data);
		$this->load->view('template/dashboard/footer', $data);		
	}

	public function get_divisi()
	{
		$id_departement = htmlspecialchars($this->input->post('id', TRUE));
		$data = $this->Rom_model->find_data(array('id_departement' => $id_departement), "t_divisi")->result();
		echo json_encode($data); 
	}

	public function tambah(){
		$data['title'] = 'Tambah Users';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();

		$data['role'] =  $this->Rom_model->get_data('user_role')->result_array();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result();
		// $data['divisi'] =  $this->Rom_model->get_data('t_divisi')->result_array();
		$data['jabatan'] =  $this->Rom_model->get_data('t_jabatan')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('admin/form_tambah_um', $data);
		$this->load->view('template/dashboard/footer', $data);

	}


	// Form tambah User 
	public function tambah_aksi(){

		$name = htmlspecialchars($this->input->post('name'));
		$nik = htmlspecialchars($this->input->post('nik'));
		$role = htmlspecialchars($this->input->post('role'));
		$password = password_hash($this->input->post('nik'), PASSWORD_DEFAULT);
		$id_departement = htmlspecialchars($this->input->post('id_departement'));
		$id_divisi = htmlspecialchars($this->input->post('id_divisi'));
		$id_jabatan = htmlspecialchars($this->input->post('id_jabatan'));
		$date_created = htmlspecialchars($this->input->post('date_created'));
		$id_profile = htmlspecialchars($this->input->post('id_profile'));
		$n_lengkap = htmlspecialchars($this->input->post('n_lengkap'));
		$nik_profile = htmlspecialchars($this->input->post('nik_profile'));


		$insert_user = array (
			'name' => $name,
			'nik' => $nik,
			'role_id' => $role,
			'password' => $password,
			'id_atasan' => $id_profile,
			'is_active' => "1",
			'date_created' => time()
		);

		$insert_profile = array (
			'n_lengkap' => $name,
			'nik_profile' => $nik,
			'id_departement' => $id_departement,
			'id_divisi' => $id_divisi,
			'id_jabatan' => $id_jabatan,
			'id_atasan' => $id_profile
		);
		// var_dump($insert_user);
		// var_dump($insert_profile);
		$this->Rom_model->insert_data($insert_user,'user');
		$this->Rom_model->insert_data($insert_profile,'t_profile');

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
			Data Berhasil di input</div>');
		redirect('admin/usersManagement');
	}

	function edit($nik)
	{	

		$data['title'] = 'Dashboard';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();
		$data['record'] = $this->Rom_model->queryEditUserProfile($nik);

		$data['role'] =  $this->Rom_model->get_data('user_role')->result_array();
		$data['departement'] =  $this->Rom_model->get_data('t_departement')->result_array();
		$data['divisi'] =  $this->Rom_model->get_data('t_divisi')->result_array();
		$data['jabatan'] =  $this->Rom_model->get_data('t_jabatan')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('admin/form_edit_um', $data);
		$this->load->view('template/dashboard/footer', $data);
	}


	function edit_aksi()
	{	

		if(isset($_POST['submit'])){
			$name = htmlspecialchars($this->input->post('name'));
			$nik = htmlspecialchars($this->input->post('nik'));
			$role = htmlspecialchars($this->input->post('role'));
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$id_departement = htmlspecialchars($this->input->post('id_departement'));
			$id_divisi = htmlspecialchars($this->input->post('id_divisi'));
			$id_jabatan = htmlspecialchars($this->input->post('id_jabatan'));
			$date_created = htmlspecialchars($this->input->post('date_created'));
			$id_profile = htmlspecialchars($this->input->post('id_profile'));
			$n_lengkap = htmlspecialchars($this->input->post('n_lengkap'));
			$nik_profile = htmlspecialchars($this->input->post('nik_profile'));

			$edit_user = array (
				'name' => $name,
				'nik' => $nik,
				'role_id' => $role,
				'password' => $password,
				'is_active' => "1",
				'id_atasan' => $id_profile,
				'date_created' => time()
			);

			$edit_profile = array (
				'n_lengkap' => $name,
				'nik_profile' => $nik,
				'id_departement' => $id_departement,
				'id_divisi' => $id_divisi,
				'id_jabatan' => $id_jabatan,
				'id_atasan' => $id_profile
			);

			$id = htmlspecialchars($this->input->post('nik'));
			$where  =   array('nik'=>$id); 
			$where2  =   array('nik_profile'=>$id); 
			// var_dump($where);
			// var_dump($edit_user);
			// var_dump($edit_profile);
			$this->Rom_model->update_data("user", $edit_user, $where);
			$this->Rom_model->update_data("t_profile", $edit_profile, $where2);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Data Berhasil Di Ubah</div>');
			redirect('admin/usersManagement');
		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('nik'=>$id);            
			$data['usersManagement']= $this->Rom_model->find_data($param, "user")->row_array();
		}
	}


	public function usersRole()
	{
		$data['title'] = 'Role';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('admin/users_role', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function tambahRole(){

		$role = htmlspecialchars($this->input->post('role'));

		$insert_role = array (
			'role' => $role,
		);

		$this->Rom_model->insert_data($insert_role,'user_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
			Data Berhasil di input</div>');
		redirect('admin/usersRole');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('admin/users_role_access', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_acces_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_acces_menu', $data);
		} else {
			$this->db->delete('user_acces_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	public function deleteuser($id)
	{
		$where = array ('nik' => $id);
		$where2 = array ('nik_profile' => $id);

		$this->Rom_model->delete_data($where, 'user');
		$this->Rom_model->delete_data($where2, 't_profile');

		$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
			Data Berhasil di hapus !</div>');
		redirect('admin/usersManagement');
	}

	function get_autocomplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->Rom_model->get_prov($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
        $result_array[] = array(
            'label'=>$row->n_lengkap,
            'nik_profile'=>strtoupper($row->nik_profile),
            // 'id_departement'=>strtoupper($row->id_departement),
            // 'id_divisi'=>strtoupper($row->id_divisi),
            'id'=>strtoupper($row->id)
          );
        echo json_encode($result_array);
      }
    }
  }
}
