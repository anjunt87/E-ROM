<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rom_Model extends CI_Model {

    // Operasi Dasar CRUD
        // Ambil data di Databse
        public function get_data($table)
        {
            return $this->db->get($table);
        }

        // Cari data di database
        public function find_data($where, $table)
        {
            return $this->db->get_where($table,$where);
        }

        // Update data table database
        public function update_data($table, $data, $where)
        {
            $this->db->update($table, $data, $where);
        }

        // Input data
        public function insert_data($data, $table, $id)
        {
            $this->db->insert($table, $data);
        }

        // delete data
        public function delete_data($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table, $where);
        }
    // End Operasi Dasar CRUD

    public function queryDivisiDepartement(){
        $query = "SELECT `t_divisi`.*, `t_departement`.`n_departement`
        FROM `t_divisi` JOIN `t_departement`
        ON `t_divisi`.`departement_id` = `t_departement`.`id_departement`
        ";
        return $this->db->query($query)->result_array();
    }

    public function queryKorwilCabang(){
        $query = "SELECT `t_cabang`.*, `t_korwil`.`n_korwil`
        FROM `t_cabang` JOIN `t_korwil`
        ON `t_cabang`.`korwil_id` = `t_korwil`.`id_korwil`
        ";
        return $this->db->query($query)->result_array();
    }

    public function queryKorwilCabangUnit(){
        $this->db->select('*');    
        $this->db->from('t_unit_cabang');
        $this->db->join('t_cabang', 't_unit_cabang.cabang_id = t_cabang.id_cabang');
        $this->db->join('t_korwil', 't_unit_cabang.korwil_id = t_korwil.id_korwil');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function queryGetUserProfile(){
        $this->db->select('*');    
        $this->db->from('t_profile');
        $this->db->join('t_users', 't_profile.nik_profile = t_users.nik');
        $this->db->join('t_departement', 't_profile.departement_id = t_departement.id_departement');
        $this->db->join('t_divisi', 't_profile.divisi_id = t_divisi.id_divisi');
        $this->db->join('t_jabatan', 't_profile.jabatan_id = t_jabatan.id_jabatan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function queryEditUserProfile($nik){
        $this->db->select('*');
        $this->db->from('t_users');
        $this->db->join('t_profile','t_users.nik = t_profile.nik_profile', $nik);
        $this->db->join('user_role', 't_users.role_id = user_role.id');
        $this->db->join('t_departement', 't_profile.departement_id = t_departement.id_departement');
        $this->db->join('t_divisi', 't_profile.divisi_id = t_divisi.id_divisi');
        $this->db->join('t_jabatan', 't_profile.jabatan_id = t_jabatan.id_jabatan');
        $this->db->join('t_korwil', 't_profile.korwil_id = t_korwil.id_korwil');
        $this->db->join('t_cabang', 't_profile.cabang_id = t_cabang.id_cabang');
        $this->db->join('t_unit_cabang', 't_profile.cabang_unit_id = t_unit_cabang.id_unit');
        $this->db->where('t_users.nik' , $nik);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function queryRequest($id){
        $id=  $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('t_request');
        $this->db->join('t_profile','t_request.atasan_id = t_profile.id');
        $this->db->join('t_departement', 't_request.departement_id = t_departement.id_departement');
        $this->db->join('t_divisi', 't_request.divisi_id = t_divisi.id_divisi');
        $this->db->join('t_jabatan', 't_request.jabatan_id = t_jabatan.id_jabatan' );
        $this->db->where('t_request.id_request' , $id);
        $query = $this->db->get();
        return $query->row_array();
    }

     public function queryGetRequestImage($id){
       $id=  $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('t_image');
        $this->db->join('t_request', 't_request.id_request = t_image.request_id');
        $this->db->where('t_image.request_id' , $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataAccount1()
    {
        $data = $this->db->get_where('t_users', ['nik' => $this->session->userdata('nik')])->row_array();
        return $data;
    }

    public function dataAccount2()
    {
        $data = $this->db->get_where('t_users', ['nik' => 
            $this->session->userdata('nik')])->row_array();
        $where = array ('nik_profile' => $this->session->userdata('nik'));
        $data = $this->Rom_model->find_data($where, 't_profile')->row_array();
        return $data;
    }

     public function get_prov($title)
    {
      $this->db->like('n_lengkap', $title, 'BOTH');
      $this->db->order_by('n_lengkap', 'asc');
      $this->db->limit(10);
      return $this->db->get('t_profile')->result();
    } 
}

