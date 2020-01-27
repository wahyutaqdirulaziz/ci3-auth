<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        $data = [
            'title' => "Login &mdash; SIMAK"
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth/footer');
    }
}