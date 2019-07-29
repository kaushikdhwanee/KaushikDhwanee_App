<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes_model extends CI_Model {

	const TABLE_NAME = "classes";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function getclasses($status=null)
	{	
		$this->db->select("classes.*, categories.category_name");	
		$this->db->join("categories","categories.id=classes.cat_id");
		if(!empty($status))
		{
			$this->db->where('classes.status', $status);
		}
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getclassesbycat($cat_id)
	{	
		$this->db->select("classes.*, categories.category_name");	
		$this->db->join("categories","categories.id=classes.cat_id");
		$this->db->where('classes.status', 1);

		$this->db->where('classes.cat_id', $cat_id);

		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getclass($id)
	{		
		$this->db->where('id', $id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}
	/*public function get_categories_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	
*/
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
