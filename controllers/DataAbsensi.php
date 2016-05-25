<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataAbsensi
 *
 * @author Bella
 */
class DataAbsensi extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model("Absensi");
        $this->load->library('session'); //coba buat session untuk inputkan selanjutnya
    }

    function getAbsen_masuk() {
        $this->load->model('Absensi');
        $query = $this->Absensi->tampilDataSiswa();
        $data['isiswa'] = $query->result();
        $this->load->view('MasukAbsensi', $data);
    }

//
    public function index() {
        $this->load->view("TampilDataKemajuan");
    }

    public function InsertAbsen() {
        $year = $this->input->post('year');
        $mounth = $this->input->post('mounth');
        $date = $this->input->post('date');
        $tanggal = "" . $year . "-" . $mounth . "-" . $date . "";

        $id_kelas = $this->input->post('id_kelas');
        $id_mapel = $this->input->post('id_mapel');
        $no_induk = $this->input->post('no_induk[]');
        $tanggal = $tanggal;
        $tahun_ajaran = $this->input->post('tahun_ajaran[]');
        $status = $this->input->post('status[]');

        $i = 0;
        foreach ($no_induk as $row) {
            $data = array(
                'id_kelas' => $id_kelas,
                'id_mapel' => $id_mapel,
                'no_induk' => $row,
                'tgl' => $tanggal,
                'tahun_ajaran' => $tahun_ajaran,
                'status' => $status[$i]
            );
            $i++;
            $this->Absensi->masukAbsen($data);
        }
//        $this->load->view('CariMapel');
        $this->load->view('tersimpanView', $data);
    }

    public function tampilInsert() {
        $this->load->model('Absensi');
        $data['dkelas'] = $this->Absensi->getKelas();
//        $data['dmapel'] = $this->Absensi->getMapel();
//        $data['dsiswa'] = $this->Absensi->getAllSiswa();
//        $this->load->view('MasukAbsensi', $data);
        $this->load->view('CariMapel', $data);
    }

    public function tampilMapel() {
        $this->load->model('Absensi');
        $id_kelas = $this->input->post('id_kelas');
        $hari = $this->input->post('hari');
        $data['ddata'] = $this->Absensi->cari_mapel($id_kelas, $hari);
//        $data['dkelas'] = $this->Absensi->cari_mapel();
        $this->load->view('TampilMapel', $data);
    }

//    public function tampilAbsen() {
//        $id = array('id_kelas' => $this->input->post('id_kelas'));
//        $this->load->model('Absensi');
//
//
//        $query = $this->Absensi->getSiswa($id);
////        $tr= mysql_query($query);
//        foreach ($query->result() as $temp) {
//
//            $data['no'] = $temp->no_induk;
//            $data['nama'] = $temp->nama_siswa;
//            $this->load->view('tampilDataSiswa', $data, $this->Absensi->getSiswa($id));
//        }
//    }

    public function tampilCoba($a, $b) {
        $id = $a;
        $this->load->model('Absensi');

        $id1 = $a;
        $sql = $this->Absensi->ambil($id1);
        foreach ($sql->result() as $temp) {
            $data['id'] = $temp->id_kelas;
            $data['nama'] = $temp->nama_kelas;
        }
        $id2 = $b;
        $sql1 = $this->Absensi->ambilMatpel($id2);
        foreach ($sql1->result() as $tp) {
            $data['idMapel'] = $tp->id_mapel;
            $data['namaMapel'] = $tp->nama_mapel;
        }
//        $data['dmapel'] = $this->Absensi->getMapel();
//        $id_kelas = $this->input->post('id_kelas');
        $query = $this->Absensi->getSiswa($id);
        $data['ukelas'] = $query->result();
//         $data['ukelas'] = $this->Absensi->getSiswa($id_kelas);
//  
//            $data['no'] = $temp->no_induk;
//            $data['nama'] = $temp->nama_siswa;
//           $this->load->view('TampilDataSiswa', $data,$this->Absensi->getSiswa($id));
        $this->load->view('TampilDataSiswa', $data);
    }

    public function Tampiltanggal() {
        
    }

}
