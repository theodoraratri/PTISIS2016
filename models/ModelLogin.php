<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login1
 *
 * @author Theodora Ratri
 */
class ModelLogin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function proses_login() {
        $username = $this->input->post('nip');
        $password = ($_POST['password']);
        //ambil database
        $query = $this->db->query("Select * from guru Where nip = '$username' and (password = '$password')");

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $username = $row->nip;
            $password = $row->password;
        } else {
            $info = '<div style="color:red">PERIKSA KEMBALI USERNAME DAN PASSWORD ANDA!</div>';
            $this->session->set_userdata('info', $info);

            redirect(base_url() . 'login');
        }
    }
}
