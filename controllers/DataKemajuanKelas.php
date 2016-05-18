<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataKemajuanKelas
 *
 * @author Bella
 */
class DataKemajuanKelas extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("KemajuanKelas");
    }

    public function index() {
        $query = $this->db->get("KemajuanKelas");
        $data['record'] = $query->result();
        $this->load->helper('url');
        $this->load->view("MasukKemajuanKelas", $data);
        $this->load->view('CobaKemajuan', $data);
    }

    public function insertData() {
        $year = $this->input->post('year');
        $mounth = $this->input->post('mount');
        $date = $this->input->post('date');
        $tanggal = "" . $year . "-" . $mounth . "-" . $date . "";
        $data = array(
            'id_kemajuan' => $this->input->post('id_kemajuan'),
            'id_kelas' => $this->input->post('id_kelas'),
            'id_mapel' => $this->input->post('id_mapel'),
            'nip' => $this->input->post('nip'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            'tgl' => $tanggal,
            'jumlah_kehadiran' => $this->input->post('jumlah_kehadiran'),
            'materiYD' => $this->input->post('materiYD'),
            'kegiatanBM' => $this->input->post('kegiatanBM')
        );

        $this->KemajuanKelas->masukKemajuanKelas($data);
        $this->load->helper('url');
//        redirect('DataGuru/tampilKelasK');
    }

    public function tampilMapelK() {
        $this->load->view('DataKemajuan');
//        $this->load->view('CobaKemajuan');
    }

    public function tampilKelasK() {
        $this->load->view('MasukKemajuanKelas');
//         $this->load->view('CobaKemajuan');
    }

    public function tampilJadwal() {
        $this->load->view('DataKemajuan');
    }

    public function tampilNIP() {
        $this->load->view('DataKemajuan');
    }

    public function tampilInsert() {
        $this->load->model('KemajuanKelas');
        $data['dkelas'] = $this->KemajuanKelas->getKelasK();
        $data['dmapel'] = $this->KemajuanKelas->getMapelK();
        $this->load->view('MasukKemajuanKelas', $data);
    }

    public function tampilInsertJumlah() {
        $year = $this->input->post('year');
        $mounth = $this->input->post('mounth');
        $date = $this->input->post('date');
        $tanggal = "" . $year . "-" . $mounth . "-" . $date . "";

        $this->load->model('KemajuanKelas');
        $data['dkelas'] = $this->KemajuanKelas->getKelasK();
        $data['dmapel'] = $this->KemajuanKelas->getMapelK();
        $data['dnip'] = $this->KemajuanKelas->getNIP();
        $data['djadwal'] = $this->KemajuanKelas->getIdJadwal();

        $data['tg'] = $tanggal;
        $id_kelas = $this->input->post('id_kelas');
        $id_mapel = $this->input->post('id_mapel');
        $data['jhadir'] = $this->KemajuanKelas->tampilJumlahHadir($tanggal, $id_kelas, $id_mapel);


        $id_kelas1 = $this->input->post('id_kelas');
        $id_mapel1 = $this->input->post('id_mapel');
        $sql1 = $this->KemajuanKelas->ambilNIPJadwal($id_kelas1, $id_mapel1);
        foreach ($sql1->result() as $tp) {
            $data['nip'] = $tp->nip;
            $data['id_jadwal'] = $tp->id_jadwal;
        }

        $this->load->view('TampilDataKemajuan', $data);
//        $this->load->view('cobaTanggal', $data);
    }

}
