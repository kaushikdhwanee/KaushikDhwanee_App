<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branches_model extends CI_Model {

	const TABLE_NAME = "branches";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function getbranches($status=null)
	{	
		if(!empty($status))
		{
			$this->db->where('branches.status', $status);
		}	
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function get_branches_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	public function getbranch($category_id)
	{		
		$this->db->where('id', $category_id);
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
