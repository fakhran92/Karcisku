<?php

class Home extends Controller
{
	public function index()
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

		$data['title'] = 'Karcisku - Landing Page';
		$this->view('template/header',$data);
		$this->view('home/index');
		$this->view('template/footer');
	}
}
