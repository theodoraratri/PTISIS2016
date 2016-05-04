<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rekap
 *
 * @author Lenovo
 */
class Rekap extends CI_Model {

    public function tampilRekap($kelas, $tahun,$mapel) {
        $this->db->select('k.nama_kelas,s.nama_siswa,a.status');
        $this->db->from('jadwalpelajaran jp');
        $this->db->join('kelas k', 'jp.id_kelas=k.id_kelas','inner');
        $this->db->join('mapel m', 'm.id_mapel=jp.id_mapel','inner');
        $this->db->join('siswa s', 's.id_kelas=jp.id_kelas','inner');
         $this->db->join('absen a', 'a.no_induk=s.no_induk','inner');
        
        $this->db->where('jp.id_kelas',$kelas);
        $this->db->where('jp.tahun_ajaran', $tahun);
      
        $query = $this->db->get()->result();
        return $query;
    }

    public function tampilTahunAjaran() {

        $query = $this->db->query("select tahun_ajaran from jadwalpelajaran");
        return $query;
    }

    public function tampildKelas() {
        $query = $this->db->query("select id_kelas from kelas");
        return $query;
    }

}
