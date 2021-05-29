<?php 

/**
 * 
 */
class Events_model
{
	
	public function __construct()
	{
		$this->db = new Database;
	}

	public function addEvent($title,$date,$description,$location,$price,$slot,$tag,$poster,$category)
	{
		$this->db->query('INSERT INTO events (event_title,event_date,event_description,event_location,event_price,event_slot,remaining_slot,event_tag,event_poster,event_category) VALUES (:title,:theDate,:description,:location,:price,:slot,:slot,:tag,:poster,:category)');

		$this->db->bind('title',$title);
		$this->db->bind('theDate',$date);
		$this->db->bind('description',$description);
		$this->db->bind('location',$location);
		$this->db->bind('price',$price);
		$this->db->bind('slot',$slot);
		$this->db->bind('tag',$tag);
		$this->db->bind('poster',$poster);
		$this->db->bind('category',$category);

		$this->db->execute();
		$return =  $this->db->rowCount();
		$this->db = NULL;
		return $return;

	}

	public function getLastEventAdded()
	{
		$this->db->query('SELECT MAX(id) as latestid FROM events');
		$return = $this->db->single();
		$this->db = NULL;
		return $return;
	}

	public function getNewWebinars()
	{
		$t=time();
		$now = date("Y-m-d H:i:s",$t);
		$this->db->query('SELECT * FROM events WHERE event_category="Webinar" AND remaining_slot>0 AND status="active" AND event_date>:now ORDER BY event_date ASC LIMIT 6');
		$this->db->bind('now',$now);
		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function getNewConcerts()
	{
		$t=time();
		$now = date("Y-m-d H:i:s",$t);
		$this->db->query('SELECT * FROM events WHERE event_category="Concert" AND remaining_slot>0 AND status="active" AND event_date>:now ORDER BY event_date ASC LIMIT 6');
		$this->db->bind('now',$now);
		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function getNewTheaters()
	{
		$t=time();
		$now = date("Y-m-d H:i:s",$t);		
		$this->db->query('SELECT * FROM events WHERE event_category="Theater" AND remaining_slot>0 AND status="active" AND event_date>:now ORDER BY event_date ASC LIMIT 6');
		$this->db->bind('now',$now);
		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function getEventDetailById($event_id)
	{
		$this->db->query('SELECT * FROM events WHERE id=:id');
		$this->db->bind('id',$event_id);

		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}


	public function getEventAvailableTickets($event_id)
	{
		$this->db->query('SELECT remaining_slot FROM events WHERE id=:event_id');
		$this->db->bind('event_id',$event_id);

		$this->db->execute();

		$return = $this->db->single();
		$this->db = NULL;
		return $return;

	}

	public function decreaseRemaining($event_id,$slot)
	{
		$this->db->query('UPDATE events SET remaining_slot=:slot WHERE id=:event_id');
		$this->db->bind('event_id',$event_id);
		$this->db->bind('slot',$slot);

		$this->db->execute();

		$return = $this->db->rowCount();
		$this->db = NULL;
		return $return;
	}

	public function getWebinars()
	{
		$t=time();
		$now = date("Y-m-d H:i:s",$t);
		$this->db->query('SELECT * FROM events WHERE event_category="Webinar" AND remaining_slot>0 AND status="active" AND event_date>:now ORDER BY event_date ASC');
		$this->db->bind('now',$now);
		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function getConcerts()
	{
		$t=time();
		$now = date("Y-m-d H:i:s",$t);
		$this->db->query('SELECT * FROM events WHERE event_category="Concert" AND remaining_slot>0 AND status="active" AND event_date>:now ORDER BY event_date ASC');
		$this->db->bind('now',$now);
		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function getTheaters()
	{
		$t=time();
		$now = date("Y-m-d H:i:s",$t);
		$this->db->query('SELECT * FROM events WHERE event_category="Theater" AND remaining_slot>0 AND status="active" AND event_date>:now ORDER BY event_date ASC');
		$this->db->bind('now',$now);
		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function search($searchQuery)
	{
		$this->db->query('SELECT * FROM events WHERE event_title LIKE :searchQuery OR event_tag LIKE :searchQuery');
		$this->db->bind('searchQuery', '%' . $searchQuery . '%');

		$this->db->execute();
		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function increaseRemain($id,$amount)
	{
		$this->db->query('UPDATE events SET remaining_slot=remaining_slot+'.$amount.' WHERE id='.$id);
		$this->db->execute();
		$return = $this->db->rowCount();
		$this->db =NULL;
		return $return;
	}
}