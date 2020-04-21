<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whatsapp_model extends CI_Model {

	const TABLE_NAME = "whatsapp_link";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function getlinks()
	{	
		$this->db->select("plans.*, classes.class_name, branches.branch_name");	
		$this->db->join("classes","classes.id=plans.class_id");
		$this->db->join("branches","branches.id=plans.branch_id");

		if(!empty($status))
		{
			$this->db->where('plans.status', $status);
		}
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getlink($branch_id,$class_id,$teacher_id)
	{		
		$this->db->where('branch_id', $branch_id);
		$this->db->where('class_id', $class_id);
		$this->db->where('teacher_id',$teacher_id);

		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}
	public function getlinkbybranch($branch_id)
	{	
		$this->db->select("plans.*, classes.class_name, branches.branch_name");	
		$this->db->join("classes","classes.id=plans.class_id");
		$this->db->join("branches","branches.id=plans.branch_id");
		$this->db->where('branch_id', $branch_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->result_array();
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
