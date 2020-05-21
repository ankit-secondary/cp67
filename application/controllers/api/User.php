<?php
require APPPATH.'libraries/REST_Controller.php';

class User extends REST_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model(['api/User_model']);
	}

	public function registration_post() {

		// Get the post data

		$name     = strip_tags($this->post('name'));
		$email    = strip_tags($this->post('email'));
		$username = strip_tags($this->post('username'));
		$password = $this->post('password');

		// Validate the post data

		if (!empty($name) && !empty($username) && !empty($email) && !empty($password)) {

			// Check if the given email and username already exists

			$result = $this->User_model->check($email, $username);

			if (!empty($result)) {
				// Set the response and exit
				$this->response("The given email or username already exists.", REST_Controller::HTTP_BAD_REQUEST);
			} else {
				// Insert user data
				$data = array(
					'name'     => $name,
					'username' => $username,
					'email'    => $email,
					'password' => md5($password),

				);
				$insert = $this->User_model->insert($data);

				// Check if the user data is inserted
				if ($insert) {
					// Set the response and exit
					$this->response([
							'status'  => TRUE,
							'message' => 'The user has been added successfully.',
							'data'    => $data
						], REST_Controller::HTTP_OK);
				} else {
					// Set the response and exit
					$this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
				}
			}
		} else {
			// Set the response and exit
			$this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function login_post() {
		// Get the post data
		$username = $this->post('username');
		$password = $this->post('password');

		// Validate the post data
		if (!empty($username) && !empty($password)) {

			// Check if any user exists with the given credentials

			$result = $this->User_model->checklogin($username, $password);

			if (!empty($result)) {
				// Set the response and exit
				$this->response([
						'status'  => TRUE,
						'message' => 'User login successful.',
						'data'    => $result
					], REST_Controller::HTTP_OK);
			} else {
				// Set the response and exit
				//BAD_REQUEST (400) being the HTTP response code
				$this->response("Wrong username or password.", REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			// Set the response and exit
			$this->response("Provide username and password.", REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_get() {

		$users = $this->User_model->get_users();

		if (count($users) > 0) {
			$this->response(['status' => 1,
					'message'               => 'user found',
					'data'                  => $users], 200);
		} else {
			$this->response(['status' => 0,
					'message'               => 'user not found',
					'data'                  => $users], REST_Controller::HTTP_NOT_FOUND);

		}
	}

	public function index_delete() {
		$id = $this->uri->segment(3);
		$r  = $this->User_model->delete($id);
		$this->response($r);
	}

}

?>