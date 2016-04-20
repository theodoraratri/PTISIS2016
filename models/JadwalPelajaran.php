<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JadwalPelajaran
 *
 * @author Windows 10
 */
class JadwalPelajaran extends CI_Model {

    
    
    
      function getJadwal($kode) {

        $this->db->where('kode_jadwal', $kode);
        return $this->db->get('jadwalpelajaran');

        //select guru berdasarkan id yang dimiliki
    }
    function Insert($data) {
        $this->db->insert('jadwalpelajaran', $data);
    }

    public function edit( $data) {
         $this->db->where('kode_jadwal', $data['kode_jadwal']);
        $this->db->update('jadwalpelajaran', $data);
    }

    function getAllJadwal() {
        //select semua data yang ada pada table guru $this--->db->select("*");
        $this->db->from("jadwalpelajaran");
        return $this->db->get();
    }

    public function delete($kodeJadwal) {
        $this->db->delete('jadwalpelajaran', $kodeJadwal);
    }

    public function tampilNIP() {
        $query = $this->db->query("select nip from GURU");
        return $query;
    }

    public function tampilIdMapel() {
        $query = $this->db->query("select id_mapel from mapel");
        return $query;
    }

    public function tampildKelas() {
        $query = $this->db->query("select id_kelas from kelas");
        return $query;
    }

}
