<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    //method untuk menampilkan halaman login
    public function index()
    {
        $data = [
            'title' => "Masuk &mdash; SIMAK"
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth/footer');
    }

    //method untuk mengecek username dan password
    public function validation()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        $user = $this->db->where('email', $username)->or_where('username', $username)->get('users')->row_array();

        //User ditemukan
        if ($user) {

            //User aktif
            if ($user['is_active'] == 1) {

                //cek password
                //Password Benar
                if (password_verify($password, $user['password'])) {
                    $data = array(
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                    );

                    $this->session->set_userdata($data);
                    redirect('dashboard');
                }
                //Password Salah
                else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" id="alert-msg">
                    <h5 class="fonta-raleway-medium"><i class="icon fas fa-ban"></i> Gagal!</h5>
                    <div class="text-justify">
                    Username/Email atau Password Salah.
                    </div>
                    </div>'
                    );
                    redirect('login');
                }
            }

            // User tidak aktif
            else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" id="alert-msg">
                <h5 class="fonta-raleway-medium"><i class="icon fas fa-ban"></i> Gagal!</h5>
                <div class="text-justify">
                Akun belum diaktifkan.
                </div>
                </div>'
                );
                redirect('login');
            }
        }

        //User belum didaftarkan
        else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" id="alert-msg">
            <h5 class="fonta-raleway-medium"><i class="icon fas fa-ban"></i> Gagal!</h5>
            <div class="text-justify">
            Username/Email atau Password Salah.
            </div>
            </div>'
            );
            redirect('login');
        }
    }
}
