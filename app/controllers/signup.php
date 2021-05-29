<?php

class Signup extends Controller
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
		$data['title'] = 'Karcisku - Sign Up';

		if ($returned != NULL) {
			$data['alert'] =   '<div class="alert alert-danger text-center">
				      		<i class="fas fa-times"></i> User Already Exist or Credentials Already Used <i class="fas fa-times"></i><br><i class="fas fa-times"></i> Registration Failed! <i class="fas fa-times"></i>
				      	</div>';
		}else{
			$data['alert'] = '';
		}

		$this->view('template/header',$data);
		$this->view('signup/index',$data);
		$this->view('template/footer');
	}

	public function processRegistration()
	{
		$fullname 	= $_POST['fullname'];
		$idcard 	= $_POST['idcard'];
		$email 		= $_POST['email'];
		$phone 		= $_POST['phone'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];

		if ($this->model('User_model')->checkAvailability($fullname,$idcard,$email,$phone,$username,$password) > 0) {
			header("Location:".ROOTURL.'/signup/index/RegistrationFailed');
		}else{
			if ($this->model('User_model')->insertToDB($fullname,$idcard,$email,$phone,$username,$password) > 0) {
				header('Location:'.ROOTURL.'/signin/index/RegistrationSuccessful');
			}
		}
	}
}
