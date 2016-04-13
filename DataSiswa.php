<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model("Siswa");
    }
	
    public function index() {
        $this->load->view('index');
    }

    public function insertDataSiswa() {//function untuk memasukkan data siswa
        $data = array(
            'nomorinduk' => $this->input->post('no'),
            'namasiswa' => $this->input->post('nama'),
            'keterangan' => $this->input->post('ket'),
            'idkelas' => $this->input->post('id'));
        $this->Siswa->insertdatasiswa($data);//memanggil method insertdatasiswa dikelas siswa
        $this->load->view('MasukDataSiswa', $data);
    }
	
	public function updateDataGuru($no) {//function untuk mengedit data siswa
        $data = array(
            'nomorinduk' => $this->input->post('no'),
            'namasiswa' => $this->input->post('nama'),
            'keterangan' => $this->input->post('ket'),
            'idkelas' => $this->input->post('id'));
        $this->Siswa->updatedatasiswa($no); //memanggil method updatedatasiswa dikelas siswa
        $this->load->view('EditDataSiswa');
    }

    public function deleteDataSiswa() {//function untuk menghapus data siswa
        $id = $this->uri->segment(3);//mengambil nilai url pada segment ke 3
        $this->load->model('Siswa');
        $this->Siswa->deletedatasiswa($id);////memanggil method deletedatasiswa dikelas siswa
        $this->load->view('HapusSiswa');
    }
}