<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_m');
	}

	public function index()
	{
		$data['page_name'] = 'Setting';

		$this->load->view('header', $data);
		$this->load->view('setting', $data);
		$this->load->view('footer');
	}

    public function update_info(){
        $email = strtolower($this->input->post('cur_email'));
        $pass = $this->input->post('cur_password');

        $info = $this->Admin_m->getInfo(array('email' => $email, 'password' => sha1($pass)));
        if(empty($info)){
            $this->generate_json('invalid', false);
            return;
        }

        $this->Admin_m->update(
            array('email' => strtolower($this->input->post('new_email')), 'password' => sha1($this->input->post('new_password'))),
            array('id' => $info['id'])
        );
        $this->generate_json('success');
    }

}
