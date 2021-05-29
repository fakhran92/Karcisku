<?php

class Search extends Controller
{
	public function index($search = NULL)
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

		$search = $_POST['search']	;
		$data['search'] = $_POST['search']	;
		$data['searchResult'] = $this->model('Events_model')->search($search);



		$data['title'] = 'Karcisku - Search Result';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('search/index',$data);
		$this->view('template/footer');
	}
}
