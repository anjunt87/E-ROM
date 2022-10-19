<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {
    
    public function multiple_images($uploadImgData = array()){
         return $this->db->insert_batch('t_image',$uploadImgData);
    }

    public function tambah($post){
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
            // insert DB advantage_user
            
                $image_request = [
                    'request_id' => $last_id,
                    'n_image' => "a.jpg",
                    'ket_image' => ("$last_id" ."-". "$nik" ."-". "$tgl")
                ];  
        $this->db->insert('t_image', $image_request);

    }

    public function edit($post){
        $params = [
            'n_pegawai' => $post['n_pegawai'],
            'nik_request ' => $post['nik_request'],
            'departement_id' => $post['id_departement'],
            'divisi_id' => $post['id_divisi'],
            'jabatan_id' => $post['id_jabatan'],
            'atasan_id' => $post['id_atasan'],
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
            // 'tgl_pengajuan' => $post['tgl_pengajuan'],
            // 'bukti1' => $post['bukti1'],
            // 'bukti2' => $post['bukti2'],
        ];
        $this->db->where('id_request', $post['id']);
        $this->db->update('t_request', $params);
    }

    public function ApprovedDepartement($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_departement' => "1",
            'w_departement' => date('Y-m-d'),

        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }
    
     public function ApprovedDivisi($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_divisi' => "1",
            'w_divisi' => date('Y-m-d'),
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }


    public function ApprovedOhc($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_ohc' => "1",
            'w_ohc' => date('Y-m-d'),
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }

    public function ApprovedKeuangan($id){
        $id=  $this->uri->segment(3);
        $params = [
            'id_request' => $id,
            'a_keuangan' => "1",
            'w_keuangan' => date('Y-m-d'),
        ];
        $this->db->where('id_request',  $id);
        $this->db->update('t_request', $params);
    }
} 