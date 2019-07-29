<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepageimages_model extends CI_Model {

	const TABLE_NAME = "homepageimages";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	
	public function getimages($type)
	{
		$this->db->where("type",$type);
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	public function getimagesbyid($id)
	{
		$this->db->where("id",$id);
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}
	

	public function update($userDetails, $product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}

	public function delete($product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}
	
}
