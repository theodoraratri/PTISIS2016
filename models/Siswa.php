<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Siswa
 *
 * @author Theodora Ratri
 */
class Siswa extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertdatasiswa($data) {//function untuk memasukkan data siswa
        $this->db->insert('SISWA', $data);
    }

    public function updatedatasiswa($data) {//function untuk mengedit data siswa
        $this->db->where('nomorinduk', $data['nomorinduk']);
        $this->db->update('SISWA', $data);
    }

    function deletedatasiswa($nomorinduk) {//function untuk menghapus data siswa
         $this->db->delete('SISWA', $nomorinduk);
    }

   public function tampildKelas() {
        $query = $this->db->query("select id_kelas from kelas");
        return $query;
    }

    function getAllSiswa() {
        //select semua data yang ada pada table siswa $this--->db->select("*");
        $this->db->from("SISWA");
        return $this->db->get();
    }
    function getSiswa($nomorinduk) {
        $this->db->where('nomorinduk', $nomorinduk);
        return $this->db->get('SISWA');
        //select siswa berdasarkan id yang dimiliki
    }

}
