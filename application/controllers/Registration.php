<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'string']);
        $this->load->library('form_validation');
        $this->load->model('send_email');
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
            'required|trim|is_unique[users.username]',
            [
                'required' => '<i class="fas fa-exclamation-circle mx-1"></i> Username belum diisi',
                'is_unique' => '<i class="fas fa-exclamation-circle mx-1"></i> Username telah digunakan',
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
        // $this->store();
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

        //generate token activation
        $gen_token = base64_encode(random_bytes(32));
        $user_data = [
            'email' => $data['email'],
            'token' => $gen_token,
            'created' => time(),
        ];
        $this->db->insert('user_token', $user_data);
        $user_data['username'] = $data['username'];
        $this->send_email->send($user_data, 'verify');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" id="alert-msg">
                <h5 class="fonta-raleway-medium"><i class="icon fas fa-check"></i> Berhasil!</h5>
                <div class="text-justify">
                Periksa email Anda untuk mengaktifkan akun.
                </div>
                </div>'
        );
        redirect('login');
    }

    //method untuk melakukan verifikasi email
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if ((time() - $user_token['created']) < 18000) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" id="alert-msg">
                            <h5 class="fonta-raleway-medium"><i class="icon fas fa-check"></i> Berhasil!</h5>
                            <div class="text-justify">
                            Akun anda telah aktif.
                            </div>
                            </div>'
                    );
                    redirect('login');
                }

                //Token Expired
                else {
                    echo "token Expired";
                    //Expired 
                }
            } else {
                echo "Token Invalid";
                die;
            }
        }

        //Email Invalid
        else {
            echo "Failed";
            die;
        }
    }
}
