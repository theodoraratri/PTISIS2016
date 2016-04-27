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
        $data = array(
        'id_kemajuan' => $this->input->post('id_kemajuan'),
        'id_kelas' => $this->input->post('id_kelas'),
        'id_mapel' => $this->input->post('id_mapel'),
        'nip' => $this->input->post('nip'),
        'id_jadwal' => $this->input->post('id_jadwal'),
        'tgl' => $this->input->post('tgl'),
        'jumlah_kehadiran' => $this->input->post('jumlah_kehadiran'),
        'materiYD' => $this->input->post('materiYD'),
        'kegiatanBM' => $this->input->post('kegiatanBM')
        );
        $this->KemajuanKelas->masukKemajuanKelas($data);
        $this->load->helper('url');
        redirect('DataGuru/tampilKelasK');
    }

    public function tampilMapelK() {
        $this->load->view('MasukKemajuanKelas');
//        $this->load->view('CobaKemajuan');
    }

    public function tampilKelasK() {
        $this->load->view('MasukKemajuanKelas');
//         $this->load->view('CobaKemajuan');
    }

    public function tampilInsertK() {
        $this->load->model('KemajuanKelas');
        $data['dkelas'] = $this->KemajuanKelas->getKelasK();
        $data['dmapel'] = $this->KemajuanKelas->getMapelK();
        $data['dnip'] = $this->KemajuanKelas->getNIP();
        $data['djadwal'] = $this->KemajuanKelas->getIdJadwal();


//        $data['hadir'] = $this->KemajuanKelas->tampilJumlahHadir();
        $this->load->view('MasukKemajuanKelas', $data);
//        $this->load->view('CobaKemajuan', $data);
    }

}
