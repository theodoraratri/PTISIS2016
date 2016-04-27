<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataKelas
 *
 * @author Windows 10
 */
class DataKelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Kelas"); //constructor 
    }

    public function index() {
        $this->load->view('KelolaDataKelas');
    }

    public function insertDataKelas() {
        $data = array(
            'id_kelas' => $this->input->post('id'),
            'nama_kelas' => $this->input->post('nama'),
            'nip' => $this->input->post('nip')
        );
        $this->Kelas->insertdatakelas($data); //dari model
        $this->load->helper('url');
        redirect('DataKelas/tampilmasuk_kelas'); //redirect page ke halaman utama controller kelas
        //Function yang dipanggil ketika ingin memasukan kelas ke dalam database
    }

    public function updateDataKelas() {
        $data = array(
            'id_kelas' => $this->input->post('id'),
            'nama_kelas' => $this->input->post('nama'),
            'nip' => $this->input->post('nip')
        );
        $this->Kelas->updatedatakelas($data); //passing variable $id ke kelas kelas pada folder model
        redirect('DataKelas/tampiledit_kelas');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataKelas($id) {
        $where = array('id_kelas' => $id);
        $this->Kelas->deletedatakelas($where, $id); //passing variable $id ke guru_model
        $this->load->helper('url');
        redirect('DataKelas/tampilhapus_kelas');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    function tampilhapus_kelas() {
        $this->load->model('Kelas');
        $query = $this->Kelas->getAllKelas();
        $data['dkelas'] = $query->result();
        $this->load->view('HapusDataKelas', $data);
    }

    function tampilmasuk_kelas() {
        $this->load->model('Kelas');
        $data['inip_k'] = $this->Kelas->tampilNIP();
        $query = $this->Kelas->getAllKelas();
        $data['ikelas'] = $query->result();
        $this->load->view('MasukDataKelas', $data);
    }

    function tampiledit_kelas() {
        $this->load->model('Kelas');
        $query = $this->Kelas->getAllKelas();
        $data['ukelas'] = $query->result();
        $this->load->view('EditDataKelas', $data);
    }

    public function tampilFormEdit($id) {
        $query = $this->Kelas->getKelas($id);
        foreach ($query->result() as $kelas) {
            $data['id_kelas'] = $kelas->id_kelas;
            $data['nama_kelas'] = $kelas->nama_kelas;
        }
        $data['tnip_k'] = $this->Kelas->tampilNIP();
        $this->load->view('EditKelas', $data);
    }

}
