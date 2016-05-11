<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataMataPelajaran
 *
 * @author Windows 10
 */
class DataMataPelajaran extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("MataPelajaran");
//constructor yang dipanggil ketika memanggil DataMataPelajaran.php untuk melakukan pemanggilan pada model : MataPelajaran.php yang ada di folder models
    }

    public function index() {
        $this->load->view('KelolaDataMataPelajaran');
    }

    function tampilmasuk_mapel() {
        $this->load->library('form_validation');
        $this->load->model('MataPelajaran');
        $query = $this->MataPelajaran->getAllMataPelajaran();
        $data['imapel'] = $query->result();
        $this->load->view('MasukDataMataPelajaran', $data);
    }

    function tampilhapus_mapel() {
        $this->load->model('MataPelajaran');
        $query = $this->MataPelajaran->getAllMataPelajaran();
        $data['dmapel'] = $query->result();
        $this->load->view('HapusDataMataPelajaran', $data);
    }

    function tampiledit_mapel() {
        $this->load->model('MataPelajaran');
        $query = $this->MataPelajaran->getAllMataPelajaran();
        $data['umapel'] = $query->result();
        $this->load->view('EditDataMataPelajaran', $data);
    }

    public function insertDataMataPelajaran() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_mp', 'ID Mata Pelajaran', 'required|max_length[30]');
        $this->form_validation->set_rules('nm_mp', 'Nama Mata Pelajaran', 'required|max_length[50]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('MataPelajaran');
            $query = $this->MataPelajaran->getAllMataPelajaran();
            $data['imapel'] = $query->result();
            $this->load->view('MasukDataMataPelajaran', $data);
        } else {
            $data = array(
                'id_mapel' => $this->input->post('id_mp'),
                'nama_mapel' => $this->input->post('nm_mp'),
            );
            $this->MataPelajaran->insertdatamatapelajaran($data);
            $this->load->helper('url');
            redirect('DataMataPelajaran/tampilmasuk_mapel');
        }
        //redirect page ke halaman utama controller mapel
        //Function yang dipanggil ketika ingin memasukan mapel ke dalam database
    }

    public function updateDataMataPelajaran() {
        $id_mp = array(
            'id_mapel' => $this->input->post('id_mp'),
            'nama_mapel' => $this->input->post('nm_mp'),
        );
        $this->MataPelajaran->updatedatamatapelajaran($id_mp); //passing variable $id ke mapel modelinsertDataMataPelajaran
        redirect('DataMataPelajaran/tampiledit_mapel');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataMataPelajaran($id_mp) {
        $where = array('id_mapel' => $id_mp);
        $this->MataPelajaran->deletedatamatapelajaran($where, $id_mp); //passing variable $id ke mapel model
        $this->load->helper('url');
        redirect('DataMataPelajaran/tampilhapus_mapel');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function tampilFormEdit($id_mapel) {

        $query = $this->MataPelajaran->getMataPelajaran($id_mapel);
        foreach ($query->result() as $mapel) {
            $data['id_mapel'] = $mapel->id_mapel;
            $data['nama_mapel'] = $mapel->nama_mapel;
        }
        $this->load->view('EditMataPelajaran', $data);
    }

}
