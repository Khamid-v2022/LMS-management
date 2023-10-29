<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct(){
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('PasswordHistory_m');
	 }
	public function index()
	{
		$data['page_name'] = 'Replace Password';

		$this->load->view('header', $data);
		$this->load->view('reset_password', $data);
		$this->load->view('footer');
	}

	public function replace_password(){
		$request = $this->input->post();

		$emails = json_decode($request['email_array'], true);
		$email_str = "";

		foreach($emails as $email){
			$email_str .= $email['email'] . ",";
		}
		$email_str = rtrim($email_str, ',');

		$response = $this->make_request('users', 'GET', array('email' => $email_str, 'per_page'=> 100));
		
		if(isset($response['users']) && count($response['users']) > 0){
			$users = $response['users'];
			
			$valid_users = [];
			$invalid_emails = [];

			foreach($emails as $email){
				$flag = 0;
				foreach($users as $user){
					// if($email['email'] == $user['email']){
					if($email['email'] == $user['email']){
						$flag  = 1;
						$new_item = $user;
						$new_item['password'] = $email['password'];
						$valid_users[] = $new_item;
						break;
					}
				}

				if($flag == 0){
					$invalid_emails[] = $email;
				}
			}

			// Replace Password
			if(count($valid_users) > 0){
				foreach($valid_users as $valid_user){
					// Update Password
					// $data['first_name'] = $valid_user['first_name'] . " TEST";
					$data['password'] = $valid_user['password'];
					$response = $this->make_request('users/' . $valid_user['id'], 'PUT', $data);

					// Update Password in Our DB
					if(!$this->User_m->getInfo(array('user_id' => $valid_user['id']))){
						$this->User_m->insert([
							'user_id' => $valid_user['id'],
							'email' => $valid_user['email'],
							'password' => $valid_user['password'],
							'screen_name' => $valid_user['screen_name'],
							'first_name' => $valid_user['first_name'],
							'last_name' => $valid_user['last_name'],
							'sex' => $valid_user['sex']
						]);
					}
					else {
						$this->User_m->update(array(
							'user_id' => $valid_user['id'],
							'email' => $valid_user['email'],
							'password' => $valid_user['password'],
							'screen_name' => $valid_user['screen_name'],
							'first_name' => $valid_user['first_name'],
							'last_name' => $valid_user['last_name'],
							'sex' => $valid_user['sex'],
							'updated_at' => date('Y-m-d H:i:s')
						), array('user_id' => $valid_user['id']));
					}

					$this->PasswordHistory_m->insert([
						'user_id' => $valid_user['id'],
						'email' => $valid_user['email'],
						'password' => $valid_user['password']
					]);
				}
			}

			$this->generate_json(['valid_users' => $valid_users, 'invalid_emails' => $invalid_emails]);
			
			return;
		}

		$this->generate_json("No users");
	}

	public function make_request($end_point, $request_method, $post_data  = NULL){
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => API_ENDPOINT . $end_point,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $request_method,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . API_TOKEN,
				'Cookie: lang=en; request_method=GET'
			),
		));

		$_post = [];
		
		if($post_data && is_array($post_data)){
			foreach($post_data as $name => $value){
				$_post[] = $name . '=' . urlencode($value);
			}
			curl_setopt($curl, CURLOPT_POSTFIELDS, join('&', $_post));
		}
		

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response, true);
	}
}
