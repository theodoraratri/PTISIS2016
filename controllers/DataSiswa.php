<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataSiswa
 *
 * @author Theodora Ratri
 */
class DataSiswa extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("Siswa"); //constructor yang dipanggil ketika memanggil siswa.php untuk melakukan pemanggilan pada model : siswa_model.php yang ada di folder models
    }
    public function tampilKelola() {
        $this->load->view('KelolaDataSiswa');
    }

    public function tampilMasuk() {
        $this->load->view('MasukDataSiswa');
    }

    public function tampilHapus() {
        $this->load->view('HapusDataSiswa');
    }

    public function tampilEdit() {
        $this->load->view('EditDataSiswa');
    }

    public function index() {
        $query = $this->db->get("SISWA");
        $data['records'] = $query->result();
        $this->load->helper('url');
        $this->load->view('HapusDataSiswa', $data);
    }

    function getsiswa_hapus() {
        $this->load->model('Siswa');
        $query = $this->Siswa->getAllSiswa();
        $data['dsiswa'] = $query->result();
        $this->load->view('HapusDataSiswa', $data);
    }

    function getsiswa_masuk() {
        $this->load->model('Siswa');
        $query = $this->Siswa->getAllSiswa();
        $data['isiswa'] = $query->result();
        $this->load->view('MasukDataSiswa', $data);
    }

    function getsiswa_edit() {
        $this->load->model('Siswa');
        $query = $this->Siswa->getAllSiswa();
        $data['esiswa'] = $query->result();
        $this->load->view('EditDataSiswa', $data);
    }

    public function insertDataSiswa() {
        $data = array(
            'nomorinduk' => $this->input->post('no'),
            'namasiswa' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angk'),
            'idkelas' => $this->input->post('idkel')
        );
        $this->Siswa->insertdatasiswa($data);
        //$this->load->helper('url');
        //$this->load->view('MasukDataSiswa', $data);
        redirect('DataSiswa/getsiswa_masuk'); //redirect page ke halaman utama controller siswa
        //Function yang dipanggil ketika ingin memasukan siswa ke dalam database
    }

    public function updateDataSiswa() {
        $nin = array(
            'nomorinduk' => $this->input->post('no'),
            'namasiswa' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angk'),
            'idkelas' => $this->input->post('idkel')
        );
        $this->Siswa->updatedatasiswa($nin); //passing variable $id ke siswa
        redirect('DataSiswa/getsiswa_edit');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataSiswa($nomorinduk) {
        $where = array('nomorinduk' => $nomorinduk);
        $this->Siswa->deletedatasiswa($where, $nomorinduk); //passing variable $id ke siswa_model
        $this->load->helper('url');
        redirect('DataSiswa/getsiswa_hapus');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function editform($nomorinduk) {

        $query = $this->Siswa->getSiswa($nomorinduk);
        foreach ($query->result() as $siswa) {
            $data['nomorinduk'] = $siswa->nomorinduk;
            $data['namasiswa'] = $siswa->namasiswa;
            $data['angkatan'] = $siswa->angkatan;
            $data['idkelas'] = $siswa->idkelas;
        }
        $this->load->view('EditSiswa', $data);
    }
}
