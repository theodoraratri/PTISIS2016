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
        $this->load->model("Guru");
        //constructor yang dipanggil ketika memanggil DataGuru.php untuk melakukan pemanggilan pada model 
        //: Guru.php yang ada di folder models
    }

    public function index() {
        $this->load->view('KelolaDataGuru');
    }

    function tampilmasuk_guru() {
        $this->load->library('form_validation');
        $this->load->model('Guru');
        $query = $this->Guru->getAllGuru();
        $data['iguru'] = $query->result();
        $this->load->view('MasukDataGuru', $data);
    }

    function tampilhapus_guru() {
        $this->load->model('Guru');
        $query = $this->Guru->getAllGuru();
        $data['dguru'] = $query->result();
        $this->load->view('HapusDataGuru', $data);
    }

    function tampiledit_guru() {
        $this->load->model('Guru');
        $query = $this->Guru->getAllGuru();
        $data['uguru'] = $query->result();
        $this->load->view('EditDataGuru', $data);
    }

    public function insertDataGuru() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nipe', 'NIP', 'required|max_length[30]|integer');
        $this->form_validation->set_rules('nmguru', 'Nama Guru', 'required|max_length[50]');
        $this->form_validation->set_rules('passguru', 'Password Guru', 'required|max_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Guru');
            $query = $this->Guru->getAllGuru();
            $data['iguru'] = $query->result();
            $this->load->view('MasukDataGuru', $data);
        } else {
            $data = array(
                'nip' => $this->input->post('nipe'),
                'namaguru' => $this->input->post('nmguru'),
                'password' => $this->input->post('passguru')
            );
            $this->Guru->insertdataguru($data);
            $this->load->helper('url');
            redirect('DataGuru/tampilmasuk_guru'); //redirect page ke halaman utama controller guru
        } //Function yang dipanggil ketika ingin memasukan guru ke dalam database
    }

    public function updateDataGuru() {
        $nipe = array(
            'nip' => $this->input->post('nipe'),
            'namaguru' => $this->input->post('nmguru'),
            'password' => $this->input->post('passguru')
        );
        $this->Guru->updatedataguru($nipe); //passing variable $id ke guru_model
        redirect('DataGuru/tampiledit_guru');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataGuru($nipe) {
        $where = array('nip' => $nipe);
        $this->Guru->deletedataguru($where, $nipe); //passing variable $id ke guru_model
        $this->load->helper('url');
        redirect('DataGuru/tampilhapus_guru');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function tampilFormEdit($nip) {
        $query = $this->Guru->getGuru($nip);
        foreach ($query->result() as $guru) {
            $data['nip'] = $guru->nip;
            $data['namaguru'] = $guru->namaguru;
            $data['password'] = $guru->password;
        }
        $this->load->view('EditGuru', $data);
    }

}
