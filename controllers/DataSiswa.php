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
class DataSiswa extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("Siswa"); //constructor yang dipanggil ketika memanggil siswa.php untuk melakukan pemanggilan pada model : siswa_model.php yang ada di folder models
    }

    public function index() {
        $this->load->view('KelolaDataSiswa');
    }

    function tampilhapus_siswa() {
        $this->load->model('Siswa');
        $query = $this->Siswa->getAllSiswa();
        $data['dsiswa'] = $query->result();
        $this->load->view('HapusDataSiswa', $data);
    }

    function tampilmasuk_siswa() {
        $this->load->model('Siswa');
        $data['ikelas_s'] = $this->Siswa->tampildKelas();
        $query = $this->Siswa->getAllSiswa();
        $data['isiswa'] = $query->result();
        $this->load->view('MasukDataSiswa', $data);
    }

    function tampiledit_siswa() {
        $this->load->model('Siswa');
        $query = $this->Siswa->getAllSiswa();
        $data['usiswa'] = $query->result();
        $this->load->view('EditDataSiswa', $data);
    }

    public function insertDataSiswa() {
        $data = array(
            'nomorinduk' => $this->input->post('no'),
            'namasiswa' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angk'),
            'id_kelas' => $this->input->post('idkel')
        );
        $this->Siswa->insertdatasiswa($data);
        $this->load->helper('url');
        redirect('DataSiswa/tampilmasuk_siswa'); //redirect page ke halaman utama controller siswa
        //Function yang dipanggil ketika ingin memasukan siswa ke dalam database
    }

    public function updateDataSiswa() {
        $nin = array(
            'nomorinduk' => $this->input->post('no'),
            'namasiswa' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angk'),
            'id_kelas' => $this->input->post('idkel')
        );
        $this->Siswa->updatedatasiswa($nin); //passing variable $id ke siswa
        redirect('DataSiswa/tampiledit_siswa');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataSiswa($nomorinduk) {
        $where = array('nomorinduk' => $nomorinduk);
        $this->Siswa->deletedatasiswa($where, $nomorinduk); //passing variable $id ke siswa_model
        $this->load->helper('url');
        redirect('DataSiswa/tampilhapus_siswa');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function tampilFormEdit($nomorinduk) {
        $query = $this->Siswa->getSiswa($nomorinduk);
        foreach ($query->result() as $siswa) {
            $data['nomorinduk'] = $siswa->nomorinduk;
            $data['namasiswa'] = $siswa->namasiswa;
            $data['angkatan'] = $siswa->angkatan;
            $data['id_kelas'] = $siswa->id_kelas;
        }
        $data['tkelas_s'] = $this->Siswa->tampildKelas();
        $this->load->view('EditSiswa', $data);
    }

}
