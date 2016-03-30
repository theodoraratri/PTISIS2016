<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of guru_model
 *
 * @author Windows 10
 */
class Guru extends CI_Model{
    //put your code here
    function __construct() { parent::__construct(); } function getAllGuru() {
		//select semua data yang ada pada table guru $this--->db->select("*");
		$this->db->from("guru");

		return $this->db->get();
	}

	function getGuru($id)
	{
            $this->db->select('guru', $id);
		//select guru berdasarkan id yang dimiliki
	}

	function addGuru($data)
	{
	//untuk insert data ke database
		$this->db->insert('guru', $data);
	}

	function updateGuru($id)
	{
            $this->db->update('guru', $id);
		//update guru berdasarkan id
	}

	function deleteGuru($id)
	{
            $this->db->delete('guru', $id);
		//delete guru berdasarkan id
	}
}
