<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Guru
 *
 * @author Windows 10
 */
class Guru extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function getAllGuru() {
        //select semua data yang ada pada table guru $this--->db->select("*");
        $this->db->from("GURU");
        return $this->db->get();
    }

    function getGuru($nip) {
        $this->db->where('nip', $nip);
        return $this->db->get('GURU');
        //select guru berdasarkan id yang dimiliki
    }

    function insertdataguru($data) {
        //untuk insert data ke database
        $this->db->insert('GURU', $data);
    }

    function updatedataguru($data) {
        $this->db->where('nip', $data['nip']);
        $this->db->update('GURU', $data);
        //update guru berdasarkan id
    }

    function deletedataguru($nip) {
        $this->db->delete('GURU', $nip);
        //delete guru berdasarkan id
    }

}
