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
    }

    function getAbsen_masuk() {
        $this->load->model('Absensi');
        $query = $this->Absensi->tampilDataSiswa();
        $data['isiswa'] = $query->result();
        $this->load->view('MasukAbsensi', $data);
    }

//
    public function index() {
//        $query = $this->db->get("Absensi");
//        $data['record'] = $query->result();
//        $this->load->helper('url');
        $this->load->view("MasukAbsensi");
    }

    public function tampilMapel() {
        $this->load->view('MasukAbsensi');
    }

//    public function tampilDataSiswa(){
//        $data['Absensi'] = $this->Absensi->get;
//        $this->load->view('MasukAbsensi', $data);
//    }
//   
    public function masukAbsensi() {
        $this->load->model('Absensi');
        $id_mapel = $this->input->post("id_mapel");
        $id_kelas = $this->input->post("id_kelas");
        $tgl = $this->input->post("tgl");
        $no_induk = $this->input->post("no_induk");
        $hadir = $this->input->post("hadir");
        $alfa = $this->input->post("alfa");
        $izin = $this->input->post("izin");
        $sakit = $this->input->post("sakit");
        $i =0;
        
//        foreach ($id_mapel as $row) {
            $data['id_mapel'] = $id_mapel[$i];
            $data['id_kelas'] = $id_kelas[$i];
            $data['tgl'] = $tgl[$i];
            $data['no_induk'] = $no_induk[$i];
            $data['hadir'] = $hadir[$i];
            $data['alfa'] = $alfa[$i];
            $data['izin'] = $izin[$i];
            $data['sakit'] = $sakit[$i];
            $this->Absensi->masukAbsen($data);
            $i++;
        }
//    }

//        $this->load->helper('url');
//        redirect('DataAbsensi/tampilCoba');


    public function tampilInsert() {
        $this->load->model('Absensi');
        $data['dkelas'] = $this->Absensi->getKelas();
        $data['dmapel'] = $this->Absensi->getMapel();
//        $data['dsiswa'] = $this->Absensi->getAllSiswa();
        $this->load->view('MasukAbsensi', $data);
    }

    public function tampilAbsen() {
        $id = array('id_kelas' => $this->input->post('id_kelas'));
        $this->load->model('Absensi');


        $query = $this->Absensi->getSiswa($id);
//        $tr= mysql_query($query);
        foreach ($query->result() as $temp) {

            $data['no'] = $temp->no_induk;
            $data['nama'] = $temp->nama_siswa;
            $this->load->view('tampilDataSiswa', $data, $this->Absensi->getSiswa($id));
        }
    }

// public function tampilInsert1() {
//        $this->load->model('Absensi');
//        $data['dkelas'] = $this->Absensi->getKelas();
//        $data['dmapel'] = $this->Absensi->getMapel();
//        $data['data'] = $this->Absensi->getSiswa();
//        $this->load->view('MasukAbsensi', $data);
//    }

    public function tampilCoba() {
        $id = array('id_kelas' => $this->input->post('id_kelas'));
        $this->load->model('Absensi');
        $data['dkelas'] = $this->Absensi->getKelas();
        $data['dmapel'] = $this->Absensi->getMapel();

        $query = $this->Absensi->getSiswa($id);
        $data['ukelas'] = $query->result();
//         foreach ($query->result() as $temp) {
//  
//            $data['no'] = $temp->no_induk;
//            $data['nama'] = $temp->nama_siswa;
        //   $this->load->view('tampilDataSiswa', $data,$this->Absensi->getSiswa($id));
        $this->load->view('tampilDataSiswa', $data);
    }

}
