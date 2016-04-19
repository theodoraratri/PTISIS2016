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
//menampilkan view mapel dan juga passing data dengan nama $data(Bentuknya array) yang berisi 'listmapel'
        $query = $this->db->get("mapel");
        $data['records'] = $query->result();
        $this->load->helper('url');
        $this->load->view('MasukDataMataPelajaran', $data);
    }

    function getmapel_hapus() {
        $this->load->model('MataPelajaran');
        $query = $this->MataPelajaran->getAllMataPelajaran();
        $data['dmapel'] = $query->result();
        $this->load->view('HapusDataMataPelajaran', $data);
    }

    function getmapel_masuk() {
        $this->load->model('MataPelajaran');
        $query = $this->MataPelajaran->getAllMataPelajaran();
        $data['imapel'] = $query->result();
        $this->load->view('MasukDataMataPelajaran', $data);
    }

    function getmapel_edit() {
        $this->load->model('MataPelajaran');
        $query = $this->MataPelajaran->getAllMataPelajaran();
        $data['emapel'] = $query->result();
        $this->load->view('EditDataMataPelajaran', $data);
    }

    public function insertDataMataPelajaran() {
        $data = array(
            'id_mapel' => $this->input->post('id_mp'),
            'nama_mapel' => $this->input->post('nm_mp'),
        );
        $this->MataPelajaran->insertdatamatapelajaran($data);
        $this->load->helper('url');
        redirect('DataMataPelajaran/getmapel_masuk'); //redirect page ke halaman utama controller mapel
        //Function yang dipanggil ketika ingin memasukan mapel ke dalam database
    }

    public function updateDataMataPelajaran() {
        $id_mp = array(
            'id_mapel' => $this->input->post('id_mp'),
            'nama_mapel' => $this->input->post('nm_mp'),
        );
        $this->MataPelajaran->updatedatamatapelajaran($id_mp); //passing variable $id ke mapel model
        redirect('DataMataPelajaran/getmapel_edit');
        //Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
    }

    public function deleteDataMataPelajaran($id_mp) {
        $where = array('id_mapel' => $id_mp);
        $this->MataPelajaran->deletedatamatapelajaran($where, $id_mp); //passing variable $id ke mapel model
        $this->load->helper('url');
        redirect('DataMataPelajaran/getmapel_hapus');
        //Function yang dipanggil ketika ingin melakukan delete produk dari database
    }

    public function editform($id_mapel) {

        $query = $this->MataPelajaran->getMataPelajaran($id_mapel);
        foreach ($query->result() as $mapel) {
            $data['id_mapel'] = $mapel->id_mapel;
            $data['nama_mapel'] = $mapel->nama_mapel;
        }
        $this->load->view('EditMataPelajaran', $data);
    }

}
