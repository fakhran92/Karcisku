<?php 

/**
 * 
 */
class Slideshow_model
{
	
	public function __construct()
	{
		$this->db = new Database;
	}

	public function getSlideshowImg()
	{
		$this->db->query('SELECT file FROM slides');

		$return = $this->db->resultSet();
		$this->db = NULL;
		return $return;
	}

	public function updateSlideshow($image_id, $image_file)
	{
		$this->db->query('UPDATE slides SET file=:image_file WHERE slide_id=:image_id');
		$this->db->bind('image_file',$image_file);
		$this->db->bind('image_id',$image_id);

		$this->db->execute();
		$return = $this->db->rowCount();
		$this->db = NULL;
		return $return;
	}
}