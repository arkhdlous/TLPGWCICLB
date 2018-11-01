<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

	function signin($username, $password){
		// Checking username and password
		$checkingNumRows = $this->db->query("SELECT * FROM m_users WHERE username = '$username' AND password = '$password' LIMIT 1")->num_rows();
	
		if ($checkingNumRows == 1){
			return 1;
		} elseif ($checkingNumRows == 0){
			return 0;
		}
	}

	function getAttr($username){
		return $this->db->query("SELECT * FROM m_users WHERE username = '$username' LIMIT 1")->row_array();
	}

	// Update password
	function updatePassword($dataPost){
		$myUsername  	= $this->session->userdata['user'];
		$myPassword  	= $dataPost['currentPassword'];
		$newPassword 	= $dataPost['newPassword'];
		$reNewPassword 	= $dataPost['reNewPassword'];

		// Get my last password 
		$myPasswordDB = $this->db->query("SELECT password FROM m_users WHERE username = '$myUsername'")->row_array()['password'];

		// Validation ... 
		if ($myPasswordDB === sha1($myPassword)) {
			if ($newPassword == $reNewPassword){
				$data = ['password' => sha1($newPassword)];
				$this->db->where('username', $myUsername);
				$this->db->update('m_users', $data);
				return 'success';
			} elseif ($newPassword != $reNewPassword) {
				return "pn-error"; // password new and renew not match
			}
		} else {
			return "cp-error"; // last password wrong 
		}

		// if ($myPassword !== $query->password) {
		// 	return 'password-wrong';
		// } elseif ($newPassword !== $reNewPassword) {
		// 	return 'password-notsame';
		// }  else {
		// 	$data = ['password' => $newPassword];
		// 	$this->db->where('username', $myUsername);
		// 	$this->db->update('user', $data);
		// 	return 'success';
		// }


	}

}

/* End of file  */
/* Location: ./application/models/ */