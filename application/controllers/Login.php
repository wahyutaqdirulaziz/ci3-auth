<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    // *Fungsi Route Login Page
    public function index()
    {
        $data = [
            'title' => "Masuk &mdash; SIMAK"
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth/footer');
    }
    // .Fungsi Route Login Page

}
