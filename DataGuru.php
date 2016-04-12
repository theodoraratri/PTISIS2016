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
        $this->load->model("Guru"); //constructor yang dipanggil ketika memanggil guru.php untuk melakukan pemanggilan pada model : guru_model.php yang ada di folder models
    }

    public function index() {
        //Function yang digunakan untuk menampilkan view guru_view.php
        $this->load->view('MasukDataGuru'); //menampilkan view 'guru_view' dan juga passing data dengan nama $data(Bentuknya array) yang berisi 'listGuru'
    }

    function guru()
    {
        $this->load->model('Guru');
        $data['MasukDataGuru'] = $this->Guru->getGuru();
        $this->load->view('MasukDataGuru', $data);
    }
    
    public function insertDataGuru() {
        $data = array(
            'nip' => $this->input->post('nipe'),
            'namaguru' => $this->input->post('nmguru'),
            'password' => $this->input->post('passguru')
        );
        $this->Guru->insertdataguru($data); //passing variable $data ke guru_model
        $this->load->view('MasukDataGuru',$data);
//        redirect('guru'); //redirect page ke halaman utama controller guru
        //Function yang dipanggil ketika ingin memasukan guru ke dalam database
    }

    public function updateDataGuru($nipe) {
        $nipe = array(
            'nip' => $this->input->post('nipe'),
            'namaGuru' => $this->input->post('nmguru'),
            'password' => $this->input->post('pass')
        );
        $this->Guru->updatedataguru($nipe); //passing variable $id ke guru_model
//        redirect('guru');
        $this->load->view('EditDataGuru');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataGuru($nipe) {
        $where = array('nip' =>$nipe);
        $this->Guru->deletedataguru($where, $nipe); //passing variable $id ke guru_model
        $this->load->view('HapusDataGuru');
//        redirect('guru');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

}
