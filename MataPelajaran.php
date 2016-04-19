<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MataPelajaran
 *
 * @author Windows 10
 */
class MataPelajaran extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
    }

    function getAllMataPelajaran() {
        //select semua data yang ada pada table mapel $this--->db->select("*");
        $this->db->from("MAPEL");
        return $this->db->get();
    }

    function getMataPelajaran($id_mapel) {

        $this->db->where('id_mapel', $id_mapel);
        return $this->db->get('MAPEL');
        //select mapel berdasarkan id yang dimiliki
    }

    function insertdatamatapelajaran($data) {
        //untuk insert data ke database
        $this->db->insert('MAPEL', $data);
    }

    function updatedatamatapelajaran($data) {
        $this->db->where('id_mapel', $data['id_mapel']);
        $this->db->update('MAPEL', $data);

        //update mapel berdasarkan id
    }

    function deletedatamatapelajaran($id_mapel) {
        $this->db->delete('MAPEL', $id_mapel);
        //delete mapel berdasarkan id
    }

}
