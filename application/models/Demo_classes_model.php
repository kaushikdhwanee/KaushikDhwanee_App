<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo_classes_model extends CI_Model {

	const TABLE_NAME = "demo_classes";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function getdemos($status=null)
	{	
		$this->db->select("demo_classes.*, classes.class_name, branches.branch_name");
		$this->db->join("classes","classes.id= demo_classes.class_id");
		$this->db->join("branches","branches.id=demo_classes.branch_id","left");

		if(!empty($status))
		{
			$this->db->where('demo_classes.status', $status);
		}

		$this->db->order_by("demo_classes.id","desc");
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	/*public function get_branches_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}*/
	public function getdemosbybranches($branch_id,$status=null)
	{	
		$this->db->select("demo_classes.*, classes.class_name, branches.branch_name");
		$this->db->join("classes","classes.id= demo_classes.class_id");
		$this->db->join("branches","branches.id=demo_classes.branch_id","left");
		$this->db->where('demo_classes.branch_id', $branch_id);

		if(!empty($status))
		{
			$this->db->where('demo_classes.status', $status);
		}
		$this->db->order_by("demo_classes.id","desc");
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}	
	public function getdemo($category_id)
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
