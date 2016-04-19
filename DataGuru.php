<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataGuru
 *
 * @author Windows 10
 */
class DataGuru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Guru"); 
//constructor yang dipanggil ketika memanggil DataGuru.php untuk melakukan pemanggilan pada model : Guru.php yang ada di folder models
    }

    public function tampilKelola() {
        $this->load->view('KelolaDataGuru');
    }

    public function tampilMasuk() {
        $this->load->view('MasukDataGuru');
    }

    public function tampilHapus() {
        $this->load->view('HapusDataGuru');
    }

    public function tampilEdit() {
        $this->load->view('EditDataGuru');
    }

    public function index() {
        //Function yang digunakan untuk menampilkan view guru_view.php
//        $this->load->view('MasukDataGuru'); 
//menampilkan view 'guru_view' dan juga passing data dengan nama $data(Bentuknya array) yang berisi 'listGuru'
        $query = $this->db->get("guru");
        $data['records'] = $query->result();
        $this->load->helper('url');
        $this->load->view('MasukDataGuru', $data);
    }

    function getguru_hapus() {
        $this->load->model('Guru');
        $query = $this->Guru->getAllGuru();
        $data['dguru'] = $query->result();
        $this->load->view('HapusDataGuru', $data);
    }

    function getguru_masuk() {
        $this->load->model('Guru');
        $query = $this->Guru->getAllGuru();
        $data['iguru'] = $query->result();
        $this->load->view('MasukDataGuru', $data);
    }

    function getguru_edit() {
        $this->load->model('Guru');
        $query = $this->Guru->getAllGuru();
        $data['eguru'] = $query->result();
        $this->load->view('EditDataGuru', $data);
    }

    public function insertDataGuru() {
        $data = array(
            'nip' => $this->input->post('nipe'),
            'namaguru' => $this->input->post('nmguru'),
            'password' => $this->input->post('passguru')
        );
        $this->Guru->insertdataguru($data);
        $this->load->helper('url');
//        $this->load->view('MasukDataGuru', $data);
        redirect('DataGuru/getguru_masuk'); //redirect page ke halaman utama controller guru
        //Function yang dipanggil ketika ingin memasukan guru ke dalam database
    }

    public function updateDataGuru() {
        $nipe = array(
            'nip' => $this->input->post('nipe'),
            'namaGuru' => $this->input->post('nmguru'),
            'password' => $this->input->post('passguru')
        );
        $this->Guru->updatedataguru($nipe); //passing variable $id ke guru_model
//        redirect('guru');
//        $this->load->view('EditDataGuru');
        redirect('DataGuru/getguru_edit');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataGuru($nipe) {
        $where = array('nip' => $nipe);
        $this->Guru->deletedataguru($where, $nipe); //passing variable $id ke guru_model
        $this->load->helper('url');
//        $this->load->view('HapusDataGuru');
        redirect('DataGuru/getguru_hapus');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function editform($nip) {

        $query = $this->Guru->getGuru($nip);
        foreach ($query->result() as $guru) {
            $data['nip'] = $guru->nip;
            $data['namaguru'] = $guru->namaguru;
            $data['password'] = $guru->password;
        }
        $this->load->view('EditGuru', $data);
    }

}
