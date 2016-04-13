<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->model("JadwalPelajaran"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
	}
    public function index() {
        $this->load->view('MasukDataJadwalPelajaran');
    }

    public function InsertJadwalPelajaran() {
        //Function yang dipanggil ketika ingin memasukan produk ke dalam database
       
      //  echo $this->uri->segment(3);
        $data = array(
        'kodeJadwal' => $this->input->post('kodejadwal'),
        'hari' => $this->input->post('hari'),
        'jam' => $this->input->post('jam'),
        'namaKelas' => $this->input->post('namakelas'),
        'mataPelajaran' => $this->input->post('matapelajaran'));
        $this->JadwalPelajaran->Insert($data); //passing variable $data ke products_model

        redirect('DataJadwalPelajaran/TampilDataJadwal'); //redirect page ke halaman utama controller products
    }
     public function TampilDataJadwal() {
    $data['jadwalpelajaran'] = $this->JadwalPelajaran->tampilDataJadwal();
		$this->load->view('HapusDataJadwalPelajaran', $data);
  }
   public function Hapus($id){
       
		$where = array('kodeJadwal' => $id);
		$this->JadwalPelajaran->delete($where,'jadwalpelajaran');
		$this->load->view('HapusDataJadwalPelajaran');
             //redirect(base_url().'index.php/crud/lihat');
    }
public function Edit()
	{
		//Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
        $data = array(
	'kodeJadwal' => $this->input->post('kodejadwal'),
        'hari' => $this->input->post('hari'),
        'jam' => $this->input->post('jam'),
        'namaKelas' => $this->input->post('namakelas'),
        'mataPelajaran' => $this->input->post('matapelajaran'));
        $condition['kodeJadwal'] = $this->input->post('kodejadwal'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya
        
		$this->JadwalPelajaran->edit($data, $condition); //passing variable $data ke products_model


    }


}