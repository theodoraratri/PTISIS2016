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
class KemajuanKelas extends CI_Model{

    //put your code here
    function __construct() {
        parent::__construct();
    }
    public function tampilJadwal($id_kelas){//menampilkan data kelas,mapel,guru,jam dan hari join
        $sql = "select nama_kelas,nama from kelas where id_kelas= '".$id_kelas."'";
        return $this->db->query($sql);
    }

    public function tampilJumlahHadir($tgl,$id_kelas) {//menampilkan jumlah kehadiran pada mata pelajaran dihari tersebut
        $query = "select count(status) from data_absensi where tgl='".$tgl."' and id_kelas='".$id_kelas."'and status='hadir'"
                . "group by status";
        return $this->db->query($query);
    }
    public function masukKemajuanKelas($data) {
        $this->db->insert('data-kemajuan', $data);
    }

    public function tampilKemajuanKelas($tgl) {//menampilkan seluruh data kemajuan kelas yang baru saja disimpan
        $sql = "select * from data-kemajuan where tgl = '".$tgl."'";
        $this->db->query($sql);
    }
     public function getMapelK() {
        $query = $this->db->query("select id_mapel,nama_mapel from mapel");
        return $query;
    }
    public function getKelasK() {
        $query = $this->db->query("select id_kelas,nama_kelas from kelas");
        return $query;
    }
   
     public function getNIP(){
        $query = $this->db->query("select nip,nama_guru from guru");
        return $query;
    }
    public function getIdJadwal(){
        $query = $this->db->query("select id_jadwal from jadwal_pelajaran");
        return $query;
    }
}
