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

    //put your code here
    public $nomorinduk;
    public $namasiswa;
    public $keterangan;

    function __construct() {
        parent::__construct();
    }

    function insertdatasiswa($data) {
        $this->db->insert('SISWA', $data);
    }

    function updateDataSiswa($nomorinduk, $data) {
        $this->db->where('nomorinduk', $nomorinduk);
        $this->db->update('SISWA', $data);
    }

    function deleteDataSiswa($nomorinduk) {
        $this->db->where('nomorinduk', $nomorinduk);
        $this->db->delete('agenda');
    }

    function select_all() {
        $this->db->select('*');
        $this->db->from('SISWA');
        $this->db->order_by('nomorinduk', 'desc');
        return $this->db->get();
    }

    function getSiswa($nomorinduk) {
        $this->db->select('siswa', $nomorinduk);
    }
}
