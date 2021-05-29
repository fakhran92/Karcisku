<?php

class Category extends Controller
{

	public function webinar()
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

		// GETTING WEBINARS
		$data['events'] = $this->model('Events_model')->getWebinars();


		$data['title'] = 'Karcisku - Webinar';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('category/index',$data);
		$this->view('template/footer');
	}


	public function concert()
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

		// GETTING CONCERT
		$data['events'] = $this->model('Events_model')->getConcerts();

		$data['title'] = 'Karcisku - Concert';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('category/index',$data);
		$this->view('template/footer');
	}


	public function theater()
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
		
		// GETTING Theater
		$data['events'] = $this->model('Events_model')->getTheaters();

		$data['title'] = 'Karcisku - Theater';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('category/index',$data);
		$this->view('template/footer');
	}

}