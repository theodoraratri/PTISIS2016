<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataJadwalPelajaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("JadwalPelajaran"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
    }

    public function index() {
        $this->load->view('KelolaDataJadwalPelajaran');
    }

    public function insertDataJadwalPelajaran() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode', 'Kode Jadwal Pelajaran', 'required|max_length[20]');
        $this->form_validation->set_rules('jam', 'Jam', 'required|max_length[30]');
        $this->form_validation->set_rules('tahun', 'Tahun Ajaran', 'required|max_length[10]|integer');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('JadwalPelajaran');
            $data['ikelas_jp'] = $this->JadwalPelajaran->tampildKelas();
            $data['imapel_jp'] = $this->JadwalPelajaran->tampilIdMapel();
            $data['inip_jp'] = $this->JadwalPelajaran->tampilNIP();
            $query = $this->JadwalPelajaran->getAllJadwal();
            $data['ijadwal'] = $query->result();
            $this->load->view('MasukDataJadwalPelajaran', $data);
        } else {
            $data = array(
                'kode_jadwal' => $this->input->post('kode'),
                'id_mapel' => $this->input->post('mapel'),
                'nip' => $this->input->post('nip'),
                'id_kelas' => $this->input->post('kelas'),
                'hari' => $this->input->post('hr'),
                'jam' => $this->input->post('jam'),
                'tahun_ajaran' => $this->input->post('tahun'));
            $this->JadwalPelajaran->insertdatajadwalpelajaran($data);
            $this->load->helper('url');
            redirect('DataJadwalPelajaran/tampilmasuk_jadwalpelajaran');
        }
    }

    public function deleteDataJadwalPelajaran($kode) {

        $where = array('kode_jadwal' => $kode);
        $this->JadwalPelajaran->deletedatajadwalpelajaran($where, $kode);
        $this->load->helper('url');
        redirect('DataJadwalPelajaran/tampilhapus_jadwalpelajaran');
    }

    public function updateDataJadwalPelajaran() {
//Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
        $data = array(
            'kode_jadwal' => $this->input->post('kode'),
            'id_mapel' => $this->input->post('mapel'),
            'nip' => $this->input->post('nip'),
            'id_kelas' => $this->input->post('kelas'),
            'hari' => $this->input->post('hr'),
            'jam' => $this->input->post('jam'),
            'tahun_ajaran' => $this->input->post('tahun'));
        $this->JadwalPelajaran->updatedatajadwalpelajaran($data);
        redirect('DataJadwalPelajaran/tampiledit_jadwalpelajaran'); //passing variable $data ke products_model
    }

    public function tampilmasuk_jadwalpelajaran() {
        $this->load->library('form_validation');
        $this->load->model('JadwalPelajaran');
        $data['ikelas_jp'] = $this->JadwalPelajaran->tampildKelas();
        $data['imapel_jp'] = $this->JadwalPelajaran->tampilIdMapel();
        $data['inip_jp'] = $this->JadwalPelajaran->tampilNIP();
        $query = $this->JadwalPelajaran->getAllJadwal();
        $data['ijadwal'] = $query->result();
        $this->load->view('MasukDataJadwalPelajaran', $data);
    }

    function tampilhapus_jadwalpelajaran() {
        $this->load->model('JadwalPelajaran');
        $query = $this->JadwalPelajaran->getAllJadwal();
        $data['djadwal'] = $query->result();
        $this->load->view('HapusDataJadwalPelajaran', $data);
    }

    function tampiledit_jadwalpelajaran() {
        $this->load->model('JadwalPelajaran');
        $query = $this->JadwalPelajaran->getAllJadwal();
        $data['ujadwal'] = $query->result();
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
        $data['tkelas_jp'] = $this->JadwalPelajaran->tampildKelas();
        $data['tmapel_jp'] = $this->JadwalPelajaran->tampilIdMapel();
        $data['tnip_jp'] = $this->JadwalPelajaran->tampilNIP();
        $this->load->view('EditJadwalPelajaran', $data);
    }

}
