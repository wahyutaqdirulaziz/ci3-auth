<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Handling extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //halaman sukses
    public function success()
    {
        $flash = $this->session->flashdata('handling');

        if ($flash == NULL) {
            $this->internal_error();
        } else {
            $cond = $flash['cond'];
            $data = [
                'title' => "$cond Sukses &mdash; SIMAK",
                'email' => $flash['email'],
                'username' => $flash['username'],
            ];
            $this->load->view('templates/auth/header', $data);
            $this->load->view('handling/success');
            $this->load->view('templates/auth/footer');
        }
    }

    //halaman gagal
    public function failed()
    {
        $flash = $this->session->flashdata('handling');
        if ($flash == NULL) {
            $this->internal_error();
        } else {
            $data = [
                'title' => $flash['title'],
                'email' => $flash['email'],
                'banner' => $flash['banner'],
                'cond' => $flash['cond'],
            ];
            $this->load->view('templates/auth/header', $data);
            $this->load->view('handling/failed');
            $this->load->view('templates/auth/footer');
        }
    }

    public function not_found()
    {
        $data = [
            'title' => "Halaman Tidak Ditemukan &mdash; SIMAK",
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('handling/not_found');
        $this->load->view('templates/auth/footer');
    }

    public function internal_error()
    {
        $data = [
            'title' => "Kesalahan Server &mdash; SIMAK",
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('handling/internal_error');
        $this->load->view('templates/auth/footer');
    }
}
