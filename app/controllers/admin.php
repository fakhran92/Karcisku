<?php

class Admin extends Controller
{
	public function index()
	{
		// check user login and role
		if ($this->model('User_model')->isLoggedIn()) {
			$role = $this->model('User_model')->getRole();
			if ($role['role'] != 'admin') {
				header('Location:'.ROOTURL.'/dashboard');
			}
		}else{
			header('Location:'.ROOTURL.'/signin');
		}
		//===================================================

		// get slideshow images
		$data['images'] = $this->model('Slideshow_model')->getSlideshowImg();

		// GET UNVALIDATED ORDER
		$data['unvalidated'] = $this->model('Order_model')->getUnvalidatedOrder();



		$data['title'] = 'Karcisku - Admin Panel';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('admin/index',$data);
		$this->view('template/footer');
	}

	public function editSlideshow()
	{
		// var_dump($_FILES['uploaded_file']);
		$image_id = $_POST['image_id'];
		var_dump($image_id);
		if(!empty($_FILES['uploaded_file']))
		  {
		    $path = $_SERVER['DOCUMENT_ROOT']."/karcisku/public/assets/img/slideshow/";
		    $path2 = $_FILES['uploaded_file']['name'];
		    $ext = pathinfo($path2, PATHINFO_EXTENSION);
		    $path = $path . $image_id.'.'. $ext;

		    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
		      $photoName = $image_id.'.'. $ext;
		      $this->model('Slideshow_model')->updateSlideshow($image_id,$photoName);
		      header('Location:'.ROOTURL);
		    } else{
		        echo "There was an error uploading the file, please try again!";
		    }
		  }
	}

	public function addNewEvent()
	{
		$title = $_POST['title'];
		$date = $_POST['date'];
		$description = $_POST['description'];
		$location = $_POST['location'];
		$price = number_format($_POST['price']);
		$slot = $_POST['slot'];
		$tag = $_POST['tag'];
		// $poster = $_POST['poster'];	
		$category = $_POST['category'];

		$poster_file = $_FILES['poster'];

		// var_dump($title,$date,$description,$price,$slot,$tag,$poster,$category);




		$lastid = $this->model('Events_model')->getLastEventAdded();
		$lastid = $lastid['latestid']+1;
		

		// uploading poster image
		// $image_id = $_POST['image_id'];
		// var_dump($image_id);
		if(!empty($poster_file))
		  {
		    $path = $_SERVER['DOCUMENT_ROOT']."/karcisku/public/assets/img/thumbnail/";
		    $path2 = $poster_file['name'];
		    $ext = pathinfo($path2, PATHINFO_EXTENSION);
		    $path = $path . $lastid.'.'. $ext;

		    if(move_uploaded_file($poster_file['tmp_name'], $path)) {
		      $photoName = $lastid.'.'. $ext;
		      // inserting detail to database
				if ($this->model('Events_model')->addEvent($title,$date,$description,$location,$price,$slot,$tag,$photoName,$category) > 0) {
					echo "Insert berhasil";
				}else{
					echo "insert gagal";
				}
		      header('Location:'.ROOTURL);
		    } else{
		        echo "There was an error uploading the file, please try again!";
		    }
		  }
	}

	public function validate($orderid)
	{
		if ($this->model('Order_model')->validateOrder($orderid) > 0) {
			$orderData = $this->model('Order_model')->getOrderDetailById($orderid);
			$customerData  =$this->model('User_model')->getUserDetailById($orderData['customer_id']);
			$event_id = $orderData['event_id'];
			$customer_name = $customerData['fullname'];
			$order_id = $orderid;


			$amount = $orderData['amount'];

			// ticket generator

			for ($i=0; $i < $amount; $i++) { 
				$booking_code = uniqid('ticket-');
				$this->model('Order_model')->generateTicket($event_id,$customer_name,$order_id,$booking_code);
			}
			header('Location:'.ROOTURL.'/admin');
		}

	}

	public function ticket_history()
	{
		
		// check user login and role
		if ($this->model('User_model')->isLoggedIn()) {
			$role = $this->model('User_model')->getRole();
			if ($role['role'] != 'admin') {
				header('Location:'.ROOTURL.'/dashboard');
			}
		}else{
			header('Location:'.ROOTURL.'/signin');
		}
		//===================================================

		// GET * TICKETS

		$data['tickets'] = $this->model('Tickets_model')->getAllTickets();
		

		$data['title'] = 'Karcisku - Admin Panel';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('admin/ticket_history',$data);
		$this->view('template/footer');
	}

	public function invalidate($orderid)
	{
		$orderDetail = $this->model('Order_model')->getOrderDetailById($orderid);

		$amount = $orderDetail['amount'];
		$event_id = $orderDetail['event_id'];


		if ($this->model('Order_model')->cancelOrder($orderid) > 0) {
			$event = $this->model('Events_model')->increaseRemain($event_id,$amount);
			header('Location:'.ROOTURL.'/admin');
		}

	}
}
