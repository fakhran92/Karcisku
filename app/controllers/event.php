<?php 

/**
 * 
 */
class Event extends Controller
{

	public function index($event_id = NULL)
	{
		// check user login and role
		if ($this->model('User_model')->isLoggedIn() == false) {
			header('Location:'.ROOTURL.'/signin');
		}
		//===================================================

		if (!isset($event_id)) {
			header('Location:'.ROOTURL);
		}


		// Get event detail from db
		$data['event'] = $this->model('Events_model')->getEventDetailById($event_id);
		// var_dump($data['event']);

		//====================================================
		$data['eventid'] = $event_id;

		if ($data['event']==NULL) {
			$data['title'] = 'Karcisku - Unknown Event Id';
			$this->view('template/header',$data);
			$this->view('template/navigation');
			$this->view('event/notfound',$data);
			$this->view('template/footer');
		}else{
			$data['title'] = 'Karcisku - Event Detail';
			$this->view('template/header',$data);
			$this->view('template/navigation');
			$this->view('event/index',$data);
			$this->view('template/footer');
			
		}

	}

	public function order()
	{
	
		$event_id = $_POST['event_id'];
		$amount = $_POST['orderAmount'];
		$totalPrice = $_POST['totalPrice'];
		$proof_file = $_FILES['uploaded_file'];

		$userdetail = $this->model('User_model')->getUserDetailBySession($_SESSION['karcisku_user']);
		$customer_id = $userdetail[0]['id'];



		$lastid = $this->model('Order_model')->getLastOrderAdded();
		$lastid = $lastid['latestid']+1;

		$getStock = $this->model('Events_model')->getEventAvailableTickets($event_id);

		$new_slot = $getStock['remaining_slot'] - $amount;

		if ($new_slot < 0) {
			header('Location:'.ROOTURL.'/event/soldout');die();
		}
		$decrease_slot = $this->model('Events_model')->decreaseRemaining($event_id,$new_slot);



		// uploading poster image
		// $image_id = $_POST['image_id'];
		// var_dump($image_id);
		if(!empty($proof_file))
		  {
		    $path = $_SERVER['DOCUMENT_ROOT']."/karcisku/public/assets/img/proof/";
		    $path2 = $proof_file['name'];
		    $ext = pathinfo($path2, PATHINFO_EXTENSION);
		    $path = $path . $lastid.'.'. $ext;

		    if(move_uploaded_file($proof_file['tmp_name'], $path)) {
		      $photoName = $lastid.'.'. $ext;
		      // inserting detail to database
				if ($this->model('Order_model')->addOrder($event_id,$amount,$customer_id,$photoName,$totalPrice) > 0) {
					echo "Insert berhasil";
				}else{
					echo "insert gagal";
				}
		      header('Location:'.ROOTURL.'/mytickets');
		    } else{
		        echo "There was an error uploading the file, please try again!";
		    }
		  }
	}


	public function soldout()
	{
		$data['title'] = 'Karcisku - Ticket Sold Out';
		$this->view('template/header',$data);
		$this->view('template/navigation');
		$this->view('event/soldout',$data);
		$this->view('template/footer');
	}

}