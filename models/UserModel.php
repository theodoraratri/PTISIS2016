<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author Theodora Ratri
 */
class UserModel extends CI_Model{

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function processLogin($nip = NULL, $password) {
        $this->db->select("NIP,PASSWORD");
        $whereCondition = $array = array('NIP' => $nip, 'PASSWORD' => $password);
        $this->db->where($whereCondition);
        $this->db->from("GURU");
        return $this->db->get();
      
    }
}
