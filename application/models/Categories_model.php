<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model {

	const TABLE_NAME = "categories";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function savecategory($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function get_categories($status=null)
	{		
		if(!empty($status))
		{
			$this->db->where('status', $status);
		}
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function get_categories_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	public function get_category($category_id)
	{		
		$this->db->where('id', $category_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}

	public function updatecategory($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function deletecategory($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
}
