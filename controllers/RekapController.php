<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RekapController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Rekap"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
    }

    public function tampilEdit() {
        $this->load->model('Rekap');

        $data['tahunajaran'] = $this->Rekap->tampilTahunAjaran();
        $data['idkelas'] = $this->Rekap->tampildKelas();
        $this->load->view('CetakRekap', $data);
    }

    public function Cetak() {
        $this->load->model('Rekap');
        $kode = $this->input->post('tahun');
        $id = $this->input->post('id');
        $data['tahunajaran'] = $this->Rekap->tampilTahunAjaran();
        $data['idkelas'] = $this->Rekap->tampildKelas();
        $data['rekap'] = $this->Rekap->tampilRekap($id, $kode);
        $this->load->view('CetakRekap', $data);
    }

}
