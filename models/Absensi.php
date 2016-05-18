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

    function __construct() {
        parent::__construct();
        
    }

    public function masukAbsen($data) {

//        $var = serialize($this->input->post('status'));
//        $data = array(
//            'status' => $var
//        );
        $this->db->insert('data_absensi', $data);
    }

    public function cari_mapel($id_kelas, $hari) {
        $this->db->select('i.id_kelas,k.nama_kelas,i.id_mapel,n.nama_mapel');
        $this->db->from('jadwal_pelajaran i');
        $this->db->join('mapel n', 'i.id_mapel = n.id_mapel', 'inner');
        $this->db->join('kelas k', ' k.id_kelas = i.id_kelas', 'inner');
        $this->db->where('i.id_kelas', $id_kelas);
        $this->db->where('i.hari', $hari);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getMapel() {
        $query = $this->db->query("select id_mapel,nama_mapel from mapel");
        return $query;
    }

    public function getKelas() {
        $query = $this->db->query("select id_kelas,nama_kelas from kelas");
        return $query;
    }

//    public function cari_dataSiswa($id_kelas) {
//        $this->db->select('no_induk,nama_siswa')
//                ->where('id_kelas', $id_kelas);
//        return $this->db->get('siswa');
//    }
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
        $tamung = $_POST['id_kelas'];
        $query = $this->db->query("select no_induk, nama_siswa from siswa where id_kelas='$tamung'");
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

    function tampilAja($id_kelas) {
        $this->db->select('no_induk,nama_siswa');
        $this->db->from('siswa');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get()->result();
        return $query;
    }
    function ambil($kelas){
         $this->db->where('id_kelas', $kelas);
        return $this->db->get('kelas');
    }
    function ambilMatpel($id){
        $this->db->where('id_mapel',$id);
        return $this->db->get('mapel');
    }
}
