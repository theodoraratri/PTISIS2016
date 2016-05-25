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
        $this->load->library('form_validation');
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
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('no', 'Nomor Induk', 'required|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required|max_length[50]');
        $this->form_validation->set_rules('angk', 'Angkatan', 'required|max_length[10]|integer');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Siswa');
            $data['ikelas_s'] = $this->Siswa->tampildKelas();
            $query = $this->Siswa->getAllSiswa();
            $data['isiswa'] = $query->result();
            $this->load->view('MasukDataSiswa', $data);
        } else {
            $data = array(
                'no_induk' => $this->input->post('no'),
                'nama_siswa' => $this->input->post('nama'),
                'angkatan' => $this->input->post('angk'),
                'id_kelas' => $this->input->post('idkel')
            );
            $this->Siswa->insertdatasiswa($data);
            $this->load->helper('url');
            redirect('DataSiswa/tampilmasuk_siswa'); //redirect page ke halaman utama controller siswa
        }//Function yang dipanggil ketika ingin memasukan siswa ke dalam database
    }

    public function updateDataSiswa() {
        $nin = array(
            'no_induk' => $this->input->post('no'),
            'nama_siswa' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angk'),
            'id_kelas' => $this->input->post('idkel')
        );
        $this->Siswa->updatedatasiswa($nin); //passing variable $id ke siswa
        redirect('DataSiswa/tampiledit_siswa');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataSiswa($no_induk) {
        $where = array('no_induk' => $no_induk);
        $this->Siswa->deletedatasiswa($where, $no_induk); //passing variable $id ke siswa_model
        $this->load->helper('url');
        redirect('DataSiswa/tampilhapus_siswa');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function tampilFormEdit($no_induk) {
        $query = $this->Siswa->getSiswa($no_induk);
        foreach ($query->result() as $siswa) {
            $data['no_induk'] = $siswa->no_induk;
            $data['nama_siswa'] = $siswa->nama_siswa;
            $data['angkatan'] = $siswa->angkatan;
            $data['id_kelas'] = $siswa->id_kelas;
        }
        $data['tkelas_s'] = $this->Siswa->tampildKelas();
        $this->load->view('EditSiswa', $data);
    }

}
