<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function send($user_data, $type)
    {
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
        $this->email->from('simak@fatek.untad.ac.id', 'SIMAK');
        $this->email->to($user_data['email']);
        $this->email->subject('[SIMAK] Activation Your Account');
        $this->load->view('email/activation', $user_data);
        $message = $this->output->get_output();
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
