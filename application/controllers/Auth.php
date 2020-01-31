<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    // *Fungsi Route Login Page
    public function login()
    {
        $data = [
            'title' => "Masuk &mdash; SIMAK"
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth/footer');
    }
    // .Fungsi Route Login Page


    // *Fungsi Route Daftar Akun Baru
    public function register()
    {
        $data = [
            'title' => "Daftar &mdash; SIMAK"
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/register', $data);
        $this->load->view('templates/auth/footer');
    }
    // .Fungsi Route Daftar Akun Baru

    // *Fungsi Route Forgot Password
    public function forgot_password()
    {
        $data = [
            'title' => "Lupa Katasandi &mdash; SIMAK"
        ];

        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/forgot_password', $data);
        $this->load->view('templates/auth/footer');
    }
    // .Fungsi Route Forgot Password
}
