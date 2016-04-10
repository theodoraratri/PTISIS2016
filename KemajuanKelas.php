<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KemajuanKelas
 *
 * @author Bella
 */
class KemajuanKelas extends CI_Model {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    public function tambahKemajuan($data) {
        $this->db->insert('KemajuanKelas', $data);
    }

    public function cariKelas($hari) {
        $sql = "select * from jadwalPelajaran where hari = '" . $hari . "'";
        return $this->db->query($sql);
    }

    public function tampilKelas($id_kelas) {
        $sql = "select * from kelas where id_kelas= '" . $id_kelas . "'";
        return $this->db->query($sql);
    }

    public function absenSiswa($data) {
        $this->db->insert('absens', $data);
    }
    public function tampilDataSiswa($id_kelas){
        $sql = "select * from siswa where id_kelas= '".$id_kelas."'";
        return $this->db->query($sql);
    }
    public function masukAbsen($data){
        $this->db->insert('Absen',$data);
    }

}
