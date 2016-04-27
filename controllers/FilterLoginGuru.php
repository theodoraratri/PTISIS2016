<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilterLogin
 *
 * @author Windows 10
 */
class FilterLoginGuru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'html', 'form'));
    }

    public function index() {
        $this->load->view('LoginGuru');
    }

    public function indexGuru() {
        $this->load->view('HalamanGuru');
    }

    public function successpage() {
        $this->load->model('UserModel');
        $query = $this->UserModel->processLogin();
        $data['login'] = $query->result();
        $this->load->view('successpage', $data);
    }

    function logout() {
        $this->session->sess_destroy();
        //redirect(base_url());
        $this->load->view('LoginGuru');
    }

    function signin() {
        $nip = trim($this->input->post('nip'));
        $password = trim($this->input->post('password'));
        $query = $this->UserModel->processLogin($nip, $password);
        $this->form_validation->set_rules('nip', 'Nip', 'required|callback_validateUser[' . $query->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');

        if ($this->form_validation->run() == TRUE) {
            if ($query) {
                $query = $query->result();
                $user = array(
                    'NIP' => $query[0]->NIP,
                    'PASSWORD' => $query[0]->PASSWORD,
                );
                $this->session->set_userdata($user);
                $this->load->view('successpage');
                //redirect('successpage');
            }
        } else {
            $this->load->view('LoginGuru');
            $this->form_validation->set_message('validateUser', 'Invalid %s or Password');
        }
    }

    /** Custom Validation Method */
    public function validateUser($nip, $recordCount) {
        if ($recordCount != 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validateUser', 'Invalid %s or Password');
            return FALSE;
        }
    }

}
