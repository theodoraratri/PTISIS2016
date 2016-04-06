<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kelas extends CI_Model{
    
    var $id_kelas;
    var $nama_kelas;
    var $nip;
    var $nomorinduk;
    
    function __construct()
	{
	  parent::__construct();
    }
    function insertkelas($data) {
        $this->db->insert('kelas', $data);
    }
    function updatekelas($id_kelas, $data) {
        $this->db->where('id_kelas',$id_kelas);
        $this->db->update('kelas', $data);
    }
    function select_kls() {
        $query = $this->db->get('kelas');
        return $query->result();
    }
//    function get_all() {
//        $query = $this->db->get("select * from kelas");
//        return $query->result();
//    }
    function delete($id_kelas){
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('kelas');
    }
    
}