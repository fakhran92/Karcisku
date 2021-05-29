<?php 

/**
 * 
 */
class Tickets_model
{
	
	public function __construct()
	{
		$this->db = new Database;
	}

	public function getValidatedTickets($customer_name)
	{
		$this->db->query('SELECT * FROM tickets WHERE customer_name=:customer_name ORDER BY id DESC');
		$this->db->bind('customer_name',$customer_name);

		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db =NULL;

		return $return;
	}

	public function getAllTickets()
	{
		$this->db->query('SELECT * FROM tickets');
		$return = $this->db->resultSet();
		$this->db = NULL; 
		return $return;
	}


}