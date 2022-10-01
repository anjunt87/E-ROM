<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {

    // function tampildata()
    // {
    //     return $this->db->get('t_request');
    // }
    
    // function get($id)
    // {
    //     $param  =   array('id_request'=>$id);
    //     return $this->db->get_where('t_request',$param);
    // }

    // public function find_data($where, $table){
    //     return $this->db->get_where($table,$where);
    // } 

    public function tambah($post){
        $params = [
            'n_pegawai' => $post['n_pegawai'],
            'nik_request ' => $post['nik_request'],
            'id_departement' => $post['id_departement'],
            'id_divisi' => $post['id_divisi'],
            'id_jabatan' => $post['id_jabatan'],
            'id_atasan' => $post['id_atasan'],
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
            // 'bukti1' => $post['bukti1'],
            // 'bukti2' => $post['bukti2'],
        ];
        $this->db->insert('t_request', $params);
    }

    public function edit($post){
        $params = [
            'n_pegawai' => $post['n_pegawai'],
            'nik_request ' => $post['nik_request'],
            'id_departement' => $post['id_departement'],
            'id_divisi' => $post['id_divisi'],
            'id_jabatan' => $post['id_jabatan'],
            'id_atasan' => $post['id_atasan'],
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
            // 'bukti1' => $post['bukti1'],
            // 'bukti2' => $post['bukti2'],
        ];
        $this->db->where('id_request', $post['id']);
        $this->db->update('t_request', $params);
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