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
		$request->id_korwil = $this->input->post('id_korwil');		
		$request->id_cabang = $this->input->post('id_cabang');
		$request->id_unit = $this->input->post('id_unit');
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
			// $this->Request_model->tambah($post);

			 $params = [
            'n_pegawai' => $post['n_pegawai'],
            'nik_request ' => $post['nik_request'],
            'departement_id' => $post['id_departement'],
            'divisi_id' => $post['id_divisi'],
            'jabatan_id' => $post['id_jabatan'],
            'atasan_id' => $post['id_atasan'],
            'korwil_id' => $post['id_korwil'],
            'cabang_id' => $post['id_cabang'],
            'cabang_unit_id' => $post['id_unit'],
            'k_healt' => $post['k_healt'],
            'rs_dokter' => $post['rs_dokter'],
            'n_pasien' => $post['n_pasien'],
            'ttl_pasien' => $post['ttl_pasien'],
            'ket' => empty($post['ket']) ? null : $post['ket'],
            'pisa' => $post['pisa'],
            'd_sakit' => $post['d_sakit'],
            'kronologi' => empty($post['kronologi']) ? null : $post['kronologi'],
            'kuitansi' => $post['kuitansi'],
            'tgl_kuitansi' => $post['tgl_kuitansi'],
            'u_berobat' => empty($post['u_berobat']) ? null : $post['u_berobat'],
            'nominal' => $post['nominal'],
            't_pengajuan' => $post['nominal'],
            'tgl_pengajuan' => $post['tgl_pengajuan'],
            'tgl_exp' => date('Y-m-d', strtotime("+60 days")),
            // 'bukti1' => $post['bukti1'],
            // 'bukti2' => $post['bukti2'],
        ];
        $this->db->insert('t_request', $params);

	        $last_id = $this->db->insert_id();
	        $nik = $post['nik_request'];
	        $tgl = $post['tgl_pengajuan'];

			    $dataInfo = array();
			    $files = $_FILES;
			    $cpt =  count($_FILES['image']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {           
			        $_FILES['file']['name']= $files['image']['name'][$i]; 
			        $_FILES['file']['type']= $files['image']['type'][$i];
			        $_FILES['file']['tmp_name']= $files['image']['tmp_name'][$i];
			        $_FILES['file']['error']= $files['image']['error'][$i];
			        $_FILES['file']['size']= $files['image']['size'][$i];    

			        $this->load->library('upload');
			        $this->upload->initialize($this->set_upload_options());
			        $this->upload->do_upload('file');
			        $dataInfo[$i] = $this->upload->data();
					$uploadImgData[$i] = [
				    	'request_id'	=>	$last_id,
				    	'n_image' => $dataInfo[$i]['file_name'],
				    	'ket_image' => ("$last_id" ."-". "$nik" ."-". "$tgl")
						];

			    }
			    if(!empty($uploadImgData)){
	            // Insert files data into the database
			    	$this->Request_model->multiple_images($uploadImgData);
			    }

		}elseif(isset($_POST['Edit'])){
			$this->Request_model->edit($post);
		}

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
				Data Berhasil di input</div>');
		}
		redirect ('request/detailRequestUser/'.$last_id);
	}


	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['image_library'] = 'gd2';
	    $config['upload_path'] = './assets/img/lampiran/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size']      = '0';
	    $config['create_thumb']      = FALSE;
	    $config['maintain_ratio']      = FALSE;
	    $config['quality']      = '50%';
	    $config['width'] = 300;
	 	$config['height'] = 300; 
	    $config['overwrite']     = FALSE;

	    return $config;
	}

	public function edit_image($id){

			$data['title'] = 'Request History';
			$data['user'] =  $this->Rom_model->dataAccount1();
			$data['record'] =  $this->Rom_model->dataAccount2();

			// memfilter berdasarkan NIK yang Login 
			// $where = array ('nik_request' => $this->session->userdata('nik'));
			// $data['request']= $this->Rom_model->find_data($where, 't_request');
			$data['request'] = $this->Rom_model->queryRequest($id);
			$data['lampiran'] = $this->Rom_model->queryGetRequestImage($id);

			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('request/editImage_request', $data);
			$this->load->view('template/dashboard/footer', $data);	
	}

	public function form_edit_image($id){

			$data['title'] = 'Request History';
			$data['user'] =  $this->Rom_model->dataAccount1();
			$data['record'] =  $this->Rom_model->dataAccount2();

			// memfilter berdasarkan NIK yang Login 
			// $where = array ('nik_request' => $this->session->userdata('nik'));
			$id=  $this->uri->segment(3);
			$where =   array('id_image'=>$id);
			$data['lampiran'] = $this->Rom_model->find_data($where, 't_image')->result_array();
			// $data['request']= $this->Rom_model->find_data($where, 't_request');
			// $data['request'] = $this->Rom_model->queryRequest($id);
			// $data['lampiran'] = $this->Rom_model->queryGetRequestImage($id);

			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('request/form_editImage_request', $data);
			$this->load->view('template/dashboard/footer', $data);	
	}

	public function editImageLampiran(){
		$id = htmlspecialchars($this->input->post('id_image1'));
		$config['upload_path']		=	"./assets/img/lampiran";
		$config['allowed_types']	=	'gif|png|jpg|jpeg';
		// $config['encrypt_name'] = TRUE;
		$config['file_name']		=	 'Profile-'.date('dmy').'-'.substr(md5(rand()), 0,10);

		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
			$data = $this->upload->data();

	        //Resize and Compress Image
			$config['image_library']='gd2';
			$config['source_image']='./assets/img/lampiran/'.$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '60%';
			$config['width']= 600;
			$config['height']= 400;
			$config['new_image']= './assets/img/lampiran/'.$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$image= $data['file_name']; 

			$request = array(
				'n_image' => $image
			);  

			$id = htmlspecialchars($this->input->post('id_image1'));
			$where = array('id_image'=>$id);  
			$this->Rom_model->update_data("t_image", $request, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Image Profile Berhasil Di Ubah</div>');
			echo json_decode($result);
		}

	}

	// History Request Users bisa di akses berdasarkan users yg login
	public function usersRequestHistory()
	{
		$data['title'] = 'Request History';
		$data['user'] =  $this->Rom_model->dataAccount1();
		$data['record'] =  $this->Rom_model->dataAccount2();

		// memfilter berdasarkan NIK yang Login 
		$where = array ('nik_request' => $this->session->userdata('nik'));
		$data['request']= $this->Rom_model->find_data($where, 't_request')->result();

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
		$data['lampiran'] = $this->Rom_model->queryGetRequestImage($id);                        
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
		$data['title'] = 'Request History Users';
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


	public function delete($id)
	{
		$where = array ('id_request' => $id);
		$where2 = array ('request_id' => $id);

		$this->Rom_model->delete_data($where, 't_request');
		$this->Rom_model->delete_data($where2, 't_image');

		$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
			Data Berhasil di hapus !</div>');
		redirect('request/usersRequestHistory');
	}

	public function requestApprovedDivisi($id){
        $id=  $this->uri->segment(3);
		$this->Request_model->ApprovedDivisi($id);
		echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Anda telah menyetujui Request</div>');
		redirect('request/requestUsers');     
	}

	public function requestApprovedDepartement($id){
        $id=  $this->uri->segment(3);
		$this->Request_model->ApprovedDepartement($id);
		echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Anda telah menyetujui Request</div>');
		redirect('request/requestUsers');     
	}

	public function requestApprovedOhc($id){
        $id=  $this->uri->segment(3);
		$this->Request_model->ApprovedOhc($id);
		echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Anda telah menyetujui Request</div>');
		redirect('request/requestUsers');     
	}

	public function requestApprovedKeuangan($id){
        $id=  $this->uri->segment(3);
		$this->Request_model->ApprovedKeuangan($id);
		echo $this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">Anda telah menyetujui Request</div>');
		redirect('request/requestUsers');     
	}

	public function requestTolakDivisi(){
		if(isset($_POST['submit'])){
			$id_request       =  htmlspecialchars($this->input->post('id_request',true));
			$t_ket      =  htmlspecialchars($this->input->post('t_ket',true));

			$edit_request =  array(
				'a_divisi' => '2',
				't_approve' => '1',
				't_ket' => $t_ket
			);
			$where = array ('id_request' => $id_request);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda telah menolak Request</div>');
			redirect('request/requestUsers');
		}
	}

	public function requestTolakDepartement(){
		if(isset($_POST['submit'])){
			$id_request       =  htmlspecialchars($this->input->post('id_request',true));
			$t_ket      =  htmlspecialchars($this->input->post('t_ket',true));

			$edit_request =  array(
				'a_departement' => '2',
				't_approve' => '1',
				't_ket' => $t_ket,
				'w_departement' => date('Y-m-d')
			);
			$where = array ('id_request' => $id_request);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda telah menolak Request</div>');
			redirect('request/requestUsers');
		}
		
	}

	public function requestTolakOhc(){
		if(isset($_POST['submit'])){
			$id_request       =  htmlspecialchars($this->input->post('id_request',true));
			$t_ket      =  htmlspecialchars($this->input->post('t_ket',true));

			$edit_request =  array(
				'a_ohc' => '2',
				't_approve' => '1',
				't_ket' => $t_ket
			);
			$where = array ('id_request' => $id_request);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda telah menolak Request</div>');
			redirect('request/requestUsers');
		}
	}

	public function requestTolakKeuangan(){
		if(isset($_POST['submit'])){
			$id_request       =  htmlspecialchars($this->input->post('id_request',true));
			$t_ket      =  htmlspecialchars($this->input->post('t_ket',true));

			$edit_request =  array(
				'a_keuangan' => '2',
				't_approve' => '1',
				't_ket' => $t_ket
			);
			$where = array ('id_request' => $id_request);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			echo $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda telah menolak Request</div>');
			redirect('request/requestUsers');
		}
	}

	public function requestKadaluarsaDepartement($id){
			$edit_request =  array(
				'a_departement' => '2',
				't_approve' => '1',
            	'w_departement' => date('Y-m-d'),
				't_ket' => "Request Telah Kadaluarsa"
			);
			$where = array ('id_request' => $id);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			redirect('request/detailRequestUser/'.$id);
	}

	public function requestKadaluarsaDivisi($id){
			$edit_request =  array(
				'a_divisi' => '2',
				't_approve' => '1',
				'w_divisi' => date('Y-m-d'),
				't_ket' => "Request Telah Kadaluarsa"
			);
			$where = array ('id_request' => $id);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			redirect('request/detailRequestUser/'.$id);
	}

	public function requestKadaluarsaOhc($id){
			$edit_request =  array(
				'a_ohc' => '2',
				't_approve' => '1',
				'w_ohc' => date('Y-m-d'),
				't_ket' => "Request Telah Kadaluarsa"
			);
			$where = array ('id_request' => $id);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			redirect('request/detailRequestUser/'.$id);
	}

	public function requestKadaluarsaKeuangan($id){
			$edit_request =  array(
				'a_keuangan' => '2',
				't_approve' => '1',
				'w_keuangan' => date('Y-m-d'),
				't_ket' => "Request Telah Kadaluarsa"
			);
			$where = array ('id_request' => $id);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			redirect('request/detailRequestUser/'.$id);
	}

	public function requestTolakKuitansi($id){
			$edit_request =  array(
				'a_departement' => '2',
				'a_divisi' => '2',
				'a_ohc' => '2',
				'a_keuangan' => '2',
				't_approve' => '1',
				'w_departement' => date('Y-m-d'),
				'w_divisi' => date('Y-m-d'),
				'w_ohc' => date('Y-m-d'),
				'w_keuangan' => date('Y-m-d'),
				't_ket' => "Tanggal Kuitansi telah melebihi batas waktu pengajuan, batas pengajuan hanya berlaku selama 3 bulan dari tanggal kuitansi ke tanggal pengajuan."
			);
			$where = array ('id_request' => $id);
			$this->Rom_model->update_data("t_request", $edit_request, $where);
			redirect('request/detailRequestUser/'.$id);
	}
}