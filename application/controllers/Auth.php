<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_m');
	}

	public function index()
	{
		$this->load->view('login');
	}

    public function sign_in(){
        $email = strtolower($this->input->post('email'));
        $pass = $this->input->post('password');

        $info = $this->Admin_m->getInfo(array('email' => $email, 'password' => sha1($pass)));
        if(empty($info)){
            echo "no";
            return;
        }

        $info['is_loggedin'] = true;
        $this->session->set_userdata('user_data', $info);

        echo 'yes';
    }

    public function sign_out(){
        $this->session->sess_destroy();
        redirect('auth');
    }

}
