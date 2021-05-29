<?php 



class Order_model
{
	
	public function __construct()
	{
		$this->db = new Database;
	}


	public function getLastOrderAdded()
	{
		$this->db->query('SELECT MAX(id) as latestid FROM orders');
		$return = $this->db->single();
		$this->db = NULL;
		return $return;
	}

	public function addOrder($event_id,$amount,$customer_id,$proof_file,$total_price)
	{
		$this->db->query('INSERT INTO orders (event_id, amount, customer_id, proof_file, total_price) VALUES (:event_id,:amount,:customer_id,:proof_file,:total_price)');

		$this->db->bind('event_id',$event_id);
		$this->db->bind('amount',$amount);
		$this->db->bind('proof_file',$proof_file);
		$this->db->bind('total_price',$total_price);
		$this->db->bind('customer_id',$customer_id);

		$this->db->execute();
		$return = $this->db->rowCount();
		$this->db = NULL;
		return $return;
	}

	public function getUnvalidatedOrder()
	{
		$this->db->query('SELECT * FROM orders WHERE validity=:unvalidated');

		$this->db->bind('unvalidated',"unvalidated");
		$this->db->execute();
		$return =$this->db->resultSet();
		$this->db =NULL;

		return $return;
	}

	public function validateOrder($orderid)
	{
		$this->db->query('UPDATE orders SET validity=:validity WHERE id=:orderid ');
		$this->db->bind('orderid',$orderid);
		$this->db->bind('validity',"validated");

		$this->db->execute();

		$return = $this->db->rowCount();
		$this->db = NULL;

		return $return;
	}

	public function getOrderDetailById($id)
	{
		$this->db->query('SELECT * FROM orders WHERE id =:id');
		$this->db->bind('id',$id);

		$return = $this->db->single();
		$this->db = NULL;

		return $return;
	}

	public function generateTicket($event_id,$customer_name,$order_id,$booking_code)
	{
		$this->db->query('INSERT INTO tickets (event_id,customer_name,booking_code,order_id) VALUES (:event_id,:customer_name,:booking_code,:order_id)');

		$this->db->bind('event_id', $event_id);
		$this->db->bind('customer_name', $customer_name);
		$this->db->bind('booking_code', $booking_code);
		$this->db->bind('order_id', $order_id);
		$this->db->execute();
	}

	public function getUnvalidatedOrderFrom($customer_id)
	{
		$this->db->query('SELECT * FROM orders WHERE validity=:unvalidated OR validity=:canceled AND customer_id=:customer_id');

		$this->db->bind('unvalidated',"unvalidated");
		$this->db->bind('canceled',"canceled");
		$this->db->bind('customer_id',$customer_id);
		$this->db->execute();
		$return =$this->db->resultSet();
		$this->db =NULL;

		return $return;
	}

	public function cancelOrder($order_id)
	{
		$this->db->query('UPDATE orders SET validity="canceled" WHERE id=:orderid');
		$this->db->bind('orderid',$order_id);
		$this->db->execute();
		$return = $this->db->rowCount();
		$this->db = NULL;
		return $return;
	}

}