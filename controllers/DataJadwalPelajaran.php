<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataJadwalPelajaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("JadwalPelajaran"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
    }

    public function index() {
        $this->load->view('MasukDataJadwalPelajaran');
    }

    public function InsertJadwalPelajaran() {
        $data = array(
            'kode_jadwal' => $this->input->post('kode'),
            'id_mapel' => $this->input->post('mapel'),
            'nip' => $this->input->post('nip'),
            'id_kelas' => $this->input->post('kelas'),
            'hari' => $this->input->post('hr'),
            'jam' => $this->input->post('jam'),
            'tahun_ajaran' => $this->input->post('tahun'));
        $this->JadwalPelajaran->Insert($data);
        $this->load->helper('url');
        redirect('DataJadwalPelajaran/tampilInsert');
    }

    public function deleteJadwal($kode) {

        $where = array('kode_jadwal' => $kode);
        $this->JadwalPelajaran->delete($where, $kode);
        $this->load->helper('url');
        redirect('DataJadwalPelajaran/tampilDelete');
    }

    public function EditJadwal() {
//Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
        $data = array(
            'kode_jadwal' => $this->input->post('kode'),
            'id_mapel' => $this->input->post('mapel'),
            'nip' => $this->input->post('nip'),
            'id_kelas' => $this->input->post('kelas'),
            'hari' => $this->input->post('hr'),
            'jam' => $this->input->post('jam'),
            'tahun_ajaran' => $this->input->post('tahun'));
        $this->JadwalPelajaran->edit($data);
        redirect('DataJadwalPelajaran/getEdit'); //passing variable $data ke products_model
    }

    public function tampilInsert() {
        $this->load->model('JadwalPelajaran');
        $data['dkelas'] = $this->JadwalPelajaran->tampildKelas();
        $data['dmapel'] = $this->JadwalPelajaran->tampilIdMapel();
        $data['dnip'] = $this->JadwalPelajaran->tampilNIP();

        $data['jadwal'] = $this->JadwalPelajaran->getAllJadwal();
        $this->load->view('MasukDataJadwalPelajaran', $data);
    }

    function tampilDelete() {
        $this->load->model('JadwalPelajaran');
        $data['ja'] = $this->JadwalPelajaran->getAllJadwal();
        $this->load->view('HapusDataJadwalPelajaran', $data);
    }

    function getEdit() {
        $this->load->model('JadwalPelajaran');
        $data['jad'] = $this->JadwalPelajaran->getAllJadwal();
        $this->load->view('EditDataJadwalPelajaran', $data);
    }

    function tampilFormEdit($kode) {
        $query = $this->JadwalPelajaran->getJadwal($kode);
        foreach ($query->result() as $jadwal) {
            $data['kode_jadwal'] = $jadwal->kode_jadwal;

            $data['hari'] = $jadwal->hari;
            $data['jam'] = $jadwal->jam;
            $data['tahun_ajaran'] = $jadwal->tahun_ajaran;
        }
        $data['tkelas'] = $this->JadwalPelajaran->tampildKelas();
        $data['tmapel'] = $this->JadwalPelajaran->tampilIdMapel();
        $data['tnip'] = $this->JadwalPelajaran->tampilNIP();
        $this->load->view('EditJadwalPelajaran', $data);
    }


}
