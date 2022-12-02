<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
      $this->load->view('template/landing/header');
      $this->load->view('template/landing/navbar');
      $this->load->view('template/landing/index');
      $this->load->view('template/landing/footer');		
  }

  public function loginIndex()
  {
      $this->load->view('auth/login');		
  }

  public function login()
  {
    if ($this->session->userdata('nik')) {
        redirect('users');
    }
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');//|valid_nik
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if( $this->form_validation->run() == false){ 
            $data['title'] = 'Halaman Login';
        // $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
        // $this->load->view('templates/auth_footer');
        } else {
            //ketika fungsi login dijalankan
            $this->_login();
        }
    }

    private function _login() 
    {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nik' => $nik])->row_array();


        if($user) {



            if($user ['is_active'] == 1) {
            //cek password

                if(password_verify($password, $user['password'])) {
                //jika benar login
                    $data = [
                        'n_pegawai' => $user['n_pegawai'],
                        'nik' => $user['nik'],
                        'p_grade' => $user['p_grade'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if($user ['role_id'] == 1) {
                        redirect('admin');
                    }elseif($user ['role_id'] == 2) {
                        redirect('Admin_OHC');
                    }elseif($user ['role_id'] == 3) {
                        redirect('departement');
                    }elseif($user ['role_id'] == 4) {
                        redirect('division');
                    }elseif($user ['role_id'] == 5) {
                        redirect('keuangan');
                    }else{
                        redirect ('users');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password salah</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    NIK ini belum di Aktivasi, coba cek kotak masuk niknya</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                NIK ini belum Terdaftar</div>');
            redirect('auth/login');
        }
    }
    
    public function registration()
    {
        if ($this->session->userdata('nik')) {
            redirect('users');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|valid_nik|is_unique[user.nik]', [
            'is_unique' => 'nik Sudah pernah daftar!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]' , [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Panjang password bermasalah!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if( $this->form_validation->run() == false){
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'image' =>'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
              Selamat Anda sudah terdaftar
              </div>');
            redirect('auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Terimakasih sudah berkunjung, <br> berhasil Logout!
            </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
