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

    // function getUser($id)
    // {
    //     $param  =   array('id'=>$id);
    //     return $this->db->get_where('user',$param);
    // }

    // function get_divisi($id_departement){
    //     $query = $this->db->get_where('t_divisi', array('id_departement' => $id_departement));
    //     return $query;
    // }

    // function tampildata()
    // {
    //     return $this->db->get('user');
    // }

    // public function  deleteuser($id)
    // {
    //     $this->db->where('nik',$id);
    //     // $this->db->delete('t_profile');
    //     $this->db->delete('user');
    // }

    // public function CariallUser()
    // {
    //     // database untuk mencari data sesuai keyword yang di cari
    //     $keyword = $this->input->post('keyword', true);

    //     $this->db->like('name', $keyword);
    //     return $this->db->get('user')->result_array();
    // }


    // public function get_nama($title)
    // {
    //   $this->db->like('name', $title, 'BOTH');
    //   $this->db->order_by('name', 'asc');
    //   $this->db->limit(10);
    //   return $this->db->get('tbl_guru')->result();
    // }

    public function queryDivisiDepartement(){
        $query = "SELECT `t_divisi`.*, `t_departement`.`n_departement`
        FROM `t_divisi` JOIN `t_departement`
        ON `t_divisi`.`id_departement` = `t_departement`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function queryGetUserProfile(){
        $this->db->select('*');    
        $this->db->from('t_profile');
        $this->db->join('user', 't_profile.nik_profile = user.nik');
        $this->db->join('t_departement', 't_profile.id_departement = t_departement.id');
        $this->db->join('t_divisi', 't_profile.id_divisi = t_divisi.id');
        $this->db->join('t_jabatan', 't_profile.id_jabatan = t_jabatan.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function queryEditUserProfile($nik){
        $id =  $this->session->userdata('nik');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('t_profile','user.nik = t_profile.nik_profile', $nik);
        $this->db->join('t_departement', 't_profile.id_departement = t_departement.id');
        $this->db->join('t_divisi', 't_profile.id_divisi = t_divisi.id');
        $this->db->join('t_jabatan', 't_profile.id_jabatan = t_jabatan.id');
        $this->db->where('user.nik' , $nik);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function queryRequest($id){
        $id=  $this->uri->segment(3);
        // $param  =   array('id'=>$id);
        $this->db->select('*');
        $this->db->from('t_request');
        $this->db->join('t_profile','t_request.id_atasan = t_profile.id');
        $this->db->join('t_departement', 't_request.id_departement = t_departement.id');
        $this->db->join('t_divisi', 't_request.id_divisi = t_divisi.id');
        $this->db->join('t_jabatan', 't_request.id_jabatan = t_jabatan.id');
        $this->db->where('t_request.id_request' , $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function dataAccount1()
    {
        $data = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        return $data;
    }

    public function dataAccount2()
    {
        $data = $this->db->get_where('user', ['nik' => 
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

    public function ApprovedDivisi($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_divisi' => "1",
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }

    public function ApprovedDepartement($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_departement' => "1",
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }

    public function ApprovedOhc($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_ohc' => "1",
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }

    public function ApprovedKeuangan($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_keuangan' => "1",
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }
}

