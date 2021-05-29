<?php

class dashboard extends Controller
{
	public function index()
	{
		// check user login and role
		if ($this->model('User_model')->isLoggedIn()) {
			$role = $this->model('User_model')->getRole();
			if ($role['role'] == 'admin') {
				header('Location:'.ROOTURL.'/admin');
			}
		}else{
			header('Location:'.ROOTURL.'/signin');
		}
		//===================================================

		// Getting latest webinars
		$data['webinars'] = $this->model('Events_model')->getNewWebinars();

		// Getting latest concerts
		$data['concerts'] = $this->model('Events_model')->getNewConcerts();

		// Getting latest theaters
		$data['theaters'] = $this->model('Events_model')->getNewTheaters();

		$data['title'] = 'Karcisku - Dashboard';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('dashboard/index',$data);
		$this->view('template/footer');
	}
}
