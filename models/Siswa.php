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

    function updatedatasiswa($data) {//function untuk mengedit data siswa
        $this->db->where('nomorinduk', $data['nomorinduk']);
        $this->db->update('SISWA', $data);
    }

    function deletedatasiswa($nomorinduk) {//function untuk menghapus data siswa
         $this->db->delete('SISWA', $nomorinduk);
    }

    public function tampilSiswa() {
        $sql = "select * from SISWA ORDER BY NOMORINDUK DESC ";
        return $sql->result();
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
