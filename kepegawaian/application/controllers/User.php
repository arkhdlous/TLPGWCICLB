<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		// Validation for access user
		$this->validation_access();
		
		$this->load->view('user_dashboard/templates/header');
		$this->load->view('user_dashboard/index.php');
		$this->load->view('user_dashboard/templates/footer');
	}

	public function user()
	{
		// Validation for access user
		$this->validation_access();

		$this->load->view('user_dashboard/templates/header');
		$pageActive = $this->uri->segment(5);
		if ($pageActive == 'settings'){

			$level = $this->user_model->getAttr('admin')['level'];
			if ($level == '1'){
				$levelName = 'Administrator';
			} else {
				$levelName = 'Karyawan';
			}

			$data = [
						'fullname' => $this->user_model->getAttr('admin')['fullname'],
						'level' => $levelName
					];
			$this->load->view('user_dashboard/myaccount_settings.php', $data);
		} else {
			$this->load->view('user_dashboard/myaccount_index.php');
		}
		
		$this->load->view('user_dashboard/templates/footer');
	}

	public function changePassword()
	{
		if ($this->input->post()){
			$resUpdatePassword = $this->user_model->updatePassword($_POST);
			if ($resUpdatePassword == 'success'){
				$this->session->set_flashdata('updatePassword', 'TRUE');
				redirect(SITE_URL('user/dashboard/appconfig/user/settings'));
			} elseif ($resUpdatePassword == 'pn-error') {
				$this->session->set_flashdata('updatePassword', 'pn');
				redirect(SITE_URL('user/dashboard/appconfig/user/settings'));
			} elseif ($resUpdatePassword == 'cp-error') {
				$this->session->set_flashdata('updatePassword', 'cp');
				redirect(SITE_URL('user/dashboard/appconfig/user/settings'));
			}
		}
	}

	public function signin()
	{
		if ($this->input->post()){
			$username 			= $this->input->post('username', TRUE);
			$password 			= sha1($this->input->post('password', TRUE));
			$resultTrySignin 	= $this->user_model->signin($username, $password);

			if ($resultTrySignin == 1){
				$this->session->set_userdata('user', $username);
				redirect(SITE_URL('user/dashboard'));
			} elseif ($resultTrySignin == 0){
				$this->session->set_flashdata('msg-error', '<div class="alert alert-danger fs-2 text-center mb-1" role="alert">Username atau password tidak cocok, <br>silahkan coba lagi!</div>');
				redirect(SITE_URL());
			}
		} else {
			redirect(SITE_URL());
		}
	}


	public function signout()
	{
		$this->session->sess_destroy();
		redirect(SITE_URL());		
	}



	private function validation_access()
	{
		if ($this->session->userdata('user') == NULL){
			redirect(SITE_URL());		
			exit;
		}
	}
}
