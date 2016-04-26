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
class Absensi extends CI_Model {

    public $id_mapel;
    public $id_kelas;
    public $tgl;
    public $no_induk;
    public $hadir;
    public $alfa;
    public $izin;
    public $sakit;

    function __construct() {
        parent::__construct();
    }

    public function masukAbsen($data) {
        $this->db->insert('data_absen', $data);
    }

    public function cari_mapel($hari, $kelas) {
        $this->db->select('id_mapel')
                ->where('hari', $hari)
                ->and('id_kelas', $kelas);
        return $this->db->get('jadwal_pelajaran');
    }

    public function getMapel() {
        $query = $this->db->query("select id_mapel,nama_mapel from mapel");
        return $query;
    }
    public function getKelas() {
        $query = $this->db->query("select id_kelas,nama_kelas from kelas");
        return $query;
    }

    public function cari_dataSiswa($id_kelas) {
        $this->db->select('nama_siswa')
                ->where('id_kelas', $id_kelas);
        return $this->db->get('siswa');
    }

//    function getSiswa() {
//
//        //select semua data yang ada pada table guru $this--->db->select("*");
//
//        $this->db->from("siswa");
//        return $this->db->get();
//    }

//    function getALLSiswa($id_kelas) {
//         $query = $this->db->select( 'nama_siswa')
//        ->where('nama_kelas', $id_kelas);
//         $this->db->get('SISWA');
//         return $query;
//        if($query == 0){
//            
//        }
//       
//    }
     function getSiswa() {
         $tampung=$_POST['id_kelas'];
       //  $this->db->get('siswa');
        $query = $this->db->query("select no_induk, nama_siswa from siswa where id_kelas='$tampung'");
       
     return $query;
        
}
   public function getCoba() {
        $query = $this->db->query("select no_induk, nama_siswa from siswa");
        return $query;
}
   function getIdKelas($kode) {
        $this->db->where('id_kelas', $kode);
        return $this->db->get('siswa');
        //select mapel berdasarkan id yang dimiliki
    }
}