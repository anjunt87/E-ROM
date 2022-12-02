<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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

	public function IndexProfile($nik)
	{
		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['record'] = $this->Rom_model->queryEditUserProfile($nik);


		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function editProfile($nik)
	{
		$data['title'] = 'Edit Profile';
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
		$this->load->view('profile/profile_edit', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function edit_aksi()
	{	

		if(isset($_POST['submit'])){
			$name = htmlspecialchars($this->input->post('name'));
			$nik = htmlspecialchars($this->input->post('nik'));
			// $role = htmlspecialchars($this->input->post('role'));
			// $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			// $id_departement = htmlspecialchars($this->input->post('id_departement'));
			// $id_divisi = htmlspecialchars($this->input->post('id_divisi'));
			// $id_jabatan = htmlspecialchars($this->input->post('id_jabatan'));
			$date_created = htmlspecialchars($this->input->post('date_created'));
			$alamat = htmlspecialchars($this->input->post('alamat'));
			$no_hp = htmlspecialchars($this->input->post('no_hp'));

			// $id_profile = htmlspecialchars($this->input->post('id_profile'));
			// $n_lengkap = htmlspecialchars($this->input->post('n_lengkap'));
			// $nik_profile = htmlspecialchars($this->input->post('nik_profile'));

			$edit_user = array (
				'name' => $name,
				'nik' => $nik,
				// 'role_id' => $role,
				// 'password' => $password,
				'is_active' => "1",
				// 'id_atasan' => $id_profile,
				'date_created' => time()
			);

			$edit_profile = array (
				'n_lengkap' => $name,
				'nik_profile' => $nik,
				// 'id_departement' => $id_departement,
				// 'id_divisi' => $id_divisi,
				// 'id_jabatan' => $id_jabatan,
				'alamat' => $alamat,
				'no_hp' => $no_hp
				// 'id_atasan' => $id_profile
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
			redirect('Profile/indexProfile/'.$nik);
		}
		else{

			$id=  $this->uri->segment(3);
			$param  =   array('nik'=>$id);            
			$data['record'] = $this->Rom_model->queryEditUserProfile($nik);
		}
	}

	public function editImage(){
		$config['upload_path']="./assets/img/profile";
		$config['allowed_types']='gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
			$data = $this->upload->data();

	        //Resize and Compress Image
			$config['image_library']='gd2';
			$config['source_image']='./assets/img/profile/'.$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '60%';
			$config['width']= 600;
			$config['height']= 400;
			$config['new_image']= './assets/img/profile/'.$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$image= $data['file_name']; 

			$data2 = array(
				'img_profile' => $image
			);  
			$id = htmlspecialchars($this->input->post('nik'));
			$where = array('nik_profile'=>$id); 
			$this->Rom_model->update_data("t_profile", $data2, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Image Profile Berhasil Di Ubah</div>');
			echo json_decode($result);
		}

	}

    public function editPassword($nik){
    	$data['title'] = 'Edit Password';
		
		
        $this->form_validation->set_rules('password','Password','required');
        // $this->form_validation->set_rules('cpw_baru','Password','required|matches[password]');
        $this->form_validation->set_message('required','%s wajib diisi');
        // $this->form_validation->set_error_delimiters('<p class="alert">','</p>');
        
        if( $this->form_validation->run() == FALSE ){
            $where = array ('nik' => $this->session->userdata('nik')); 
            $data['password']= $this->Rom_model->find_data($where, 'user')->row_array();

            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
            $data['record'] = $this->Rom_model->queryEditUserProfile($nik);
            
            // View
           	$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('profile/profile_edit_Password', $data);
			$this->load->view('template/dashboard/footer', $data);

        } else {
            
			$nik = htmlspecialchars($this->input->post('nik'));
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            
            $data = array(
                'password' =>  $password
            );

            $where = array ('nik' => $nik);
            $this->Rom_model->update_data('user', $data, $where);
            echo $this->session->set_flashdata('msg','<div class="alert alert-success text-center" role="alert">Password Berhasil Di Ubah</div>');
            redirect('Profile/indexProfile/'.$nik);

    	}
	}
} 