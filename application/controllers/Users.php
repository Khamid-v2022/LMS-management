<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_m');
	}

	public function index()
	{
		$data['page_name'] = 'Users';

        $data['users'] = $this->User_m->getList();
		$this->load->view('header', $data);
		$this->load->view('users', $data);
		$this->load->view('footer');
	}

}
