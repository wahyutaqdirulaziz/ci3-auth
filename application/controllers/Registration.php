<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    // *Fungsi Route Daftar Akun Baru
    public function index()
    {
        $data = [
            'title' => "Daftar &mdash; SIMAK"
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/register', $data);
        $this->load->view('templates/auth/footer');
    }
    // .Fungsi Route Daftar Akun Baru
}
