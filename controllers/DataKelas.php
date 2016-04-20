<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Kelas"); //constructor 
    }
    public function tampilKelola() {
        $this->load->view('KelolaDataKelas');//menuju ke folder view
    }

    public function tampilMasuk() {
        $this->load->view('MasukDataKelas');
    }

    public function tampilHapus() {
        $this->load->view('HapusDataKelas');
    }
    
    public function tampilEdit() {
        $this->load->view('EditDataKelas');
    }
    
    public function index() {
     
        $query = $this->db->get("kelas");
        $data['records'] = $query->result();
        $this->load->helper('url');
        $this->load->view('MasukDataKelas', $data);
    }
    
    function getkelas_hapus() {
        $this->load->model('Kelas');
        $query = $this->Kelas->getAllKelas();
        $data['dkelas'] = $query->result();
        $this->load->view('HapusDataKelas', $data);
    }
    
    function getkelas_masuk() {
        $this->load->model('Kelas');
        $query = $this->Kelas->getAllKelas();
        $data['ikelas'] = $query->result();
        $this->load->view('MasukDataKelas', $data);
    }
    function getkelas_edit() {
        $this->load->model('Kelas');
        $query = $this->Kelas->getAllKelas();
        $data['ekelas'] = $query->result();
        $this->load->view('EditDataKelas', $data);
    }
    
    public function insertdatakelas() {
        $data = array(
            'id_kelas' => $this->input->post('id'),
            'nama_kelas' => $this->input->post('nama'),
            'nip' => $this->input->post('nipguru')
        );
        $this->Kelas->insertdatakelas($data);//dari model
        $this->load->helper('url');
        redirect('DataKelas/getkelas_masuk'); //redirect page ke halaman utama controller kelas
        //Function yang dipanggil ketika ingin memasukan kelas ke dalam database
    }
    
    public function updatedatakelas() {
        $id = array(
            'id_kelas' => $this->input->post('id'),
            'nama_kelas' => $this->input->post('nama'),
            'nip' => $this->input->post('nipguru')
        );
        $this->Kelas->updatedatakelas($id); //passing variable $id ke kelas kelas pada folder model
        redirect('DataKelas/getkelas_edit');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }
    
     public function deleteDataKelas($id) {
        $where = array('id' => $id);
        $this->kelas->deletedatakelas($where, $id); //passing variable $id ke guru_model
        $this->load->helper('url');
//        $this->load->view('HapusDataGuru');
        redirect('DataKelas/getkelas_hapus');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }
    
    public function editform($id_kelas) {

        $query = $this->Kelas->getKelas($id_kelas);
        foreach ($query->result() as $kelas) {
            $data['id_kelas'] = $kelas->id_kelas;
            $data['nama_kelas'] = $kelas->nama_kelas;
            $data['nip'] = $kelas->nip;
        }
        $this->load->view('EditKelas', $data);
    }
    public function tampilInsert() {
        $this->load->model('Kelas');
        $data['dnip'] = $this->Kelas->tampilNIP();

        $data['kelas'] = $this->Kelas->getAllKelas();
        $this->load->view('MasukDataKelas', $data);
    }

}