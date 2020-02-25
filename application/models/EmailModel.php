<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //generate token
    private function gen_token($data)
    {
        $user_data = [
            'email' => $data['email'],
            'username' => $data['username'],
            'token' => base64_encode(random_bytes(32)),
            'created' => time(),
        ];
        return $user_data;
    }

    public function send($user_data, $type)
    {
        //generate token and store to db
        $data = $this->gen_token($user_data);
        $this->db->insert('user_token', $data);

        //Configure email
        $this->load->library('email');
        $config = [
            'useragent' => 'simak.org',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_user' => 'aef66aec967be7',
            'smtp_pass' => '51065608709219',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];
        $this->email->initialize($config);
        $this->email->from('simak@fatek.untad.ac.id', 'SIMAK FATEK');
        $this->email->to($data['email']);
        $this->email->subject('[SIMAK] Activation Your Account');
        $this->load->view('email/activation', $data);
        $message = $this->output->get_output();
        $this->email->message($message);

        //Configure data for success page
        $handling = [
            'cond' => 'Pendaftaran',
            'email' => $data['email'],
            'username' => $data['username'],
        ];
        $this->session->set_flashdata('handling', $handling);

        //debugging email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
