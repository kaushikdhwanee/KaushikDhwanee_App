<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discounts_model extends CI_Model {

	const TABLE_NAME = "discounts";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}

	public function getdiscount($branch_id=null)
	{	
		if(!empty($branch_id))
		{
			$this->db->where('branch_id',$branch_id);
		}
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}

	public function update($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
}
