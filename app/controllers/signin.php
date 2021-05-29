<?php

class Signin extends Controller
{
	public function index($returned = NULL)
	{
		// check user login and role
		if ($this->model('User_model')->isLoggedIn()) {
			$role = $this->model('User_model')->getRole();
			if ($role['role'] == 'admin') {
				header('Location:'.ROOTURL.'/admin');
			}else{
				header('Location:'.ROOTURL.'/dashboard');
			}
		}
		//===================================================

		$data['signup_status'] = $returned;
		$data['title'] = 'Karcisku - Sign In';

 		if ($returned == 'RegistrationSuccessful') {
			$data['alert'] =   '<div class="alert alert-success text-center">
						      		<i class="fas fa-check"></i> Registration Successful <i class="fas fa-check"></i><br><i class="fas fa-check"></i> Account Created! <i class="fas fa-check"></i>
						      	</div>';
		}elseif ($returned == 'CredentialsIncorrect') {
			$data['alert'] =   '<div class="alert alert-warning text-center">
						      		<i class="fas fa-exclamation-triangle"></i> Credentials Incorrect <i class="fas fa-exclamation-triangle"></i><br><i class="fas fa-exclamation-triangle"></i> Check again your username and password <i class="fas fa-exclamation-triangle"></i>
						      	</div>';
		}else{
			$data['alert'] = '';
		}


		$this->view('template/header',$data);
		$this->view('signin/index',$data);
		$this->view('template/footer');
	}

	public function validate()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($this->model('User_model')->isPasswordValid($username,$password)) {
			$_SESSION['karcisku_user'] = $username;
			header('Location:'.ROOTURL.'/dashboard');
		}else{
			header('Location:'.ROOTURL.'/signin/index/CredentialsIncorrect');
		}
	}
}
