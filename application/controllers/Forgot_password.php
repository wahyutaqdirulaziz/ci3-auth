<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    // *Fungsi Route Forgot Password
    public function index()
    {
        $data = [
            'title' => "Lupa Katasandi &mdash; SIMAK"
        ];

        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/forgot_password', $data);
        $this->load->view('templates/auth/footer');
    }
    // .Fungsi Route Forgot Password

    public function send()
    {
        //method untuk mengirim email reset password
    }
}
