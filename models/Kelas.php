<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kelas extends CI_Model{
 
    public $idkelas;
    public $namakelas;
    public $nipg;
    
     function __construct() {
        parent::__construct();
    }

    function getAllKelas() {
        //select semua data yang ada pada table kelas $this--->db->select("*");
        $this->db->from("kelas");
        return $this->db->get();
    }

    function getKelas($id_kelas) {

        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get('kelas');

        //select kelas berdasarkan id yang dimiliki
    }

    function insertdatakelas($data) {
        //untuk insert data ke database

        $this->db->insert('kelas', $data);
    }

    function updatedatakelas($data) {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->update('kelas', $data);

        //update kelas berdasarkan id
    }

    function deletedatakelas($id_kelas) {
        $this->db->delete('kelas', $id_kelas);
        //delete kelas berdasarkan id
    }
    
    public function tampilNIP() {
        $query = $this->db->query("select nip from guru");
        return $query;
    }//untuk mengambil nip dari guru

}