<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'string']);
        $this->load->library('form_validation');
        $this->load->model('emailModel');
    }

    public function index($cap_indi = 1)
    {
        $data = [
            'title' => "Daftar &mdash; SIMAK",
            'captcha' => random_string('alnum', 8),
            'cap_indi' => $cap_indi,
        ];
        $this->load->view('templates/auth/header', $data);
        $this->load->view('auth/register', $data);
        $this->load->view('templates/auth/footer');
    }

    //method untuk menambah data yang diinput
    public function create()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[users.username]|min_length[6]',
            [
                'required' => '<i class="fas fa-exclamation-circle mx-1"></i> Username belum diisi',
                'is_unique' => '<i class="fas fa-exclamation-circle mx-1"></i> Username telah digunakan',
                'min_length' =>  '<i class="fas fa-exclamation-circle mx-1"></i> Username minimal 6 karakter',
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'required' => '<i class="fas fa-exclamation-circle mx-1"></i> Email belum diisi',
                'valid_email' => '<i class="fas fa-exclamation-circle mx-1"></i> Email tidak valid',
                'is_unique' => '<i class="fas fa-exclamation-circle mx-1"></i> Email telah digunakan',
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|matches[c_password]|min_length[4]',
            [
                'required' => '<i class="fas fa-exclamation-circle mx-1"></i> Password belum diisi',
                'matches' => '<i class="fas fa-exclamation-circle mx-1"></i> Password &amp; Confirm Password tidak sama',
                'min_length' =>  '<i class="fas fa-exclamation-circle mx-1"></i> Password terlalu pendek',
            ]
        );

        $this->form_validation->set_rules(
            'c_password',
            'Confirm Password',
            'required|trim',
            [
                'required' => '<i class="fas fa-exclamation-circle mx-1"></i> Confirm Password belum diisi',
            ]
        );

        $cap = ($this->input->post('cap_word') == $this->input->post('cap_confirm')) ? 1 : 0;
        if ($this->form_validation->run() == FALSE || $cap == 0) {
            $this->index($cap);
        } else {
            $this->store();
        }
    }

    //method untuk menyimpan data kedalam database
    private function store()
    {
        $data = [
            'fullname' => 'Fulan',
            'username' => htmlspecialchars($this->input->post('username', TRUE), TRUE),
            'email' => htmlspecialchars($this->input->post('email', TRUE), TRUE),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'image_name' => 'default.png',
            'date_created' => time(),
        ];

        $this->db->insert('users', $data);
        $user_data = [
            'username' => $data['username'],
            'email' => $data['email'],
        ];
        $this->emailModel->send($user_data, 'verify');
        redirect('handling/success');
    }

    //method untuk melakukan verifikasi email
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                $this->_message();
                redirect('login');
            } else {
                $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

                //kondisi jika token user benar
                if ($user_token) {

                    //*Pengecekan masa kadaluarsa dari token
                    //jika token masih aktif
                    if ((time() - $user_token['created']) < 18000) {
                        $this->db->set('is_active', 1);
                        $this->db->where('email', $email);
                        $this->db->update('users');
                        $this->db->delete('user_token', ['email' => $email]);
                        $this->_message();
                        redirect('login');
                    }

                    //Jika token sudah kadaluarsa
                    else {
                        $this->db->delete('user_token', ['email' => $email]);
                        $this->db->delete('users', ['email' => $email]);
                        $data = [
                            'email' => $email,
                            'banner' => 'expired-token.png',
                            'cond' => 'expiredToken',
                        ];
                        $this->handling($data, "failed");
                    }
                }
                //Invalid Token
                else {
                    $data = [
                        'email' => $email,
                        'banner' => 'invalid-token.png',
                        'cond' => 'invalidToken',
                    ];
                    $this->handling($data, "failed");
                }
            }
        }

        //Email Invalid
        else {
            $data = [
                'email' => $email,
                'banner' => 'invalid-email.png',
                'cond' => 'invalidEmail',
            ];
            $this->handling($data, "failed");
        }
    }

    private function handling($data, $type)
    {
        if ($type == 'failed') {
            $data['title'] = "Verifikasi Akun &mdash; SIMAK";
            $this->session->set_flashdata('handling', $data);
            redirect('handling/failed');
        }
    }

    private function _message()
    {
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" id="alert-msg">
        <h5 class="fonta-raleway-medium"><i class="icon fas fa-check"></i> Berhasil!</h5>
        <div class="text-justify">
        Akun anda telah aktif.
        </div>
        </div>'
        );
    }
}
