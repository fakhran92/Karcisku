<?php

class Mytickets extends Controller
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

		// GETTING TICKETS (VALIDATED)
		
		$cust_data = $this->model('User_model')->getuserDetailbySession($_SESSION['karcisku_user']);
		$customer_name = $cust_data[0]['fullname'];
		$customer_id = $cust_data[0]['id'];
		$data['validated'] = $this->model('Tickets_model')->getValidatedTickets($customer_name);
		foreach ($data['validated'] as $key => $ticket) {
			# code...
			$eventData = $this->model('Events_model')->getEventDetailByID($data['validated'][$key]['event_id']);
			$data['validated'][$key]['event_title'] = $eventData[0]['event_title'];
			$data['validated'][$key]['event_date'] = $eventData[0]['event_date'];
			$data['validated'][$key]['event_poster'] = $eventData[0]['event_poster'];

		}

		// GETTING TICKETS (UNVALIDATED)

		$data['unvalidated'] = $this->model('Order_model')->getUnvalidatedOrderFrom($customer_id);
		foreach ($data['unvalidated'] as $key => $ticket) {
			# code...
			$eventData = $this->model('Events_model')->getEventDetailByID($data['unvalidated'][$key]['event_id']);
			$data['unvalidated'][$key]['event_title'] = $eventData[0]['event_title'];
			$data['unvalidated'][$key]['event_date'] = $eventData[0]['event_date'];
			$data['unvalidated'][$key]['event_poster'] = $eventData[0]['event_poster'];

		}


		$data['title'] = 'Karcisku - My Tickets';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('mytickets/index',$data);
		$this->view('template/footer');
	}
}
